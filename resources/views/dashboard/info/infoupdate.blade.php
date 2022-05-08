@extends('layouts.index-dashboard')


@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <div class="text-center h2">فرم اطلاعات فردی</div>
    </div>
    <form class="row g-3" action="{{ route('updated.info',$information->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputAge" class="form-label">سن:</label>
            <input type="number" class="form-control" id="inputAge" name="age" value="{{ old('age') ??  $information->age }}">
        </div>
        <div class="col-md-6">
            <label for="inputPhone" class="form-label">شماره تماس:</label>
            <input type="text" class="form-control" id="inputPhone" name="phone" value="{{ old('phone') ?? $information->phone }}">
        </div>

        <div class="col-md-6">
            <label for="inputCity" class="form-label">شهر:</label>
            <input type="text" class="form-control" id="inputCity" name="city" value="{{ old('city') ?? $information->city }}">
        </div>
        <div class="col-md-6">
            <label for="inputCountry" class="form-label">کشور:</label>
            <input type="text" class="form-control" id="inputCountry" name="country" value="{{ old('country') ?? $information->country }}">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">عکس پروفایل:</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">ذخیره</button>
        </div>
    </form>


    @if ($errors->any())

            
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger mt-2" role="alert">
        {{ $error }}
      </div>
    @endforeach

@endif


@endsection