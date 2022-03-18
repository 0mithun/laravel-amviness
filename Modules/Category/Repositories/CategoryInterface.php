<?php

namespace Modules\Category\Repositories;


interface CategoryInterface
{
    public function all();
    public function store($data);
    // public function update(object $data, object $request);
    public function destroy(object $data);
}
