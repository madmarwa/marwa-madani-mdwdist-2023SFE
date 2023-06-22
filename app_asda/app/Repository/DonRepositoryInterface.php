<?php

namespace App\Repository;

interface DonRepositoryInterface
{
    public function getAllDons();

    public function Create_Don();
    public function Store_Don($request);
    public function Show_Don($donateur_id);
    public function Edit_Don($id);
    public function updateDon( $request, $id);
    public function DeleteDon($id_donateur);
   
   
}
