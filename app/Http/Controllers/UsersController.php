<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "users";
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
        $this->validate($request, ['name' => 'required|max:220', 'email' => 'email', 'password' => 'required']);
        //'photo_field=>'mimes:jpg,png'
        //name	email	email_verified_at	password	remember_token
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $user = new User(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);

        if ($user->save()) {
            $response = [
                'msg' => "تم ادخال بيانات مستخدم",
                'customer' => $user
            ];
            return response()->json($response, 201);
        }

        $response = [
            'msg' => "حدث خطأ",
        ];
        return response()->json($response, 404);

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
