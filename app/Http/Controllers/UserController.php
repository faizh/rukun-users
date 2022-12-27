<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();

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
        $user   = new Users;
        $input  = (object) $request->input();

        $user->name         = $input->name;
        $user->address      = $input->address;
        $user->phone_number = $input->phone_number;
        $user->role_id      = $input->role_id;
        $user->email        = $input->email;
        $user->password     = Hash::make($input->password);

        if ($user->save()) {
            $msg    = "Insert Success";
            $code   = 200;
        } else {
            $msg    = "Insert failed";
            $code   = 500;
        }

        $data = [
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
        $users = Users::find($id);

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
        $user = Users::find($id);

        $input = (object) $request->input();

        $user->name         = $input->name;
        $user->address      = $input->address;
        $user->phone_number = $input->phone_number;
        $user->role_id      = $input->role_id;
        $user->email        = $input->email;
        $user->password     = Hash::make($input->password);
        
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
        $user = Users::find($id);

        if ($user->delete()) {
            $msg    = "Delete Success";
            $code   = 200;
        }else{
            $msg    = "Delete failed";
            $code   = 500;
        }

        $data = [
            'msg'   => $msg
        ];
        
        return response()->json($data, $code);
    }
}
