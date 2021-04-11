<?php

namespace App\Http\Controllers;

use App\Models\Maintenance_done;
use Illuminate\Http\Request;

class MaintinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "okk";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,['car_id'=>'required','mant_date'=>'date','current_meter'=>'min:1']);
        //'photo_field=>'mimes:jpg,png'
        //car_id mant_date 	current_meter  type_of_oil	oil_filter	air_filter	solar_filter	benzen_filter	conditioner_filte
        $car_id=$request->car_id;
        $mant_date=$request->mant_date;
        $current_meter=$request->current_meter;
        $type_of_oil=$request->type_of_oil;
        $oil_filter=$request->oil_filter;
        $air_filter=$request->air_filter;
        $solar_filter=$request->solar_filter;
        $benzen_filter=$request->benzen_filter;
        $conditioner_filter=$request->conditioner_filter;
        //$air_filter=$request->air_filter;

        $maint_done=new Maintenance_done(['car_id'=>$car_id,'mant_date'=>$mant_date,'current_meter'=>$current_meter]);

        $maint_done->type_of_oil=$request->type_of_oil;
        $maint_done->oil_filter=$request->oil_filter;
        $maint_done->air_filter=$request->air_filter;
        $maint_done->solar_filter=$request->solar_filter;
        $maint_done->benzen_filter=$request->benzen_filter;
        $maint_done->conditioner_filter=$request->conditioner_filter;

        if($maint_done->save())
        {
            $response=[
                'msg'=>"تم ادخال بيانات صيانة",
                'maintinance'=>$maint_done
            ];
            return response()->json($response,201);
        }

        $response=[
                'msg'=>"حدث خطأ",
        ];
        return response()->json($response,404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $maint=Maintenance_done::with('car')->where('car_id',$id)->get();

        $response=[
            'msg'=>'Maintenance done for car with id'.$id,
            'maintinance'=>$maint
         //'customer cars'=>$cars
        ];

        return response()->json($response,200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
