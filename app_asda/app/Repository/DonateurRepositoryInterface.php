<?php

namespace App\Repository;

interface DonateurRepositoryInterface{
    public function getAllDonateurs();
    public function Store_Donateur($request);
    public function Create_Donateur();
    public function editDonateurs($id);
    public function UpdateDonateurs($request);
    public function GetGender();
    public function DeleteDonateurs($request);
    public function getdonateur($id);
}


