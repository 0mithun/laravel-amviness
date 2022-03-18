<?php

namespace Modules\Company\Repositories;

interface CompanyInterface
{
    public function all();
    public function store(object $data);
    public function update(object $request, object $data);
    public function destroy(object $data);
    public function status(object $request);
}
