<?php

namespace Modules\Company\Actions;

class DeleteCompany
{
    public static function delete($company)
    {
        $logo = $company->logo;
        $banner = $company->banner;

        if ($company->delete()) {
            deleteImage($logo);
            deleteImage($banner);
        }

        return true;
    }
}
