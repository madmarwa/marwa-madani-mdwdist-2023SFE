<?php

namespace App\Http\Controllers\Responsable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResponsablesRequest;
use App\Repository\ResponsableRepositoryInterface;

class ResponsableController extends Controller
{
    protected $Responsable;

    public function __construct(ResponsableRepositoryInterface $Responsables)
    {
        $this->Responsable = $Responsables;
    }
    public function index()
    {
       return  $this->Responsable->getAllResponsables();
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Responsable->Create_Responsable();
    }

    public function store(StoreResponsablesRequest $request)
    {
       return $this->Responsable->Store_Responsable($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Responsables = $this->Responsable->editResponsables($id);
        $genders = $this->Responsable->GetGender();
        return view('pages.Responsable.Edit', compact('Responsables', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Responsable->UpdateResponsables($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Responsable->DeleteResponsables($request);
    }
}
