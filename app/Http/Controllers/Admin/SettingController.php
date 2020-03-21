<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Model\Setting;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class SettingController extends BaseController
{
    //
    use UploadAble;

    public function index()
    {
        $this->setPageTitle('Settings', 'Manage Settings');
        return view('backend.Settings.general_settings');
    }

    public function update(Request $request)
    {
        if ($request->has('site_logo') &&
            ($request->file('site_logo') instanceof UploadedFile) &&
            $request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile) ) {
            if (config('settings.site_logo') != null) {
                $this->deleteOne(config('settings.site_logo'));
            }
            $logo = $this->uploadOne($request->file('site_logo'), 'tixgo_content/site_logo');
            Setting::set('site_logo', $logo);
            if (config('settings.site_favicon') != null) {
                $this->deleteOne(config('settings.site_favicon'));
            }
            $favicon = $this->uploadOne($request->file('site_favicon'), 'tixgo_content/site_logo');
            Setting::set('site_favicon', $favicon);
        }

        elseif ($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)) {
            if (config('settings.site_logo') != null) {
                $this->deleteOne(config('settings.site_logo'));
            }
            $logo = $this->uploadOne($request->file('site_logo'), 'tixgo_content/site_logo');
            Setting::set('site_logo', $logo);
        }elseif ($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)) {

            if (config('settings.site_favicon') != null) {
                $this->deleteOne(config('settings.site_favicon'));
            }
            $favicon = $this->uploadOne($request->file('site_favicon'), 'tixgo_content/site_logo');
            Setting::set('site_favicon', $favicon);

        }else {

            $keys = $request->except('_token');

            foreach ($keys as $key => $value)
            {
                Setting::set($key, $value);
            }
        }
        return $this->responseRedirectBack('Settings updated successfully.', 'success');
    }

    public function logo()
    {
        $this->setPageTitle('Settings', 'Site Logo');
        return view('backend.Settings.logo');
    }
    public function footer()
    {
        $this->setPageTitle('Settings', 'Edit Footer');
        return view('backend.Settings.footer');
    }
    public function social()
    {
        $this->setPageTitle('Settings', 'Social Media Accounts');
        return view('backend.Settings.social');
    }

    public function analytics()
    {
        $this->setPageTitle('Settings', 'Google Analytics');
        return view('backend.Settings.analytics');
    }
    public function payments()
    {
        $this->setPageTitle('Settings', 'Payment Methods');
        return view('backend.Settings.payment');
    }
}
