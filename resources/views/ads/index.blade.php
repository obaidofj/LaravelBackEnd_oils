@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">مشحمة زيتون توفير افضل الخدمات</p>
        </div>
    </div>
    @foreach($Ads as $Ad)
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="post-title">{{$Ad->title}}</h1>
            <p>{{$Ad->content}}!</p>
            <p><a href="{{ route('ad', ['id' => $Ad->id]) }}">Read more...</a></p>
        </div>
    </div>
    <hr>
    @endforeach
@endsection
