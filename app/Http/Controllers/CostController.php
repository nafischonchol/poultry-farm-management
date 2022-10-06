<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Models\Cost;
use App\Models\Sheet;
use Auth;
class CostController extends Controller
{

    public function index()
    {
        $data = Cost::where("sheet_no",session('current_sheet'))->where("user_id",Auth::user()->id)->get();
        $sheet_list = Sheet::where("user_id",Auth::user()->id)->get();

        return view("cost.index",['data'=>$data,'sheet_list'=>$sheet_list]);
    }


    public function create()
    {
        return view("cost.create");
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'date' => ['required', 'string', 'max:255'],
                'sheet_no' => ['required', 'string', 'max:255'],
                'shop_address' => ['required', 'string'],
                'category' => ['required', 'string', 'max:255'],
                'price' => ['required', 'max:255'],
                'qty' => ['required',  'max:255']
            ]);
            $data = $request->input();
            $data['user_id'] = Auth::user()->id;
            Cost::create($data);
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return back()->with("warning",$e->getMessage());
        }
        return redirect(route("cost.index"))->with("success","Cost created successfully!");
    }


    public function fiter(Request $request)
    {
        $query = Cost::where("sheet_no",$request->sheet_no)->where("user_id",Auth::user()->id);
        if($request->category !=0)
            $query->where("category",$request->category);
        if(!empty($request->name))
            $query->where('name', 'like', '%' . $request->name . '%');

        $data = $query->get();
        $sheet_list = Sheet::where("user_id",Auth::user()->id)->get();
        return view("cost.index",['data'=>$data,'sheet_list'=>$sheet_list]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
