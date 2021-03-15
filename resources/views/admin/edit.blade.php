@extends('layouts.admin')

@section('content')
    @include('sub.errors')
    <div class="row">
        <div class="col-md-12">
            <form id="editAd" action="{{ route('admin.update') }}" method="post">
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $Ad->title }}">
                </div>
                <div class="form-group">
                    <label for="content">المحتوى</label>
                    <textarea class="form-control" form="editAd" id="content" name="content" >{{ $Ad->content }} </textarea>
                </div>
                <div class="form-group">
                    <label for="pic">الصورة</label>
                    <input type="file" class="form-control" id="pic" name="pic">
                </div>
                <div class="form-group">
                    <label for="contentonly">اظهار المحتوى فقط</label>
                    <input type="checkbox" class="form-control" id="contentonly" name="contentonly" value="{{ $Ad->contentonly }}" >
                </div>
                <div class="form-group">
                    <label for="piconly">اظهار الصورة فقط</label>
                    <input type="checkbox" class="form-control" id="piconly" name="piconly" value="{{ $Ad->piconly }}">
                </div>
                <input type="hidden" name="id" value="{{ $AdId }} ">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </form>
        </div>
    </div>
@endsection
