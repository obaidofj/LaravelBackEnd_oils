@extends('layouts.admin')

@section('content')
@if (Session::has('info'))
        <div class="row">
            <div class="col-md-6">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
        <hr>
    @endif
    <div class="row">
        <div class="col-md-9">
            @foreach ($Ads as $ad)
                <p><strong>{{ $ad->title }}</strong> <a href="{{ route('admin.edit', ['id' => $ad->id]) }}" class="btn btn-info">تحرير</a>
                    <a href="{{ route('admin.delete', ['id' => $ad->id]) }}" class="btn btn-danger">حذف</a></p>
            @endforeach
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.create') }}" class="btn btn-success">اعلان جديد</a>
        </div>
    </div>

@endsection
