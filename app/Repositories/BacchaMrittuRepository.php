<?php
namespace App\Repositories;
use App\Models\BacchaMrittu;
use Illuminate\Support\Facades\DB;
use Auth;

class BacchaMrittuRepository implements IBacchaMrittuRepository
{

    public function all($sheet_no)
    {
        return BacchaMrittu::where("sheet_no",$sheet_no)->get();
    }

    public function store(array $data)
    {
        return BacchaMrittu::create($data);
    }
    public function get($id)
    {
        return BacchaMrittu::find($id);
    }
    public function update(array $data,$id)
    {
        $BacchaMrittu = BacchaMrittu::find($id);
        if($BacchaMrittu)
        {
            $BacchaMrittu->updated_at = now();
            $BacchaMrittu->update($data);
        }
        return $BacchaMrittu;
    }
    public function delete($id)
    {
        return BacchaMrittu::destroy($id);
    }

    public function filter(array $data)
    {
        return BacchaMrittu::where("sheet_no",$data['sheet_no'])->where("user_id",Auth::user()->id)->get();
    }

}
