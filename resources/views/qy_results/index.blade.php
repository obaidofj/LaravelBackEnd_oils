
@extends('layouts.admin')

@section('content')

<?php if($type==='cust_cars' ){ ?>

    <h1>السيارات للزبون {{$cust}} هي  </h1>
    @foreach ( $cars as $car )
       <div> رقم السيارة : {{$car->car_plate_no}}</div>
       <div> سنة الصنع : {{$car->car_model_year}}</div>
       <div> ملاحظات  {{$car->notes}}</div>
       <br>
    @endforeach

    <?php
}
?>

@endsection

