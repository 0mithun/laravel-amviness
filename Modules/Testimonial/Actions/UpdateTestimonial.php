<?php

namespace Modules\Testimonial\Actions;

class UpdateTestimonial
{
    public static function update($request, $testimonial)
    {
        $testimonial->update($request->all());

        $image = $request->image;
        if ($image) {
            $url = uploadImage($image, 'testimonial');
            $testimonial->update(['image' => $url]);
        }

        return $testimonial;
    }
}
