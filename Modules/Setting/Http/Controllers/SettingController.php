<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Http\Requests\AdminMetadataFormRequest;
use Modules\Setting\Http\Requests\AdminSettingFormRequest;
use Modules\Setting\Http\Requests\AdminSocialFormRequest;
use Modules\Setting\Repositories\Setting;
use Modules\Setting\Repositories\SettingRepository;


class SettingController extends AdminController
{
    protected $setting;

    public function __construct(SettingRepository $setting)
    {
        $this->setting  = $setting;
        $this->image    = \App::make('ImageFactory');
        $this->config   = \Config::get('image');
        parent::__construct();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        // Chọn cấu hình phù hợp cho form
        $settings = [
            $this->setting->getByKey('logo', ['key' => 'logo', 'type' => 'file', 'label' => 'Logo']),
            $this->setting->getByKey('name', ['key' => 'name', 'type' => 'text', 'label' => 'Tên công ty']),
            $this->setting->getByKey('address', ['key' => 'address', 'type' => 'text', 'label' => 'Địa chỉ']),
            $this->setting->getByKey('email', ['key' => 'email', 'type' => 'text', 'label' => 'Email']),
            $this->setting->getByKey('email_1', ['key' => 'email_1', 'type' => 'text', 'label' => 'Email 1']),
            $this->setting->getByKey('email_2', ['key' => 'email_2', 'type' => 'text', 'label' => 'Email 2']),
            $this->setting->getByKey('hotline', ['key' => 'hotline', 'type' => 'text', 'label' => 'Hotline']),
            $this->setting->getByKey('hotline_1', ['key' => 'hotline_1', 'type' => 'text', 'label' => 'Hotline 1']),
            $this->setting->getByKey('yahoo', ['key' => 'yahoo', 'type' => 'text', 'label' => 'Yahoo']),
            $this->setting->getByKey('yahoo_1', ['key' => 'yahoo_1', 'type' => 'text', 'label' => 'Yahoo 1']),
            $this->setting->getByKey('yahoo_2', ['key' => 'yahoo_2', 'type' => 'text', 'label' => 'Yahoo 2']),
            $this->setting->getByKey('slogan', ['key' => 'slogan', 'type' => 'text', 'label' => 'Slogan']),
        ];

        return view('setting::website', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $settings = $request->get('setting');
        foreach($settings as $key => $item) {
            _debug($key);
            _debug($item);
            $setting = $this->setting->getByKey($key, $item);
            _debug($setting->exists);
            // $setting->save();
        }

        // return redirect()->route('website.edit')->with('success', trans('general.messages.update_success'));
    }

    /**
     * Setting metadata website
     * @return View
     */

    public function metadata()
    {
        $metadata = $this->setting->getById(1);
        return view('setting::metadata', compact('metadata'));
    }

    /**
     * Cập nhật thông tin metadata
     * @return Response
     */
    public function postMetadata(AdminMetadataFormRequest $request)
    {
        if ($this->setting->update($request->except('_token'), ['id' => 1]))
        {
            return redirect()->route('metadata.show')->with('success', trans('general.messages.update_success'));
        }

        return redirect()->back()->withInputs($request->except('_token'))->with('warning', trans('general.messages.update_warning'));
    }

    /**
     * Setting Social Network
     * @return View
     */

    public function social()
    {
        $social = $this->setting->getById(1);
        return view('setting::social', compact('social'));
    }

    /**
     * Update social info
     * @param  AdminSocialFormRequest $request
     * @return Response
     */
    public function postSocial(AdminSocialFormRequest $request)
    {
        if ($this->setting->update($request->except('_token'), ['id' => 1]))
        {
            return redirect()->route('social.show')->with('success', trans('general.messages.update_success'));
        }

        return redirect()->back()->withInputs($request->except('_token'))->with('warning', trans('general.messages.update_warning'));
    }
}
