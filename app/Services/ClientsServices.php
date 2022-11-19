<?php

namespace App\Services;
use App\Repositories\ClientsRepository;
use App\DataTransferObjects\ClientsDTO;
use DB;
/**
 * Class ClientsServices.
 */
class ClientsServices
{
    private $clientsRepository;

    public function __construct(
        ClientsRepository $clientsRepository
    ){
        $this->clientsRepository = $clientsRepository;
    }

    public function get(){
        return $this->clientsRepository->getWith();
    }
    
    public function getById($id){
        return $this->clientsRepository->getById((int)$id);
    }

    public function save(ClientsDTO $dto){
        DB::beginTransaction();
        try{
            $this->clientsRepository->create($dto->toArray());
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function updateById($id,ClientsDTO $dto){
        DB::beginTransaction();
        try{
            $this->clientsRepository->updateById($id, $dto->toArray());
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }
    
    public function deleteById($id){
        DB::beginTransaction();
        try{
            $this->clientsRepository->deleteById($id);
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }
}
