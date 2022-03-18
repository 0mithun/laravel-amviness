<?php

namespace Modules\Candidate\Repositories;

interface CandidateInterface
{
    public function all();
    public function store(object $data);
    public function update(object $request, object $data);
    public function destroy(object $data);
    public function status(object $data);
}
