<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Amardokan Seller</title>

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
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="card">
                            <div class="card-body border-bottom p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <img src="{{ asset('assets/images/logo/logo.png') }}" class="img-fluid"
                                        alt="logo">

                                    <p class="text-muted  mb-0">Register to continue Amardokan</p>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="tab-pane active p-3">
                                    <form class="form-horizontal" method="post" action="{{ route('store-reg') }}">
                                        @if (session('warning'))
                                            <span class="alert alert-danger d-block text-center" role="alert">
                                                <strong>{{ session('warning') }}</strong>
                                            </span>
                                        @endif

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-row">
                                            <div class="form-group mb-2 col-md-6">
                                                <label>Mobile as username</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="mobile" required value="{{ old('mobile') }}">
                                                </div>
                                            </div>

                                            <div class="form-group mb-2 col-md-6">
                                                <label>Email</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Enter email" required value="{{ old('email') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6">
                                                <label>Owner name</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="own_name" required value="{{ old('own_name') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6">
                                                <label>Organization Name</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="shop_name" required value="{{ old('shop_name') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-12">
                                                <label>Organization Address</label> <span
                                                    class="text-danger">*</span>
                                                <div class="input-group">
                                                    <textarea class="form-control" name="shop_address"
                                                        required > {{ old('shop_address') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6">
                                                <label>Shop Contact</label> <span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="shop_contact"
                                                        required value="{{ old('shop_contact') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6">
                                                <label>Shop Rin</label> <span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="rin"
                                                        required value="{{ old('rin') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6">
                                                <label>Delivery Area</label> <span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="delArea"
                                                        required value="{{ old('delArea') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6">
                                                <label>District</label> <span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <select class="form-control" name="district" id="district">
                                                        <option></option>
                                                        @foreach ($district as $item)
                                                            <option>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6">
                                                <label>Thana</label> <span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <select class="form-control" name="thana" id="thana">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6">
                                                <label>Business Category</label> <span class="text-danger">*</span>
                                                <div class="input-group">
                                                    @php
                                                        $cat = ['Other', 'Consumer, Variety, Grocery, Mudi', 'Chain store, Supershop, Department Store', 'Bakery, Confectionery, Fast Food, Juice Bar', 'Rice, Meat & Fish, Vegetables', 'Mobile,Telecom, Electronics, Electrical', 'Hotel Motel, Restaurant', 'Travel, Tour Operations, Ticketing', 'Pharmacy', 'Optical Shop', 'Hospital, Diagnostic Center, Dental Care', 'Library, Stationery, office Products', 'Machinery, Hardware', 'Bicycle, Bikes, Automobile', 'Fashion, Shoes Store', 'Salon, Beauty Parlor', 'Furniture, Home Appliances', 'Flower Gift Shop', 'Jewellers', 'Garment', 'Rod, Cement', 'Developer, Engineering', 'C&F, Freight Frowrding', 'Food & Bevarage, Agro', 'Cosmetic, Toiletries'];
                                                    @endphp
                                                    <select class="form-control" name="shop_cat">
                                                        @foreach ($cat as $item)
                                                            <option>{{ $item }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group mb-2 col-md-6">
                                                <label>ABL Plan</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="abl_plan">
                                                        <option value="Basic Plan">Basic Plan</option>
                                                        <option value="Premium Plan">Premium Plan</option>
                                                        <option value="Corporate Plan">Corporate Plan</option>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group mb-2 col-md-6">
                                                <label>Password</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password" placeholder="Enter password" required value="{{ old('password')}}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 col-md-6">
                                                <label>Confirm Password</label><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="conpassword" value="{{ old('conpassword')}}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2 mt-2 col-md-12">
                                                <button class="btn btn-primary btn-block site-color-bg form-control"
                                                    id="btnlogin" type="submit"> Register </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end form-->
                                    <div class="m-3 text-center text-muted">
                                        <p class="mb-0">Have an account ? <a class="site-color-text ml-2"
                                                href="{{ route('store-login-form') }}"> Login here</a></p>
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

<script>
    $(document).ready(function() {


        //thana list
        $('#district').on('change', function() {
            $('#thana').html('<option default></option>');

            var dist=$('#district').val();
            var api="https://portal2.amarbazarltd.com/ablApi/getThana.php?xdistrict="+dist+"&username=ablapi@abl.com&password=1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67";
            $.ajax({  
                url:api, 
                type : "GET",                                  				
                success : function(result) {
                    $.each(result, function(key, val){
                        $('#thana').append('<option>'+val+'</option>');
                    });
                }
            })
        })
    });

</script>
