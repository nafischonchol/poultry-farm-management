@extends('main.header-footer')
@section('main_content')
<section class="page-content-wrapper">
    <div class="page-content border border-primary rounded">
        @include("mgs.index")
        <section for="order-status">
            <div class="row">

                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-primary">
                        <div class="card-body">
                            <div class="media align-items-center text-center">
                                <div class="media-body">
                                    @include("dashboard.set-sheet")

                                    <p class="mb-0 text-white" data-toggle="modal" data-target="#sheetSet" style="cursor: pointer;">বর্তমান শিট</p>
                                    <h4 class="mb-0 font-weight-bold text-white">{{$current_sheet}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-primary">
                        <div class="card-body">
                            <div class="media align-items-center text-center">
                                <div class="media-body">
                                    <p class="mb-0 text-white">মোট খরচ</p>
                                    <h4 class="mb-0 font-weight-bold text-white">{{$cost['total']}}৳</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-success">
                        <div class="card-body">
                            <div class="media align-items-center text-center">
                                <div class="media-body">
                                    <p class="mb-0 text-white">মোট খাদ্য বস্তা</p>
                                    <h4 class="mb-0 font-weight-bold text-white">
                                        {{$cost['khaddo_bosta']}} টা
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-info">
                        <div class="card-body">
                            <div class="media align-items-center text-center">
                                <div class="media-body">

                                    <p class="mb-0 text-white">মোট খাদ্য খরচ</p>
                                    <h4 class="mb-0 font-weight-bold text-white">
                                        {{$cost['khaddo']}}৳
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section for="stock-status">
            <div class="row">
                <div class="col-12 col-lg-4 text-center">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="mb-0">মোট অটো ভাড়া</p>
                                    <h4 class="mb-0 font-weight-bold">
                                        {{$cost['auto']}}৳
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 text-center">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="mb-0">মোট ঔষধ</p>
                                    <h4 class="mb-0 font-weight-bold">
                                        {{$cost['osud']}}৳
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 text-center">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="mb-0">মোট কাঠের গুঁড়া খরচ</p>
                                    <h4 class="mb-0 font-weight-bold">
                                       {{$cost['kather_ghura']}}৳
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>


@endsection
