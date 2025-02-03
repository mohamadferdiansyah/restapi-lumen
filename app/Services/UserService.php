<?php

namespace App\Services;

use App\Repositories\UserRepository;

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
}
