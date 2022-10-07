<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Repositories\ISheetRepository;

class SheetController extends Controller
{
    private $mainRepo;
    public function __construct(ISheetRepository $mainRepo)
    {
        $this->mainRepo = $mainRepo;
    }

    public function setCurrent(Request $request)
    {
        DB::beginTransaction();
        try{
            if($request->sheet_no == 0)
                return back()->with("warning","শিট নাম্বার সিলেক্ট করতে হবে");
            $data = $request->input();
            $data['user_id'] = Auth::user()->id;
            $data['current_sheet'] = 1;
            $this->mainRepo->update($data,$request->sheet_no);
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return back()->with("warning",$e->getMessage());
        }
        return back()->with("success","Sheet set successfully done!");
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'start_date' => ['required', 'string', 'max:255'],
                'sheet_no' => ['required', 'string', 'max:255']
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
        return back()->with("success","Sheet created successfully done!");
    }
}
