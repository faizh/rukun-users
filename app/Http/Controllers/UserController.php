<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user   = new User;
        $input  = (object) $request->input();

        $user->name         = $input->name;
        $user->address      = $input->address;
        $user->phone_number = $input->phone_number;
        $user->role_id      = $input->role_id;
        $user->email        = $input->email;
        $user->password     = Hash::make($input->password);

        if ($user->save()) {
            $status = true;
            $msg    = "Insert Success";
            $code   = 200;
        } else {
            $status = false;
            $msg    = "Insert failed";
            $code   = 500;
        }

        $data = [
            'status'    => $status,
            'msg'   => $msg,
            'data'  => $user
        ];

        return response()->json($data, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);

        return response()->json($users, 200);
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
        $user = User::find($id);

        $input = (object) $request->input();

        $user->name         = $input->name;
        $user->address      = $input->address;
        $user->phone_number = $input->phone_number;
        $user->role_id      = $input->role_id;
        $user->email        = $input->email;
        
        if ($user->save()) {
            $msg    = "Update Success";
            $code   = 200;
        } else {
            $msg    = "Update failed";
            $code   = 500;
        }

        $data = [
            'msg'   => $msg,
            'data'  => $user
        ];

        return response()->json($data, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            $msg    = "Delete Success";
            $code   = 200;
        }else{
            $msg    = "Delete failed";
            $code   = 500;
        }

        $data = [
            'status'     => true,
            'messages'   => $msg
        ];
        
        return response()->json($data, $code);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password'  => 'required'
        ]);

        if ($validator->fails()) {
            $msg = array(
                'status'    => false,
                'messages'  => $validator->errors(),
            );

            return response($msg, 400);
        }            

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();

            $token = $user->createToken('rukun')->accessToken;
            $msg = array(
                'status'    => true,
                'messages'  => "Sukses",
                'token'     => $token,
                'data'      => $user
            );

            return response($msg, 200);
        }else{
            $msg = array(
                'status'    => false,
                'messages'  => 'Authentication failed'
            );

            return response($msg);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();

        if ($token->revoke()) {
            return response()->json([
                'status'    => true,
                'message'   => "Logout success"
            ], 200);
        }
    }
}
