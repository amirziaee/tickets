@extends('layouts.index-dashboard')

@section('content')

<div class="row">
<div class="col-md-12">
  <div class="card text-dark bg-light mb-3">
    <div class="card-header"><b>{{ $message->sender }}</b></div>
    <div class="card-body">
      <h5 class="card-title">{{ $message->title }}</h5>
      <p class="card-text">{{ $message->body }}</p>
    </div>
</div>
<div class="col-md-12">
  <div class="d-grid gap-2">
    <a href="{{ route('sent.message') }}" class="btn btn-primary ">بازگشت</a>
    <a href="{{ route('delete.single.message',$message->id) }}" class="btn btn-danger ">حذف</a>
  </div>
</div>
</div>

@endsection