<?php


namespace App\Http\Controllers\Licensor;

use Google2FA;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TwoFactorController extends Controller
{

    public function manage()
    {
        if(request()->ajax()) {

            if(!is_null($code = request('code'))) {
                $validator = Validator::make(request()->all(), [
                    'code' => 'required|numeric|digits:6'
                ], [], [
                    'code' => 'Code',
                ]);
                if($validator->fails())
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()->toArray(),
                    ]);

                $verified = Google2FA::verifyGoogle2FA(\App\Helper\Helpers::user()->get2FactorSecret(), $code);
                $errors = [];
                if (!$verified) $errors['code'] = 'Der 2-Faktor Code ist ungültig.';

                if($verified) session()->put('two-factor', $code);

                return response()->json([
                    'success' => $verified,
                    'errors' => $errors,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'errors' => [
                        'code' => 'Es wurde kein 2-Faktor Code übergeben.'
                    ],
                ]);
            }

        } else {
            return view('licensor.twofactor.index');
        }
    }

}
