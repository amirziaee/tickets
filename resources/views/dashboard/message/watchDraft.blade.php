@extends('layouts.index-dashboard')


@section('content')


    <!-- text area -->
    <div class="row">
        <form action="{{ route('draft.send',$message->id) }}" method="POST"  id="send">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="موضوع" aria-label="موضوع" name="title" id="title" value="{{ $message->title }}">
                </div>
                <div class="col">
                    <input type="email" multiple class="form-control" placeholder="گیرنده" aria-label="گیرنده"
                        name="reciver" id="reciver" value="{{ $message->reciver }}">



                </div>

                <div class="col-md-12 mt-3">
                    @include('dashboard.message.texteditor')
                </div>



                <div class="col-12">
                    <button type="submit" class="btn btn-success mt-3">ارسال</button>
                    <a class="btn btn-warning mt-3" id="btn" href="{{ route('draft.message') }}">بازگشت</a>
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

@endsection
