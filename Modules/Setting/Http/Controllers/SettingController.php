<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Http\Requests\AdminMetadataFormRequest;
use Modules\Setting\Http\Requests\AdminSettingFormRequest;
use Modules\Setting\Http\Requests\AdminSocialFormRequest;
use Modules\Setting\Repositories\SettingRepository;
use App\Http\Controllers\Admin\AdminController;


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
        $website = $this->setting->getById(1);
        return view('setting::website', compact('website'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update(AdminSettingFormRequest $request)
    {
        $dataFields = $request->except('_token', 'logo');

        if ($request->hasFile('logo')) {
            $config = $this->config['array_resize_image'];
            $resultUpload = $this->image->upload('logo' , $config, 'resize');
            if($resultUpload['status'] > 0)
            {
                $dataFields['logo'] = $resultUpload['filename'];
            }
        }

        if ($this->setting->update($dataFields, ['id' => 1]))
        {
            return redirect()->route('website.edit')->with('success', trans('general.messages.update_success'));
        }

        return redirect()->back()->withInputs($request->except('_token'))->with('warning', trans('general.messages.update_warning'));
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
