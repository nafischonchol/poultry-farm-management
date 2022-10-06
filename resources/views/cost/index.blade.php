@extends('main.header-footer')
@section('main_content')

<section class="page-content-wrapper">
    <div class="page-content">
        <div class="card card-primary col-md-12">
            <div class="card-header row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title pull-left m-auto">খরচের হিসাব</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <form method="get" action="#" class="row">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-12 col-md-3 col-sm-3">
                        <div class="form-group m-auto">
                            <select class="form-control text-center" name="sheet_no">
                                <option value="0">শিট নাম্বার</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-sm-3">
                        <div class="form-group m-auto">
                            <select class="form-control text-center" name="category">
                                <option value=0>খরচের খাত</option>
                                <option>বাচ্চা</option>
                                <option>খাদ্য বস্তা</option>
                                <option>ঔষধ</option>
                                <option>অটো ভাড়া</option>
                                <option>অন্যান্য</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4">
                        <div class="form-group m-auto">
                            <input type="text" class="form-control text-center" placeholder="প্রোডাক্ট নাম">
                        </div>
                    </div>

                    <div class="col-12 col-md-2 col-sm-2">
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
                                    <th>অতিরিক্ত নোট</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($data[0]))
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->category}}</td>
                                            <td>{{$item->shop_address}}</td>
                                            <td>{{ $item->qty}}</td>
                                            <td>{{ $item->price}}</td>
                                            <td>{{ $item->price * $item->qty}}</td>
                                            <td>{{ $item->note}}</td>
                                            <td><a href="" class="btn btn-info">Edit</a></td>
                                        </tr>
                                    @endforeach
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

