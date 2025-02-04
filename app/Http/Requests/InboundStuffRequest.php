<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class InboundStuffRequest
{
    public static function validate(Request $request)
    {
        try {
            $rules = [
                'stuff_id' => 'required',
                'total' => 'required',
                'proof_file' => 'required|image',
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
