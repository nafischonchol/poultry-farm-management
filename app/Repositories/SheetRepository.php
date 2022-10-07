<?php
namespace App\Repositories;
use App\Models\Sheet;
use Illuminate\Support\Facades\DB;
use Auth;

class SheetRepository implements ISheetRepository
{
    public function all()
    {
        return Sheet::where("user_id",Auth::user()->id)->get();
    }
    public function currentSheet()
    {
        return Sheet::where("user_id",Auth::user()->id)->where("current_sheet",1)->first();
    }
    public function store(array $data)
    {
        return Sheet::create($data);
    }
    public function get($id)
    {
        return Sheet::find($id);
    }
    public function update(array $data,$sheet_no)
    {
        Sheet::where("user_id",Auth::user()->id)->update(['current_sheet'=>0]);
        Sheet::where("user_id",Auth::user()->id)->where('sheet_no',$sheet_no)->update($data);
    }
    public function delete($id)
    {
        return Sheet::destroy($id);
    }

}
