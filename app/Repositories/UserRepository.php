<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAllUser()
    {
        return User::paginate(10);
    }

    public function getSpecificUser($id)
    {
        return User::find($id);
    }

    public function storeNewUser(array $data)
    {
        return User::create($data);
    }

    public function updateUser(array $data, $id)
    {
        User::where('id', $id)->update($data);
        return User::find($id);
    }

    public function deleteUser($id)
    {
        $data = User::where('id', $id)->first();
        $data->delete();
        return $data;
    }
}