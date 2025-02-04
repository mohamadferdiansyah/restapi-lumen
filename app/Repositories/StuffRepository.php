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
        Stuff::where('id', $id)->update($data);
        return Stuff::find($id);
    }

    public function deleteStuff($id){
        $data = Stuff::where('id', $id)->first();
        $data->delete();
        return $data;
    }

    public function getTrashedStuff(){
        return Stuff::onlyTrashed()->paginate(10);
    }

    public function restoreStuff($id){
        $stuff = Stuff::onlyTrashed()->where('id', $id)->restore();
        return Stuff::find($id);
    }

    public function deteleStuffPermanent($id){
        $stuff = Stuff::onlyTrashed()->where('id', $id)->forceDelete();
        return NULL;
    }
}