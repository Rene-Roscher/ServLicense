<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function user(): User
    {
        return auth()->user();
    }

    public function hasModelAuthority(Model $model)
    {
        if ($this->user()->doesntOwn($model))
            abort(404);
    }

    public function validateAjax()
    {
        if (!request()->ajax())
            abort(404);
    }

}
