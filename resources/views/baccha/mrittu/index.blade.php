@extends('main.header-footer')
@section('main_content')

<section class="page-content-wrapper">
    <div class="page-content">
        <div class="card card-primary col-md-12">
            <div class="card-header row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title pull-left m-auto">বাচ্চা মৃত্যু হিসাব</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <form method="get" action="{{route("cost.filter")}}" class="row">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-12 col-md-3 col-sm-3">
                        <div class="form-group m-auto">
                            <small>শিট নাম্বার</small>
                            <select class="form-control text-center" name="sheet_no">
                               @if (isset($sheet_list[0]))
                                    @foreach ($sheet_list as $item)
                                        @if ($item->sheet_no == session("current_sheet"))
                                            <option selected>{{$item->sheet_no}}</option>
                                        @else
                                            <option>{{$item->sheet_no}}</option>
                                        @endif
                                    @endforeach
                               @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-sm-3">
                        <div class="form-group m-auto">
                            <small>খরচের খাত</small>
                            <select class="form-control text-center" name="category">
                                <option value=0>খরচের খাত</option>
                                <option>বাচ্চা</option>
                                <option>খাদ্য</option>
                                <option>ঔষধ</option>
                                <option>অটো ভাড়া</option>
                                <option>অন্যান্য</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4">
                        <div class="form-group m-auto">
                            <small>প্রোডাক্ট নাম</small>
                            <input type="text" class="form-control text-center"  name="name">
                        </div>
                    </div>

                    <div class="col-12 col-md-2 col-sm-2">
                        <br>
                        <button type="submit" class="btn btn-info col">খুজো</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="row">
                    @include("mgs.index")
                    <div class="table-responsive col-md-12 col-sm-12">
                        <table id="myproductList" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>তারিখ</th>
                                    <th>প্রোডাক্ট নাম</th>
                                    <th>খরচের খাত</th>
                                    <th>দোকান এর ঠিকানা</th>
                                    <th>পরিমান</th>
                                    <th>প্রতি পিস মূল্য</th>
                                    <th>মোট মূল্য</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($data[0]))
                                    @php
                                        $totQty=0;
                                        $totPrice=0;
                                    @endphp
                                    @foreach ($data as $item)
                                        @php
                                            $totQty += $item->qty;
                                            $totPrice += ($item->price * $item->qty);
                                        @endphp
                                        <tr>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->category}}</td>
                                            <td>{{$item->shop_address}}</td>
                                            <td>{{ $item->qty}}</td>
                                            <td>{{ $item->price}}</td>
                                            <td>{{ $item->price * $item->qty}}</td>
                                            <td><a href="" class="btn btn-info">Edit</a></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="4" class="text-right">মোট পরিমান</th>
                                        <td>{{$totQty}} পিস</td>
                                        <th>মোট মূল্য</th>
                                        <td colspan="2">{{$totPrice}}৳</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>{{-- card end --}}
    </div>
</section>
@endsection

