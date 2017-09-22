<?php

namespace App\Http\Controllers;

use BlackBear\DataGrid\Table;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Modules\Post\Repositories\Post;

class TestController extends Controller
{
    public function index()
    {

        // $content = Post::find(1)->content;
        // echo 1;die;
        // preg_match_all('#img#', $content, $matches);
        // dd($matches);
        // $upload = app('ImageFactory');
        // $url = 'http://giadinh.mediacdn.vn/2017/d2-1502073563231.jpg';
        // $resultUpload = $upload->uploadFromUrl($url);
        // _debug($resultUpload);
        die;
        // $dataGrid = new DataGrid();
        // echo $dataGrid->showHeading('ID', 'id', 1);die;
        // // $routeCollection = \Route::getRoutes();

        // // foreach ($routeCollection as $value) {
        // //     echo $value->getPath(). "\n";
        // // }
        // // die;
        // // print_r(config('admin.nav'));die;
        // $now = time();
        // $after = time() + (30*60);
        // var_dump(date('Y-m-d H:i:s', $now));
        // var_dump(date('Y-m-d H:i:s', $after));
        // // return view('frontend/email/order');
    }

    public function payment()
    {
        $payment = new \App\Hocs\Payments\Napas();
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

    public function dataGrid(Request $request)
    {
        $faker = \Faker\Factory::create();
        $dataSource = new Collection();
        for($i = 0; $i < 30; $i ++) {
            $dataSource->push([
                'id' => $faker->ean8,
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email
            ]);
        }

        $dataGrid = new Table($dataSource);
        $dataGrid->addColumn('id', 'ID')->sortable()->view(function($item, $key) {
            return '<b>'. $item[$key] .'</b>';
        });
        $dataGrid->addColumn('name', 'Name');
        $dataGrid->addColumn('phone', 'Phone');
        $dataGrid->addColumn('email', 'Email')->view(function($item, $key) {
            return sprintf('<small>%s</small>', $item[$key]);
        });

        return view('tests/data-grid', ['tableContent' => $dataGrid->render()]);
    }
}
