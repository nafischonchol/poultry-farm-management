<?php

namespace App\Repositories;

interface ICostRepository
{
    public function all();
    public function store(array $data);
    public function get($id);
    public function update(array $data,$id);
    public function delete($id);
    public function fiter(array $data);
}
