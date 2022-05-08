@extends('layouts.index-dashboard')


@section('content')


    <div class="row">
        @if (empty($messages))
            <div class="alert alert-warning text-center mt-2" role="alert">
                پیامی دریافت نشده است
            </div>
        @else
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">موضوع</th>
                            <th scope="col">گیرنده</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">مشاهده</th>
                        </tr>
                    </thead>
                    <tbody>




                        @foreach ($messages as $message)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $message->title }}</td>
                                <td>{{ $message->reciver }}</td>
                                <td>{{ $message->status == 'sent' ? 'ارسال شده' : null}}</td>
                                <td><a href="{{ route('show.sent.message', $message->id) }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg></a>

                                    <a href="{{ route('delete.single.message', $message->id) }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-eraser" viewBox="0 0 16 16">
                                            <path
                                                d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z" />
                                        </svg></a>

                                </td>


                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>

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
        @endif


    </div>

    </div>




@endsection
