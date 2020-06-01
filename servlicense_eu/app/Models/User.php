<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailAlias;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Google2FA;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmailAlias
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'payload'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'payload' => 'array'
    ];

    /**
     * Checking if the requested role has
     *
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->role == $role;
    }

    /**
     * Determine if this model doesn't own the given model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  mixed                               $foreignKey
     * @param  bool                                $strict
     *
     * @return bool
     */
    public function doesntOwn($model, $foreignKey = null, $strict = false )
    {
        return !$this->owns($model, $foreignKey, $strict);
    }

    /**
     * Determine if this model owns the given model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  mixed                               $foreignKey
     * @param  bool                                $strict
     *
     * @return bool
     */
    public function owns($model, $foreignKey = null, $strict = false )
    {
        $foreignKey = $foreignKey ?: $this->getForeignKey();
        if ( $strict ) {
            return $this->getKey() === $model->{$foreignKey};
        }

        return $this->getKey() == $model->{$foreignKey};
    }

    /**
     * Make the first letter of the role big
     *
     * @return string
     */
    public function convertedRole()
    {
        return strtoupper(substr($this->role, 0, 1)).strtolower(substr($this->role, 1));
    }

    /*
     * Relationships
     */
    public function sessions()
    {
        return $this->hasMany(Session::class, 'user_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    public function getPayloadAttribute($value) {
        return json_decode($value);
    }

    public function setPayloadAttribute($value) {
        $this->attributes['payload'] = json_encode($value);
    }

    public function has2FactorSecret()
    {
        if(!is_null($this->payload) && !is_null($this->payload->{'2factor'}) && !is_null($this->payload->{'2factor'}->active))
            return true;
        return false;
    }

    public function has2FactorActivated()
    {
        return $this->has2FactorSecret() ? $this->payload->{'2factor'}->active : false;
    }

    public function generate2FactoryKey()
    {
        $this->update(['payload' => ['2factor' => ['secret' => $secret = Google2FA::generateSecretKey(), 'active' => false, 'activated_at' => null, 'generated_at' => now()]]]);
        return $secret;
    }

    public function get2FactorQRCode()
    {
        return ($this->has2FactorSecret() && !$this->has2FactorActivated()) ? Google2FA::getQRCodeInline(env('APP_NAME', 'ServLicense.EU'), $this->email, self::get2FactorSecret()) : 'data:image/png;base64,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';
    }

    public function get2FactorSecret()
    {
        return $this->has2FactorSecret() ? $this->payload->{'2factor'}->secret : self::generate2FactoryKey();
    }

    public function activate2Factor()
    {
//        foreach (range(1, 8) as $count) {
//            $split = str_split(Str::random(13), 3);
//            $backup_codes[] = strtoupper($split[0].'-'.$split[1].'-'.$split[2]);
//        }
        $payload = $this->payload;
        $twoFactor = $payload->{'2factor'};
        $twoFactor->activated_at = now();
//        $twoFactor->backup_codes = $backup_codes;
        $twoFactor->active = true;
        $this->update(['payload' => $payload]);
    }

    public function delete2Factor()
    {
        try {
            return boolval($this->update(['payload' => $this->payload->{'2factor'} = null]));
        } catch (\Exception $exception) {
            return false;
        }
    }

}
