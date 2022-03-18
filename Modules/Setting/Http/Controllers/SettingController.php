<?php

namespace Modules\Setting\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Actions\UpdateSetting;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Validation\ValidationException;
use Modules\Setting\Http\Requests\SettingRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SettingController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $settings = Setting::first();
        return view('setting::index', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     * @param ReqSettingRequestuest $request
     * @param Setting $setting
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        // return $request;

        $setting = UpdateSetting::update($request, $setting);

        if ($setting) {
            flashSuccess('Setting Updated Successfully');
            return redirect()->route('module.setting.index');
        } else {
            flashError();
            return back();
        }
    }
}
