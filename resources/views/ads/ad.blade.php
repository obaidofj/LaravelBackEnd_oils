@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">{{ $Ad->title }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>{{ $Ad->content }}</p>
        </div>
    </div>
@endsection
