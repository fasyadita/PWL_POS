<?php

namespace App\Http\Controllers\Api;

use App\Models\userModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required'
        ]);

        //if validations fails
        if ($validator->fails()) {
            return response()->json($validator->errors(),442);
        }

        // create user
        $user = userModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);

        //return response JSON user is created
        if($user){
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }

        // return JSOn process insert failed
        return response()->json([
            'success' => false,
        ], 409);
    }
}
