<?php

namespace Modules\Team\Repositories;

interface TeamInterface
{
    public function all();
    public function store(Object $data);
    public function update(Object $request, Object $data);
    public function destroy(Object $data);
    public function updateOrder(Object $request);
}
