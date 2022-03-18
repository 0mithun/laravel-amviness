<?php

namespace Modules\Portfolio\Actions;

class UpdatePortfolio
{
    public static function update($request, $portfolio)
    {
        $portfolio->update($request->except('image'));

        $image = $request->image;
        if ($image) {
            $url = uploadImage($image, 'portfolio');
            $portfolio->update(['image' => $url]);
        }

        return $portfolio;
    }
}
