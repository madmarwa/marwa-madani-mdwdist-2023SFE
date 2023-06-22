<?php

namespace App\Repository;

interface MarkRepositoryInterface{

    // get all Teachers
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);
    public function Markedite();
    public function markget($gradeId, $classroomId, $subjectid, $examid);
 
   
    // Get specialization
   

}


