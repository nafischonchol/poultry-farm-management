<?php
namespace App\Repositories;
use App\Models\Cost;
use Illuminate\Support\Facades\DB;
use Auth;

class CostRepository implements ICostRepository
{
    public function all()
    {
        return Cost::where("sheet_no",session('current_sheet'))->where("user_id",Auth::user()->id)->get();
    }
    public function costTotal()
    {
        return Cost::where("sheet_no",session('current_sheet'))->where("user_id",Auth::user()->id)->groupBy("category")->selectRaw('sum(price*qty) as total,sum(qty) as totQty,sum(bonus_qty) as totBonusQty, category')->get();
    }
    public function store(array $data)
    {
        return Cost::create($data);
    }
    public function get($id)
    {
        return Cost::find($id);
    }
    public function update(array $data,$id)
    {
        $Cost = Cost::find($id);
        if($Cost)
        {
            $Cost->updated_at = now();
            $Cost->update($data);
        }
        return $Cost;
    }
    public function delete($id)
    {
        return Cost::destroy($id);
    }

    public function fiter(array $data)
    {
        $query = Cost::where("sheet_no",$data['sheet_no'])->where("user_id",Auth::user()->id);
        if($data['category'] == -1)
        {
            $query->whereNotNull("category_onno");
        }
        else if($data['category'] !=0)
            $query->where("category",trim($data['category']));

        if(!empty($data['name']))
            $query->where('name', 'like', '%' . trim($data['name']) . '%');

        $data = $query->get();
        return $data;
    }

}
