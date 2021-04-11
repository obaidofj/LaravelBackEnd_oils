<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\Request;
use JWTAuth;
use Exception;

class CarsDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => [
            'update', 'store', 'destroy'
        ]]);
    }

    // public function __construct()
    // {
    //     $this->middleware('jwt.auth');
    // }

    /* public function __construct()
    {
       //$this->middelware('name)?
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars=Car::all();
        $response=[
            'msg'=>'list of all cars',
            'cars'=>$cars
        ];

        return response()->json($response,200);
        //return "it works";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "it works";
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
           //

           
           if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'no user, no authintication'], 404);
           }

           //return response()->json(['msg' => 'user authorized','user'=>$user], 200);

           $this->validate($request,['car_plate_no'=>'required|max:220','car_model_year'=>'min:4','customer_id'=>'min:1']);
           //'photo_field=>'mimes:jpg,png'
           //name	email	email_verified_at	password	remember_token
           $car_plate_no=$request->car_plate_no;
           $car_model_year=$request->car_model_year;
           $car_type=$request->car_type;
           $customer_id=$request->customer_id;

           $car=new Car(['car_plate_no'=>$car_plate_no,'car_model_year'=>$car_model_year,'car_type'=>$car_type,'customer_id'=>$customer_id]);

           if($car->save())
           {
               $car2=Car::where('id',$car->id)->get();
               $response=[
                   'msg'=>"تم ادخال بيانات سيارة",
                   'car'=>$car2
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
        $car=Car::with('customer')->findOrFail($id); //where('id',$id)// firstOrFail();

        $response=[
            'msg'=>'car information',
            'car'=>$car
        ];

        return response()->json($response,200);

        //return "it works";
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
        return "it works";
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
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'unauthorized, no user'], 404);
           }

        $car= Car::with('customer')->findOrFail($id); //findOrFail($id);

        $this->validate($request,['car_plate_no'=>'required|max:220','car_model_year'=>'min:4','customer_id'=>'min:1']);
        //'photo_field=>'mimes:jpg,png'
        //name	email	email_verified_at	password	remember_token
      // return response()->json(['msg'=>$car]);
       $car->car_plate_no=$request->car_plate_no;
        $car->car_model_year=$request->car_model_year;
        $car->car_type=$request->car_type;
        $car->customer_id=$request->customer_id;

        if(!Customer::where('id',$car->customer_id)->first()){
             return response()->json(['msg'=>"customer id provided dose not exist"],401);
         }

        if($car->update())
        {
            $car2=Car::where('id',$car->id)->get();
            $response=[
                'msg'=>"تم تعديل بيانات سيارة",
                'car'=>$car2
            ];
            return response()->json($response,200);
        }

        $response=[
                'msg'=>"حدث خطأ",
        ];
        return response()->json($response,404);
        //return "it works";
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

        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'no user, no authintication'], 404);
           }

      $car = Car::findOrFail($id);
      if (!$car->delete()) {
       return response()->json(['msg' => 'deletion failed'], 404);
    }
    $response = [
        'msg' => 'Car deleted',
        ];

    return response()->json($response, 200);
      //return "it works";
    }
}
