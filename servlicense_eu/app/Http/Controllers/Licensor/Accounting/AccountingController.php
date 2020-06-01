<?php


namespace App\Http\Controllers\Licensor\Accounting;


use App\Http\Controllers\Controller;
use App\Transformers\TransactionTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountingController extends Controller
{

    public function index()
    {
        return view('licensor.accounting.index');
    }

    public function ajaxTransactionsLoad()
    {
        return datatables($this->user()->transactions())->setTransformer(new TransactionTransformer())->toJson();
    }

    public function charge(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|min:1|max:200',
        ])->validate();
    }
}
