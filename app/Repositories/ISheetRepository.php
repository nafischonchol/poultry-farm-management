<?php

namespace App\Repositories;

interface ISheetRepository
{
    public function all();
    public function store(array $data);
    public function get($id);
    public function update(array $data,$id);
    public function delete($id);
}
