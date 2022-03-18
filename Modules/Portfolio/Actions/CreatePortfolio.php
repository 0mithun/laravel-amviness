<?php

namespace Modules\Portfolio\Actions;

use Modules\Portfolio\Entities\Portfolio;

class CreatePortfolio
{
    public static function create($request)
    {
        $portfolio = Portfolio::create($request->except(['image']));

        $image = $request->image;
        if ($image) {
            $url = uploadImage($image, 'portfolio');
            $portfolio->update(['image' => $url]);
        }

        return $portfolio;
    }
}
