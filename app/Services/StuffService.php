<?php

namespace App\Services;

use App\Repositories\StuffRepository;

class StuffService
{
    private $stuffRepository;

    public function __construct(StuffRepository $stuffRepository)
    {
        $this->stuffRepository = $stuffRepository;
    }

    public function index()
    {
        return $this->stuffRepository->getAllStuff();
    }

    public function show($id)
    {
        return $this->stuffRepository->getSpecificStuff($id);
    }

    public function store(array $data)
    {
        return $this->stuffRepository->storeNewStuff($data);
    }

    public function update(array $data, $id)
    {
        return $this->stuffRepository->updateStuff($data, $id);
    }

    public function destroy($id)
    {
        return $this->stuffRepository->deleteStuff($id);
    }

    public function trash()
    {
        return $this->stuffRepository->getTrashedStuff();
    }

    public function restore($id){
        return $this->stuffRepository->restoreStuff($id);
    }

    public function deletePermanent($id){
        return $this->stuffRepository->deteleStuffPermanent($id);
    }
}
