<?php


namespace App\Http\Controllers\Teachers\dashboard;


use Illuminate\Http\Request;



use App\Http\Controllers\Controller;

use App\Repository\MarkRepositoryInterface;


class MarkController extends Controller
{
    protected $Mark;

    public function __construct(MarkRepositoryInterface $Mark)
    {
        $this->Mark =$Mark;
    }

    public function index()
    {
        return $this->Mark->index();
    }

    public function create()
    {
        return $this->Mark->create();
    }


    public function store(Request $request)
    {
        return $this->Mark->store($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->Mark->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Mark->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Mark->destroy($request);
    }
 public function markget($gradeId, $classroomId, $subjectid, $examid ){
    return $this->Mark->markget($gradeId, $classroomId, $subjectid, $examid );
    }

    public function  Markedite(){
        return $this->Mark->Markedite();
    }
   
}
