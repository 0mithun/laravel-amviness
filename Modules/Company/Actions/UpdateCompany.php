<?php

namespace Modules\Company\Actions;

use Modules\Company\Entities\Company;

class UpdateCompany
{
    public static function update($company, $request)
    {
        $company->update($request->except(['logo', 'banner', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));

        // logo update
        $logo = $request->logo;
        if ($logo) {
            deleteImage($company->logo);
            $url = uploadImage($logo, 'company/logo');
            $company->update(['logo' => $url]);
        }

        // banner update
        $banner = $request->banner;
        if ($banner) {
            deleteImage($company->banner);
            $url = uploadImage($banner, 'company/banner');
            $company->update(['banner' => $url]);
        }

        return true;
    }
}
