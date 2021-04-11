
@extends('layouts.master')

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

<?php if($type==='cust_jobs' ){ ?>

    <h1>انواع العمل للزبون {{$cust}} هي  </h1>
    @foreach ( $jobs as $job )
       <div> الوظيفة/العمل : {{$job->job_name}}</div>
       {{-- <div> سنة الصنع : {{$car->car_model_year}}</div>
       <div> ملاحظات  {{$car->notes}}</div> --}}
       <br>
    @endforeach


    <?php  } ?>


<?php if($type==='job_custrs' ){ ?>

    <h1> الزبائن الذين لهم وظيفة {{$job}} هم  </h1>
    @foreach ( $customers as $customer )
       <div> اسم الزبون : {{$customer->name}}</div>
       {{-- <div> سنة الصنع : {{$car->car_model_year}}</div>
       <div> ملاحظات  {{$car->notes}}</div> --}}
       <br>
    @endforeach


<?php  } ?>

@endsection

