<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/dist/img/favicon.ico') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/custom.css') }}">
    <title>register</title>
</head>
<body>



    <div class="container-fluid">


        <div class="row">
            <div class="col-md-4 center-reg ">
                <div class="box ">
                    <div class="text-center mb-5">
                        <img src="{{ asset('assets/dist/img/icons8-mail-96.png') }}" class="rounded" alt="...">
                    </div>
                    <form action="{{ route('auth.create') }}" method="POST">
                        @csrf
                        <div class="col-sm-7 mx-auto ">
                            <label for="fullName" class="form-label">نام کامل:</label>
                            <input type="text" class="form-control " id="fullName"
                                placeholder="نام و نام خانوادگی" name="fullname" value="{{ old('fullname') }}">
                        </div>

                        <div class="col-sm-7 mx-auto ">
                            <label for="email" class="form-label">ایمیل:</label>
                            <input type="email" class="form-control " id="email"
                                placeholder="لطفا ایمیل خود را وارد کنید" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="col-sm-7 mx-auto">
                            <label for="password" class="form-label">رمز عبور:</label>
                            <input type="password" class="form-control" id="password"
                                placeholder="لطفا پسورد خود را وارد کنید" name="password">
                        </div>
                        <div class="col-sm-7 mx-auto">
                            <label for="password-confirm" class="form-label">تکرار رمز عبور:</label>
                            <input type="password" class="form-control" id="password-confirm"
                                placeholder="لطفا پسورد خود را تکرار کنید" name="password_confirmation">
                        </div>
                        <div class="col-sm-7 mx-auto">
                            <button type="submit" class="m-2 btn btn-success">ثبت نام</button>
                            <a class="btn btn-primary" href="{{ route('login') }}" role="button">وارد شوید</a>
                        </div>

                        @if(Session::has('success'))                                      
                        <div class="alert alert-success text-center" role="alert">
                            {{ Session::get('success')}}
                          </div>
    
                        @endif

                        
                        @if(Session::has('fail'))                                      
                        <div class="alert alert-danger text-center" role="alert">
                            {{ Session::get('fail')}}
                          </div>
    
                        @endif
    
    

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="list-style: none;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    </form>
                </div>
            </div>
        </div>


    </div>

    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js.map') }}"></script>
</body>

</html>