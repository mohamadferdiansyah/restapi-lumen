<?php

namespace App\Repositories;

use App\Models\Stuff;

class StuffRepository {
    public function getAllStuff(){
        return Stuff::paginate(10);
    }

    public function getSpecificStuff($id){
        return Stuff::find($id);
    }

    public function storeNewStuff(array $data){
        return Stuff::create($data);
    }

    public function updateStuff(array $data, $id){
        return Stuff::where('id', $id)->update($data);
    }

    public function deleteStuff($id){
        return Stuff::where('id', $id)->delete();
    }
}