<?php


namespace App\Http\Controllers\Licensor\Setting;


use App\Http\Controllers\Controller;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Validator;
use Google2FA;
use Illuminate\Support\Str;
use PragmaRX\Google2FALaravel\Support\Authenticator;
use Ramsey\Uuid\UuidFactory;

class SettingController extends Controller
{

    public function showSettings()
    {
        return view('licensor.setting.index', ['secret' => $this->user()->get2FactorSecret(), 'qrcode' => $this->user()->get2FactorQRCode()]);
    }

    public function ajaxActivate2Factor()
    {
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

        $verified = Google2FA::verifyGoogle2FA($this->user()->get2FactorSecret(), request()->get('code'));
        $errors = [];
        if (!$verified) $errors['code'] = 'Der 2-Faktor Code ist ungültig.'; else $this->user()->activate2Factor();

        if($verified) session()->put('two-factor', request('code'));

        return response()->json([
            'success' => $verified,
            'errors' => $errors,
        ]);
    }

    public function ajaxDeactivate2Factor()
    {
        $user = self::user();
        if ($user->has2FactorActivated())
            return response()->json([
                'success' => $user->delete2Factor(),
            ]);
        return response()->json([
            'success' => false,
            'errors' => [
                'no two-factor activated',
            ]
        ]);
    }

}
