@extends('layouts.index-dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="{{ route('do.search') }}">
                
@csrf

                <div class="col-md-12 mt-3">
                  <label for="kesaerch" class="form-label">عبارت جستو جو :</label>
                  <input type="text" class="form-control" id="keysearch" placeholder="عبارت مورد نظر را تایپ کنید" name="key">
                </div>


                <div class="col-md-12 mt-3">
                  <label for="inputsearch" class="form-label">جسجتو جو براساس :</label>
                  <select id="inputsearch" class="form-select" name="searchby">
                    <option value="email">ایمیل</option>
                    <option value="body">محتوا</option>
                    <option value="title">عنوان</option>

                  </select>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary my-3">جستوجو</button>
                </div>
              </form>
            </div>


            
            @if(Session::has('fail'))                                      
            <div class="alert alert-danger text-center" role="alert">
                {{ Session::get('fail')}}
              </div>

            @endif
        </div>

    @endsection
