<?php


namespace App\Transformers;


use App\Helper\Helpers;
use App\Models\Transaction;
use League\Fractal\TransformerAbstract;

class TransactionTransformer extends TransformerAbstract
{

    public function transform(Transaction $transaction)
    {
        return [
            'id' => $transaction->id,
            'amount' => $transaction->amount.' €',
            'description' => $transaction->description,
            'state' => Helpers::getStatePillInnerHTML($transaction->state),
            'type' => $transaction->type,
            'created_at' => $transaction->created_at->format('d.m.Y H:i'),
        ];
    }

}
