@extends('layouts.master')

@section('content')
    {{-- @if (true)
        <h1>صح</h1>
    @else
        <h1>خطا</h1>
    @endif

    @for ($i = 0; $i < 5; $i++)
        <p>{{ $i }}</p>
    @endfor

     <?php $ar = ['a1', 'a2', 'a3']; ?>
    @foreach ($ar as $x)
        {{ $x }} <br>
    @endforeach
    <br>
{{"<strong>test</strong>"}}
<br>
{!!"<strong>test</strong>"!!} --}}

<h1>     معلومات الزبائن</h1>

<div class="row">
    <div class="col-md-12 ">


    @foreach ($custmrs as $custmr)
        <h5>{{$custmr->name}}</h5>

    @endforeach
    </div>
</div>



<div class="row">
    <div class="col-md-12 ">


 <h1> معلومات السيارات</h1>

    @foreach ($cars as $car)
        <h5>{{$car->car_plate_no}}</h5>
 <h5>{{$car->car_model_year	}}</h5>
 <br>
    @endforeach
 {{$cars->links()}}
</div>
</div>
<div class="row">
    <div class="col-md-12">

    </div>
</div>

<br>
<a href="#" class="btn btn-success" >test</a>
<br>
@endsection
