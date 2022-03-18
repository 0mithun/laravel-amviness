<?php

namespace Modules\Product\Actions;

class DeleteProductGallery
{
    public static function delete($gallery)
    {
        deleteImage($gallery->image);
        return $gallery->delete();
    }
}
