<?php


namespace App\Http\Controllers\Admin\Licensor\Single;


use App\Http\Controllers\Controller;
use App\Models\User;
use PragmaRX\Google2FA\Google2FA;

class LicensorSingleController extends Controller
{

    public function showLicensor(User $licensor)
    {
//        return Google2FA::generateSecretKey();
        return view('admin.licensor.single.index', compact('licensor'));
    }

    public function updateLicensor()
    {
        static::validateAjax();
        return response()->json([
            'success' => false,
        ]);
    }

}
