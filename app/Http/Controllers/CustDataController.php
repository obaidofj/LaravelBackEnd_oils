<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::all();
        $response=[
            'msg'=>'list of all customers',
            'customers'=>$customers
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
        $this->validate($request,['name'=>'required|max:220','mobile'=>'min:7']);
        //'photo_field=>'mimes:jpg,png'
        $name=$request->name;
        $mobile=$request->mobile;
        //$cust_id=$request->mobile;

        $cust=new Customer(['name'=>$name,'mobile'=>$mobile]);

        if($cust->save())
        {
            $response=[
                'msg'=>"تم ادخال بيانات ذبون",
                'customer'=>$cust
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
        $customer=Customer::with('cars')->where('id',$id)->firstOrFail();

        $response=[
            'msg'=>'customer information',
            'customer'=>$customer
//'customer cars'=>$cars
        ];

        return response()->json($response,200);

        //return "it works";
    }

    public function getById($id)
    {
        //
        $customer=Customer::with('cars.maintinances')->where('id_no',$id)->firstOrFail();

        $response=[
            'msg'=>'customer information',
            'customer'=>$customer
//'customer cars'=>$cars
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
        $cust= Customer::findOrFail($id);

        $this->validate($request,['name'=>'required|max:220','mobile'=>'min:7']);
        //'photo_field=>'mimes:jpg,png'
        $cust->name=$request->name;
        $cust->mobile=$request->mobile;
        //$cust_id=$request->mobile;



        if($cust->update())
        {
            $response=[
                'msg'=>"تم تعديل بيانات ذبون",
                'customer'=>$cust
            ];
            return response()->json($response,201);
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
        return "it works";
    }
}
