<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService 
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->userRepository->getAllUser();
    }

    public function show($id)
    {
        return $this->userRepository->getSpecificUser($id);
    }

    public function store(array $data)
    {
        return $this->userRepository->storeNewUser($data);
    }

    public function update(array $data, $id)
    {
        return $this->userRepository->updateUser($data, $id);
    }

    public function destroy($id)
    {
        return $this->userRepository->deleteUser($id);
    }

    public function login(array $data)
    {
        $token = Auth::attempt($data);
        if(!$token){
            return response()->json("Login gagal, silahkan cek email dan password anda", 400)->send();
            exit;
        }
        $responseToken = [
            "access_token" => $token,
            "token_type" => "Bearer",
            "user" => Auth::user()
        ];
        return $responseToken;
    }

    public function profile()
    {
        return Auth::user();
    }

    public function logout()
    {
        return Auth::logout();
    }
}
