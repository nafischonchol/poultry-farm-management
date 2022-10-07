<section for="baccha">
    <div class="row">
        <div class="col-12 col-lg-3 col-sm-6 text-center">
            <div class="card radius-15 bg-success text-light">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="mb-0">মোট বাচ্চা খরচ</p>
                            <h4 class="mb-0 font-weight-bold">
                                {{ $cost['baccha_cost'] }}৳
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-sm-6 text-center">
            <div class="card radius-15 bg-success text-light">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="mb-0">মোট বাচ্চা</p>
                            <h4 class="mb-0 font-weight-bold">
                                {{ $cost['baccha_qty'] }}+{{ $cost['baccha_bonus_qty'] }}
                                ({{ $cost['total_baccha_qty'] }})
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-sm-6 text-center">
            <div class="card radius-15 bg-success text-light">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="mb-0">বাচ্চা মৃত্যু</p>
                            <h4 class="mb-0 font-weight-bold">
                                {{ $baccha['mrittu'] }} পিস
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-sm-6 text-center">
            <div class="card radius-15 bg-success text-light">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="mb-0">বাচ্চা বিক্রয়</p>
                            <h4 class="mb-0 font-weight-bold">
                                {{ $baccha['bikri'] }} পিস
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-sm-6 text-center">
            <div class="card radius-15 bg-success text-light">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="mb-0">অবশিষ্ট বাচ্চা</p>
                            <h4 class="mb-0 font-weight-bold">
                                {{ $cost['total_baccha_qty'] - $baccha['mrittu'] - $baccha['bikri'] }} পিস
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
