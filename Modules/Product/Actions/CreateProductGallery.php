<?php

namespace Modules\Product\Actions;

use Modules\Product\Entities\ProductGallery;

class CreateProductGallery
{
    public static function create($request, $id)
    {
        foreach ($request->file as $image) {
            if ($image) {
                $url = uploadImage($image, 'product/gallery/');
                ProductGallery::create([
                    'product_id' => $id,
                    'image' => $url,
                ]);
            }
        }

        return true;
    }
}
