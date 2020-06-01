<?php


namespace App\Http\Controllers\Admin\Licensor;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Transformers\LicensorTransformer;

class LicensorController extends Controller
{

    public function showLicensors()
    {
        return view('admin.licensor.index');
    }

    public function ajaxLicensorLoad()
    {
        return datatables(User::all())
            ->setTransformer(new LicensorTransformer())
            ->toJson();
    }

}
