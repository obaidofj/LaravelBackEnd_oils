@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="quote">مشحمة زيتون - لوحة التحكم</h1>
        </div>
    </div>
    <br><br>
    @if (!Session::has('info'))
        <hr>
    @endif
    @if (Session::has('info'))
        <div class="row">
            <div class="col-md-6">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
        <hr>
    @endif
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.create') }}" class="btn btn-success">اعلان جديد</a>
        </div>
        <div class="col-md-3">
            <p><a href="{{ route('admin.toedit') }}" class="btn btn-success"><strong>تعديل على الاعلانات</strong> </a></p>
        </div>
    </div>
    <hr>

@endsection
