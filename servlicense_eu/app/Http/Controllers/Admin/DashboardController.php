<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Plocic\Plocic;

class DashboardController extends Controller
{

    public function showDashboard()
    {

//        $plocic = new Plocic('a3jhg5436kpko32hg4uf235b2j5ih25');
//        $var = $plocic->getPaymentManager()->create('PAYPAL', 5.00, 'Ein Cooles kind laden geld in transporter und tinder', 'google.porn', 'nok.prohoschting.de', 'googledoch.de');
//        return dd($var);
        return view('admin.dashboard');
    }

    public function ajaxSessionsLoad()
    {
//        return datatables($this->user()->sessions())->setTransformer(new SessionTransformer())->toJson();
    }

}
