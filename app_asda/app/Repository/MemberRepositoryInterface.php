<?php

namespace App\Repository;

interface MemberRepositoryInterface{
    public function getAllMembers();
    public function Store_Member($request);
    public function Create_Member();
    public function editMembers($id);
    public function UpdateMembers($request);
    public function GetGender();
    public function DeleteMembers($request);
}


