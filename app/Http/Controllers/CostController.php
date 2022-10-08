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
                'category' => ['required', 'string', 'max:255'],
                'price' => ['required', 'max:255']
            ]);
            $data = $request->input();
            if($data['category'] == -1)
                $data['category'] = trim($data['category_onno']);
            else
            {
                $data['category'] = trim($data['category']);
                $data['category_onno'] = NULL;
            }
            if(empty($data['qty']))
                $data['qty'] = 0;
            if(empty($data['bonus_qty']))
                $data['bonus_qty'] = 0;

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

    public function edit($id)
    {
        try{
            $data = $this->mainRepo->get($id);
            if(!isset($data))
                return back()->with("warning","খরচের হিসাব খুঁজে পাওয়া যায়নি");

            $sheet_list = $this->sheet->all();
            return view("cost.edit",['data'=>$data,'sheet_list'=>$sheet_list]);
        }
        catch(\Exception $e)
        {
            return back()->with("warning",$e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'date' => ['required', 'string', 'max:255'],
                'sheet_no' => ['required', 'string', 'max:255'],
                'category' => ['required', 'string', 'max:255'],
                'price' => ['required', 'max:255']
            ]);

            $data = $request->input();
            if($data['category'] == -1 )
                $data['category'] = trim($data['category_onno']);
            else if($data['category'] != $data['old_category'])
            {
                $data['category'] = trim($data['category']);
                $data['category_onno'] = NULL;
            }

            if(empty($data['qty']))
                $data['qty'] = 0;
            if(empty($data['bonus_qty']))
                $data['bonus_qty'] = 0;

            $data['name'] = trim($data['name']);
            $this->mainRepo->update($data,$id);
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return back()->with("warning",$e->getMessage());
        }
        return back()->with("success","খরচ সঠিক ভাবে এডিট করা হয়েছে");
    }
    public function filter(Request $request)
    {
        $data = $this->mainRepo->filter($request->input());
        $sheet_list = $this->sheet->all();
        return view("cost.index",['data'=>$data,'sheet_list'=>$sheet_list]);
    }




    public function destroy($id)
    {
        DB::beginTransaction();
        try{

            $this->mainRepo->delete($id);
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return back()->with("warning",$e->getMessage());
        }
        return back()->with("success","খরচ সঠিক ভাবে বাদ দেওয়া হয়েছে");
    }
}
