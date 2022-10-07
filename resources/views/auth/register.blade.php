<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>PFM</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

    </style>
</head>

<body>

    <!-- Log In page -->
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center col-sm-12">
                <div class="row">
                    <div class="col-lg-12 mx-auto col-sm-12">
                        <div class="card">
                            <div class="card-body border-bottom p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <img src="{{ asset('assets/images/logo/logo.png') }}" class="img-fluid"
                                        alt="logo">

                                    <p class="text-muted  mb-0">Register to continue PFM</p>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="tab-pane active p-3">
                                    <form class="form-horizontal" method="post" action="{{ route('register') }}">
                                        @if (session('warning'))
                                            <span class="alert alert-danger d-block text-center" role="alert">
                                                <strong>{{ session('warning') }}</strong>
                                            </span>
                                        @endif

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-row">

                                            <div class="form-group mb-2 col-md-6 col-sm-6">
                                                <label>ইমেইল</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Enter email" required value="{{ old('email') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6 col-sm-6">
                                                <label>মোবাইল</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="mobile"
                                                        placeholder="Enter number" required value="{{ old('mobile') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6 col-sm-6">
                                                <label>আপনার নাম</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6 col-sm-6">
                                                <label>ফার্মের ঠিকানা</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="address" required value="{{ old('address') }}">
                                                </div>
                                            </div>

                                            <div class="form-group mb-2 col-md-6 col-sm-6">
                                                <label>পাসওয়ার্ড</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password" placeholder="Enter password" required value="{{ old('password')}}">
                                                </div>
                                            </div>

                                            <div class="form-group mb-2 mt-2 col-md-12 col-sm-12">
                                                <button class="btn btn-primary btn-block site-color-bg form-control"
                                                    id="btnlogin" type="submit"> Register </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end form-->
                                    <div class="m-3 text-center text-muted">
                                        <p class="mb-0">একাউন্ট আগে থেকেই আছে? <a class="site-color-text ml-2"
                                                href="{{ route('login') }}"> লগইন পৃষ্ঠায় ফিরে যান</a></p>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>

</body>

</html>

