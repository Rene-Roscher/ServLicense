<?php

namespace App\Models;

use App\Providers\Plocic\PlocicFacade;
use Illuminate\Database\Eloquent\Model;

/**
 * @property null|integer id
 * @property null|integer user_id
 * @property null|integer amount
 * @property null|string description
 * @property null|integer mtid
 * @property null|enum state SUCESS,PENDING,ARBORT
 * @property null|enum type PAYPAL,PAYSAFECARD,SYSTEM
 */
class Transaction extends Model
{

    public $transactionCheckUrl = "";

    protected $fillable = [
        'user_id', 'amount', 'description', 'mtid', 'state', 'type'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateMtid()
    {
        do {
            $mtid = rand(10000, 99999);
        } while (self::where('mtid', $mtid)->exists());
            return $mtid;
    }

    public static function totalIncome($start = null, $end = null)
    {
        $amount = 0;

        $payPal = self::entriesFromType('PAYPAL', $start, $end);
        $amount += $payPal->sum('amount') * 0.981 - ($payPal->count() * 0.35);

        $paySafeCard = self::entriesFromType('PAYSAFECARD', $start, $end);
        $amount += $paySafeCard->sum('amount') * 0.85;

        return round($amount, 2);
    }

    public static function entriesFromType($type, $start = null, $end = null)
    {
        $filteredRecords = Transaction::all()->where('type', '!=', 'DONATE')->where('type', '!=', 'SYSTEM')->where('state', 'SUCCESSFUL')->where('type', $type);
        if ($start && $end)
            return $filteredRecords->whereBetween('created_at', [$start, $end]);
        return $filteredRecords;
    }

    public function openTransaction()
    {
        return PlocicFacade::api()->getPaymentManager()->create($this->type, $this->amount, $this->description, );
    }
}
