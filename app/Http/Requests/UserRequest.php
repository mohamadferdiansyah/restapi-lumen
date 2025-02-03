<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class UserRequest
{
    public static function validate(Request $request)
    {
        try {
            $rules = [
                'username' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|string',
                'role' => 'string'
            ];  
            $validator = app('validator')->make($request->all(), $rules);
            if ($validator->fails()) {
                response()->json($validator->errors(), 400)->send();
                exit;
            } else {
                return $validator->validated();
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    } 
}