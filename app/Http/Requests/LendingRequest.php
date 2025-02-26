<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class LendingRequest
{
    public static function validate(Request $request)
    {
        try {
            $request['notes'] = $request->notes ?? null;
            $rules = [
                'stuff_id' => 'required',
                'name' => 'required|min:3',
                'total_stuff' => 'required',
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
