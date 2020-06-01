<?php


namespace App\Http\Controllers\Licensor;


use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Transformers\SessionTransformer;
use Google2FA;

class DashboardController extends Controller
{

    public function showDashboard()
    {
        return view('licensor.dashboard');
    }

    /* Session */
    public function ajaxSessionsLoad()
    {
        return datatables($this->user()->sessions())->setTransformer(new SessionTransformer())->toJson();
    }

    public function sessionDestory(Session $session)
    {
        static::hasModelAuthority($session);
        static::validateAjax();
        try {
            $session->delete();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function ajaxPaymentModal()
    {
        $this->validateAjax();
        return response()->json([
            'success' => true,
            'payload' => view('licensor.accounting.modal_pay')->render(),
        ]);
    }

}
