<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Models\Cost;
use Auth;
class CostController extends Controller
{

    public function index()
    {
        $data = Cost::all();
        return view("cost.index",['data'=>$data]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
