@extends('layouts.index-dashboard')


@section('content')


    <!-- text area -->
    <div class="row">
        <form action="{{ route('sending.message') }}" method="POST" enctype="multipart/form-data" id="send">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="موضوع" aria-label="موضوع" name="title" id="title">
                </div>

                <div class="col-md-12 mt-3">
                    <input type="email" multiple class="form-control" placeholder="گیرنده" aria-label="گیرنده" name="reciver">
                </div>

                <div class="col-md-12 mt-3">
                    @include('dashboard.message.texteditor')
                </div>



                <div class="col-12">
                    <button type="submit" class="btn btn-success mt-3">ارسال</button>
                    <a class="btn btn-warning mt-3" id="btn">پیش نویس</a>
                </div>

            </div>

        </form>

        @if (Session::has('success'))
            <div class="alert alert-success text-center mt-2" role="alert">
                {{ Session::get('success') }}
            </div>

        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger text-center mt-2" role="alert">
                {{ Session::get('fail') }}
            </div>

        @endif


    </div>


    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection


@section('texteditor')

    <script src="{{ asset('assets/dist/js/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });

    </script>
    <script>
        var path =  "{{ route('draft.create') }}";
        
        $(document).ready(function() {
            
            $("#btn").click(function() {
                $('#send').attr('action',path); 
                $("#send").submit(); // Submit the form
            });
        });

    </script>
@endsection
