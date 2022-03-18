<?php

namespace Modules\Product\Repositories;

interface ProductInterface
{
    public function all();
    public function store(Object $data);
    public function update(Object $request, Object $data);
    public function destroy(Object $data);
    public function categoryWiseProduct(Object $data);
    public function subcategory_list(Object $data);
    public function status_change(Object $data);
}
