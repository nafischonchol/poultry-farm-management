<?php
namespace App\Repositories;
use App\Models\BacchaOjun;
use Illuminate\Support\Facades\DB;
use Auth;
class BacchaOjunRepository implements IBacchaOjunRepository
{

    public function all($sheet_no)
    {
        return BacchaOjun::where("sheet_no",$sheet_no)->get();
    }

    public function store(array $data)
    {
        return BacchaOjun::create($data);
    }
    public function get($id)
    {
        return BacchaOjun::find($id);
    }
    public function update(array $data,$id)
    {
        $BacchaOjun = BacchaOjun::find($id);
        if($BacchaOjun)
        {
            $BacchaOjun->updated_at = now();
            $BacchaOjun->update($data);
        }
        return $BacchaOjun;
    }
    public function delete($id)
    {
        return BacchaOjun::destroy($id);
    }

    public function filter(array $data)
    {
        return BacchaOjun::where("sheet_no",$data['sheet_no'])->where("user_id",Auth::user()->id)->get();
    }

}
