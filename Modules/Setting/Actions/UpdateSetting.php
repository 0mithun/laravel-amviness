<?php

namespace Modules\Setting\Actions;

class UpdateSetting
{
    public static function update($request, $setting)
    {
        $setting->update($request->except(['favicon', 'logo']));

        if ($request->has('favicon')) {
            $image = file_exists($setting->favicon);
            if ($image) {
                deleteImage($setting->favicon);
            }

            $image = $request->favicon;
            if ($image) {
                $url = uploadImage($image, 'setting');
                $setting->update(['favicon' => $url]);
            }
        }

        if ($request->has('logo')) {
            $image = file_exists($setting->logo);
            if ($image) {
                deleteImage($setting->logo);
            }

            $image = $request->logo;
            if ($image) {
                $url = uploadImage($image, 'setting');
                $setting->update(['logo' => $url]);
            }
        }

        return $setting;
    }
}
