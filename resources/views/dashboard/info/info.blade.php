@extends('layouts.index-dashboard')


@section('content')



    

    <!-- insert form   -->
        @if ($completed)
        
        @include('dashboard.info.infocard')

        @else
        @include('dashboard.info.infoform')
        @endif
        
  


    


        @if(Session::has('success'))                                      
        <div class="alert alert-success text-center mt-2" role="alert">
            {{ Session::get('success')}}
          </div>

        @endif



        @if ($errors->any())

            
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger mt-2" role="alert">
                    {{ $error }}
                  </div>
                @endforeach

        @endif
@endsection
