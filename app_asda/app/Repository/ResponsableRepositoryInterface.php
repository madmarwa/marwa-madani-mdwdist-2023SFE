<?php

namespace App\Repository;

interface ResponsableRepositoryInterface{
    public function getAllResponsables();
    public function Store_Responsable($request);
    public function Create_Responsable();
    public function editResponsables($id);
    public function UpdateResponsables($request);
    public function GetGender();
    public function DeleteResponsables($request);
}


