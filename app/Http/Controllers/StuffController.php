<?php

namespace App\Http\Controllers;

use App\Http\Requests\StuffRequest;
use App\Http\Resources\StuffResource;
use App\Services\StuffService;
use Illuminate\Http\Request;

class StuffController extends Controller
{
    private $stuffService;

    public function __construct(StuffService $stuffService)
    {
        $this->stuffService = $stuffService;
    }

    public function index()
    {
        try {
            $stuffs = $this->stuffService->index();
            return response()->json(StuffResource::collection($stuffs), 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function show($id)
    {
        try {
            $stuff = $this->stuffService->show($id);
            return response()->json(new StuffResource($stuff), 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $payload = StuffRequest::validate($request);
            $stuff = $this->stuffService->store($payload);
            return response()->json(new StuffResource($stuff), 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $payload = StuffRequest::validate($request);
            $stuff = $this->stuffService->update($payload, $id);
            return response()->json(new StuffResource($stuff), 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function destroy($id)
    {
        try {
            $stuff = $this->stuffService->destroy($id);
            return response()->json(new StuffResource($stuff), 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function trash()
    {
        try {
            $stuffs = $this->stuffService->trash();
            return response()->json(StuffResource::collection($stuffs), 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function restore($id){
        try {
            $stuff = $this->stuffService->restore($id);
            return response()->json(new StuffResource($stuff), 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function delete($id){
        try {
            $stuff = $this->stuffService->deletePermanent($id);
            return response()->json('deleted', 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
