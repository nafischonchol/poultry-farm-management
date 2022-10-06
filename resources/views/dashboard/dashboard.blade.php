@extends('main.header-footer')
@section('main_content')
<section class="page-content-wrapper">
    <div class="page-content">
        @include("mgs.index")
        <section for="order-status">
            <div class="row">

                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-primary">
                        <div class="card-body">
                            <div class="media align-items-center text-center">
                                <div class="media-body">
                                    <p class="mb-0 text-white" data-toggle="modal" data-target="#sheetSet" style="cursor: pointer;">বর্তমান শিট</p>
                                    <h4 class="mb-0 font-weight-bold text-white">6</h4>
                                    @include("dashboard.set-sheet")
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
                                    <h4 class="mb-0 font-weight-bold text-white">15000৳</h4>
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
                                        25 টা
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
                                        15000৳
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
                                        1000৳
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
                                        2000৳
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
                                    <p class="mb-0">মোট বুশি খরচ</p>
                                    <h4 class="mb-0 font-weight-bold">
                                        1200৳
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section for="ammount-status">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="media align-items-center text-primary">
                                <div class="media-body">
                                    <p class="mb-0">Total Order Ammount</p>
                                    <h4 class="mb-0 font-weight-bold text-left">
                                        @if(isset($orderAmt['Orders']))
                                            {{$orderAmt['Orders']}}
                                        @else
                                            0
                                        @endif
                                         /-
                                    </h4>
                                </div>
                                <div class="mt-4">
                                    <h1>৳</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="media align-items-center text-success">
                                <div class="media-body">
                                    <p class="mb-0">Total Deliverd Ammount</p>
                                    <h4 class="mb-0 font-weight-bold text-left">
                                    @if(isset($orderAmt['Delivered']))
                                        {{$orderAmt['Delivered']}}
                                    @else
                                        0
                                    @endif
                                    /-
                                </h4>
                                </div>
                                <div class="mt-4">
                                    <h1>৳</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="media align-items-center text-info">
                                <div class="media-body">
                                    <p class="mb-0">Total Processing</p>
                                    <h4 class="mb-0 font-weight-bold text-left">
                                        @if(isset($orderAmt['Processing']))
                                            {{$orderAmt['Processing']}}
                                        @else
                                            0
                                        @endif
                                        /-
                                    </h4>
                                </div>
                                <div class="mt-4">
                                    <h1>৳</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="media align-items-center text-danger">
                                <div class="media-body">
                                    <p class="mb-0">Payable to Amardokan</p>
                                    <h4 class="mb-0 font-weight-bold text-left">
                                        @if(isset($orderAmt['payable']))
                                            {{$orderAmt['payable']}}
                                        @else
                                            0
                                        @endif
                                        /-
                                    </h4>
                                </div>
                                <div class="mt-4">
                                    <h1>৳</h1>
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
