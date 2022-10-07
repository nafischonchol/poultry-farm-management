<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Repositories\ISheetRepository;
use App\Repositories\ICostRepository;


class CostController extends Controller
{
    private $mainRepo;
    private $sheet;
    public function __construct(ICostRepository $mainRepo,ISheetRepository $sheet)
    {
        $this->mainRepo = $mainRepo;
        $this->sheet = $sheet;
    }

    public function index()
    {
        $data = $this->mainRepo->all();
        $sheet_list = $this->sheet->all();
        return view("cost.index",['data'=>$data,'sheet_list'=>$sheet_list]);
    }


    public function create()
    {
        $sheet_list = $this->sheet->all();
        return view("cost.create",['sheet_list'=>$sheet_list]);
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
            if($data['category'] == -1)
                $data['category'] = trim($data['category_onno']);
            else
            {
                $data['category'] = trim($data['category']);
                $data['category_onno'] = NULL;
            }

            $data['name'] = trim($data['name']);
            $data['user_id'] = Auth::user()->id;
            $this->mainRepo->store($data);
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return back()->with("warning",$e->getMessage());
        }
        return redirect(route("cost.index"))->with("success","Cost created successfully!");
    }


    public function filter(Request $request)
    {
        $data = $this->mainRepo->filter($request->input());
        $sheet_list = $this->sheet->all();
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
