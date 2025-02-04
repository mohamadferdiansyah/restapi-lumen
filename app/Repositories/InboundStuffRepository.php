<?php

namespace App\Repositories;

use App\Models\InboundStuff;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class InboundStuffRepository
{
    public function uploadImage($file)
    {
        $imageName = Str::random(10) . '_' . $file->getClientOriginalName() ;
        
        $storageDirectory = storage_path('app/public/images');
        
        if(!File::exists($storageDirectory)) {
            File::makeDirectory($storageDirectory, 0775, true);
        }
        
        $file->move($storageDirectory, $imageName);
        
        $publicDirectory = base_path('public/storage');
        
        if(!File::exists($publicDirectory)) {
            File::link(storage_path('app/public'), $publicDirectory);
        }

        $imageLink = env('APP_URL') . 'storage/images/' . $imageName;
        
        return $imageLink;
    }

    public function storeNewInboud(array $data)
    {
        return InboundStuff::create($data);
    }

}