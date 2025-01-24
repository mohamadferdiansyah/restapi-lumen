<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Models\Stuff;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class StuffRequest
{
    public static function validate(Request $request)
    {
        try {

            $rules = [
                'name' => 'required|min:3',
                'type' => 'required|in:' . implode(',', [Stuff::HTL_KLN, Stuff::LAB, Stuff::SARPRAS])
            ];

            $validator = app(ValidationFactory::class)->make($request->all(), $rules);

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
