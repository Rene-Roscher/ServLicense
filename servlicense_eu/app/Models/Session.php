<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class Session
 * @package App\Models
 * @property mixed id
 * @property mixed user_id
 * @property mixed ip_address
 * @property mixed user_agent
 * @property mixed payload
 * @property mixed last_activity
 * @property date created_at
 */
class Session extends Model
{
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'user_id', 'ip_address', 'user_agent', 'payload', 'last_activity'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function getPayloadAttribute($value) {
        return unserialize(base64_decode($value));
    }

    public function lastActivity()
    {
        return date('d.m.Y H:i:s', $this->last_activity);
    }



}
