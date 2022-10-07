@extends('main.header-footer')
@section('main_content')

<section class="page-content-wrapper">
    <div class="page-content">
        <div class="card card-primary col-md-12">
            <div class="card-header row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title pull-left m-auto">নতুন খরচ অ্যাড</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @include('mgs.index')
                        <div class="form">
                            <form class="form-horizontal" method="post" action="{{route("cost.store")}}" >
                                @csrf
                                <div class="form-row">
                                    <div class="form-group mb-2 col-md-6">
                                        <label>শিট নাম্বার</label><span class="text-danger">*</span>
                                        <select class="form-control" name="sheet_no">
                                           @if (isset($sheet_list[0]))
                                               @foreach ($sheet_list as $item)
                                                    @if (session("current_sheet") == $item->sheet_no)
                                                        <option selected>{{$item->sheet_no}}</option>
                                                    @else
                                                        <option>{{$item->sheet_no}}</option>
                                                    @endif
                                               @endforeach
                                           @endif
                                        </select>
                                    </div>
                                    <div class="form-group mb-2 col-md-6">
                                        <label>তারিখ</label><span class="text-danger">*</span>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="date" required value="{{date('Y-m-d')}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 col-md-6">
                                        <label>খরচের খাত</label><span class="text-danger">*</span>
                                        <div class="input-group">
                                            <select class="form-control" name="category" id="category">
                                                <option>বাচ্চা</option>
                                                <option>খাদ্য</option>
                                                <option>ঔষধ</option>
                                                <option>অটো ভাড়া</option>
                                                <option value="-1">অন্যান্য</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 col-md-6" id="category_onno_div">
                                        <label>অন্যান্য খাত উল্লেখ করুন</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="category_onno"  >
                                        </div>
                                    </div>

                                    <div class="form-group mb-2 col-md-6">
                                        <label>প্রোডাক্ট নাম</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 col-md-6">
                                        <label>দোকান এর ঠিকানা</label><span class="text-danger">*</span>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="shop_address" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 col-md-6">
                                        <label>প্রতি পিস মূল্য</label><span class="text-danger">*</span>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="price" required >
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 col-md-6">
                                        <label>পরিমান</label><span class="text-danger">*</span>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="qty" required >
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 col-md-6" id="bonus_qty_div">
                                        <label>বোনাস পরিমান</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="bonus_qty" value=0>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 col-md-12">
                                        <label>অতিরিক্ত নোট</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="note" >
                                        </div>
                                    </div>

                                    <div class="form-group mb-2 mt-2 col-md-12">
                                        <button class="btn btn-primary btn-block site-color-bg form-control" id="btnlogin" type="submit">
                                            তৈরি করুন</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{-- card end --}}
    </div>
</section>
@endsection
@section("js")
<script>
    $(document).ready(function(){
        $("#category_onno_div").hide();
        $("#category").change(function(){
            let category = $("#category").val();
            if(category == -1)
            {
                $("#category_onno_div").show();
            }
            else
            {
                $("#category_onno_div").hide();
            }
        })
    });
</script>
@endsection
