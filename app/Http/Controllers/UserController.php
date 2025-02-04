<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = $this->userService->profile();
        return response()->json(new UserResource($user), 200);
    }

    public function login(Request $request)
    {
        try {
            $payload = LoginRequest::validate($request);
            $login = $this->userService->login($payload);
            return response()->json($login, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function logout(){
        $this->userService->logout();
        return response()->json("Logout berhasil", 200);
    }

    public function store(Request $request)
    {
        try {
            $payload = UserRequest::validate($request);
            $stuff = $this->userService->store($payload);
            return response()->json(new UserResource($stuff), 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
