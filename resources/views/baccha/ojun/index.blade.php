@extends('main.header-footer')
@section('main_content')

<section class="page-content-wrapper">
    <div class="page-content">
        <div class="card card-primary col-md-12">
            <div class="card-header row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title pull-left m-auto">বাচ্চা ওজন হিসাব</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ojunAdd">ওজন যোগ করুন</button>
                        </div>
                    </div>
                </div>
                @include("baccha.ojun.create")
                @include("baccha.ojun.edit")

            </div>
            <div class="card-header">
                <form method="get" action="{{route("baccha.ojun.filter")}}" class="row">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-2 col-sm-2"></div>
                    <div class="col-12 col-md-6 col-sm-6">
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
                                    <th>শিট নাম্বার</th>
                                    <th>তারিখ</th>
                                    <th>বয়স</th>
                                    <th>পরিমান</th>
                                    <th>ওজন</th>
                                    <th>অতিরিক্ত নোট</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($data[0]))
                                    @php
                                        $totQty=0;
                                        $totKg=0;
                                    @endphp
                                    @foreach ($data as $item)
                                        @php
                                            $totQty += $item->qty;
                                            $totKg += $item->kg;
                                        @endphp
                                        <tr>
                                            <td>{{$item->sheet_no}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->age}} দিন</td>
                                            <td>{{$item->qty}} পিস</td>
                                            <td>{{$item->kg}} KG</td>
                                            <td>{{$item->note}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-info editItem" data-toggle="modal" data-target="#ojunEdit" data-id="{{$item->id}}">Edit</button>

                                                <a href="{{route('baccha.ojun.destroy',['id'=>$item->id])}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="3" class="text-right">মোট</th>
                                        <td>{{$totQty}} পিস</td>
                                        <td colspan="3">{{$totKg}} KG</td>
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

@section("js")
<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    $(document).ready(function(){
        $(".editItem").click(function(){
            let id = $(this).data("id");
            $.ajax({
                'type': "GET",
                'global': false,
                'url': "get-single-info/" + id,
                'success': function(data) {
                    console.log(data)
                    $("#id").val(data.id)
                    $("#sheet_no").val(data.sheet_no).change();
                    $("#qty").val(data.qty)
                    $("#age").val(data.age)
                    $("#date").val(data.date)
                    $("#kg").val(data.kg)
                }
            });

        });
    });
</script>
@endsection

