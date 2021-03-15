@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">The beautiful Laravel</p>
        </div>
    </div>
    @foreach($Ads as $Ad)
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="post-title">{{$Ad['title']}}</h1>
            <p>{{$Ad['content']}}!</p>
            <p><a href="{{ route('blog.post', ['id' => 1]) }}">Read more...</a></p>
        </div>
    </div>
    <hr>

@endsection
