<?php

namespace Modules\Candidate\Actions;

class UpdateCandidate
{
    public static function update($request, $candidate)
    {
        $candidate->update($request->except(['avatar', 'file', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));

        $avatar = $request->avatar;
        if ($avatar) {
            deleteImage($candidate->avatar);
            $url = uploadImage($avatar, 'candidate/avatar');
            $candidate->update(['avatar' => $url]);
        }

        $file = $request->file;
        if ($file) {
            deleteImage($candidate->banner);
            $url = uploadImage($file, 'candidate/file');
            $candidate->update(['file' => $url]);
        }

        return true;

        // info($company);

        // if ($request->logo && $request->banner) {
        //     $company =  $company->update($request->except(['logo', 'banner', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));
        // } elseif ($request->logo) {
        //     $company =  $company->update($request->except(['logo', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));
        // } elseif ($request->banner) {
        //     $company =  $company->update($request->except(['banner', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));
        // } else {
        //     $company =  $company->update($request->except(['facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));
        // }
        // info($company);
        // return;
        // $oldLogo = $company->logo;
        // $oldBanner = $company->banner;
        // $logo = $request->logo ?? '';
        // if ($logo) {
        //     deleteImage($oldLogo);
        //     $url = uploadImage($logo, 'company/logo');
        //     $company->update(['logo' => $url]);
        // }
        // $banner = $request->banner ?? '';
        // if ($banner) {
        //     deleteImage($oldBanner);
        //     $url = uploadImage($banner, 'company/banner');
        //     $company->update(['banner' => $url]);
        // }
        // return $company;
    }
}
