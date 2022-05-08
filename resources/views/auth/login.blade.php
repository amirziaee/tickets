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
    <title>login</title>

</head>

<body>



    <div class="container-fluid">


        <div class="row">
            <div class="col-md-4 center ">
                <div class="box ">
                    <div class="text-center mb-5">
                        <img src="{{ asset('assets/dist/img/icons8-mail-96.png') }}" class="rounded" alt="...">
                    </div>
                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf

                        <div class="col-sm-7 mx-auto ">
                            <label for="formGroupExampleInput" class="form-label">ایمیل:</label>
                            <input type="text" class="form-control " id="formGroupExampleInput"
                                placeholder="لطفا ایمیل خود را وارد کنید" name = 'email'>
                        </div>
                        <div class="col-sm-7 mx-auto">
                            <label for="formGroupExampleInput2" class="form-label">رمز عبور:</label>
                            <input type="password" class="form-control" id="formGroupExampleInput2"
                                placeholder="لطفا پسورد خود را وارد کنید" name="password">
                        </div>
                        <div class="col-sm-7 mx-auto">
                            <button type="submit" class="m-2 btn btn-primary">ورود</button>
                            <a class="m-2 btn btn-success" href="{{ route('register') }}" role="button">ساخت اکانت جدید</a>
                           
                        </div>

                    </form>
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
                </div>

            </div>
        </div>


    </div>

    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js.map') }}"></script>
</body>

</html>
