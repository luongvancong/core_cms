<?php

namespace Nht\Http\Controllers;

use Illuminate\Routing\Controller;
use Luco\DataGrid\Models\DataGrid;

class TestController extends Controller
{
    public function index()
    {
        $dataGrid = new DataGrid();
        echo $dataGrid->showHeading('ID', 'id', 1);die;
        // $routeCollection = \Route::getRoutes();

        // foreach ($routeCollection as $value) {
        //     echo $value->getPath(). "\n";
        // }
        // die;
        // print_r(config('admin.nav'));die;
        $now = time();
        $after = time() + (30*60);
        var_dump(date('Y-m-d H:i:s', $now));
        var_dump(date('Y-m-d H:i:s', $after));
        // return view('frontend/email/order');
    }

    public function payment()
    {
        $payment = new \Nht\Hocs\Payments\Napas();
        $payment->setReturnUrl('http://sapabuslimousines.com/return');
        $payment->setBackUrl('http://sapabuslimousines.com/return');
        $payment->setAmount(600000);
        $payment->setMerchTxnRef(md5(12345678));
        $payment->setMerchant('SMLTEST');
        $payment->setAccessCode('ECAFAB');
        $payment->setSecureHash('198BE3F2E8C75A53F38C1C4A5B6DBA27');

        _debug($payment->getParams());
        echo '<hr/>';
        echo ('<a target="_blank" href="' . $payment->getRequestUrl() . '">' . $payment->getRequestUrl() . '</a>');die;

        return redirect()->to($payment->request());
    }

    public function paymentReturnUrl(Request $request)
    {
        _debug($request->all());
    }


    public function mail()
    {
        Mail::send('frontend/email/order', [], function ($m) {
            $m->from('hanoijs@gmail.com', 'VatGia.Com');
            $m->to('cong.itsoft@gmail.com')->subject('Hi, Justin Luong');
        });
    }

    public function mailRaw()
    {
        $to      = 'cong.itsoft@gmail.com';
        $subject = 'the subject';
        $message = 'hello';
        $headers = 'From: hanoijs@gmail.com' . "\r\n" .
            'Reply-To: cong.itsoft@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
}
