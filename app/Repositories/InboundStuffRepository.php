<?php

namespace App\Repositories;

use App\Models\InboundStuff;
use App\Models\StuffStock;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class InboundStuffRepository
{
    public function uploadImage($file)
    {
        $imageName = Str::random(10) . '_' . $file->getClientOriginalName();

        $storageDirectory = storage_path('app/public/images');

        if (!File::exists($storageDirectory)) {
            File::makeDirectory($storageDirectory, 0775, true);
        }

        $file->move($storageDirectory, $imageName);

        $publicDirectory = base_path('public/storage');

        if (!File::exists($publicDirectory)) {
            File::link(storage_path('app/public'), $publicDirectory);
        }

        $imageLink = env('APP_URL') . 'storage/images/' . $imageName;

        return $imageLink;
    }

    public function storeNewInboud(array $data)
    {
        return InboundStuff::create($data);
    }

    public function delete($id)
    {
        $inboundStuff = InboundStuff::find($id);
        $stuffStock = StuffStock::where('stuff_id', $inboundStuff->stuff_id)->first();

        if ($inboundStuff->total > $stuffStock->total_Available) {
            response()->json('Total stuff is not enough', 400)->send();
            exit();
        }

        $stuffStock->total_Available -= $inboundStuff->total;
        $stuffStock->save();

        $imagePath = storage_path('app/public/images/' . basename($inboundStuff->proof_file));
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $inboundStuff->delete();

        return $inboundStuff;
    }
}
