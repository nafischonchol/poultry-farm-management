<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Repositories\IBacchaOjunRepository;
use App\Repositories\ISheetRepository;


class BacchaOjunController extends Controller
{
    private $mainRepo;
    private $sheet;

    public function __construct(IBacchaOjunRepository $mainRepo,ISheetRepository $sheet)
    {
        $this->mainRepo = $mainRepo;
        $this->sheet = $sheet;

    }

    function index()
    {
        $data = $this->mainRepo->all(session("current_sheet"));
        $sheet_list = $this->sheet->all();
        return view("baccha.ojun.index",['data'=>$data,'sheet_list'=>$sheet_list]);
    }
    function store(Request $request)
    {
        DB::beginTransaction();
        try{

            $request->validate([
                'sheet_no' => ['required', 'string', 'max:255'],
                'qty' => ['required',  'max:255'],
                'age' => ['required',  'max:255'],
                'kg' => ['required',  'max:255','numeric'],
               //ওজন নাম্বার হতে হবে
            ]);
            $data = $request->input();
            $data['user_id'] = Auth::user()->id;
            $this->mainRepo->store($data);
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return back()->with("warning",$e->getMessage());
        }
        return back()->with("success","বাচ্চা ওজন সঠিক ভাবে যোগ করা হয়েছে");
    }
    function update(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'sheet_no' => ['required', 'string', 'max:255'],
                'qty' => ['required',  'max:255'],
                'age' => ['required',  'max:255'],
                'kg' => ['required',  'max:255','numeric'],
            ]);
            $data = $request->input();
            $this->mainRepo->update($data,$data['id']);
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return back()->with("warning",$e->getMessage());
        }
        return back()->with("success","বাচ্চা ওজন সঠিক ভাবে এডিট করা হয়েছে");
    }

    function distroy($id)
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
        return back()->with("success","বাচ্চা ওজন সঠিক ভাবে বাদ দেওয়া হয়েছে");
    }
    function getSingleInfo($id)
    {
        try{
            $data=$this->mainRepo->get($id);
            return $data;
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function filter(Request $request)
    {
        $data = $this->mainRepo->filter($request->input());
        $sheet_list = $this->sheet->all();
        return view("baccha.ojun.index",['data'=>$data,'sheet_list'=>$sheet_list]);
    }
}
