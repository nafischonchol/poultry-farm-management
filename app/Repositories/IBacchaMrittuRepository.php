<?php

namespace App\Repositories;

interface IBacchaMrittuRepository
{
    public function all($sheet_no);
    public function store(array $data);
    public function get($id);
    public function update(array $data,$id);
    public function delete($id);
}
