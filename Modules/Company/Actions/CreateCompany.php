<?php

namespace Modules\Company\Actions;

use Modules\Company\Entities\Company;

class CreateCompany
{
    public static function create($request)
    {
        $company = Company::create($request->except(['logo', 'banner', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));

        $logo = $request->logo;
        if ($logo) {
            $url = uploadImage($logo, 'company/logo');
            $company->update(['logo' => $url]);
        }

        $banner = $request->banner;
        if ($banner) {
            $url = uploadImage($banner, 'company/banner');
            $company->update(['banner' => $url]);
        }

        return $company;
    }
}
