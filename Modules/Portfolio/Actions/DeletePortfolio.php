<?php

namespace Modules\Portfolio\Actions;

class DeletePortfolio
{
    public static function delete($portfolio)
    {
        $portfolioImage = file_exists($portfolio->image);

        if ($portfolioImage) {
            deleteImage($portfolio->image);
        }

        return $portfolio->delete();
    }
}
