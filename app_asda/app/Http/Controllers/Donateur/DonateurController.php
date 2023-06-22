<?php

namespace App\Http\Controllers\Donateur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonateursRequest;
use App\Repository\DonateurRepositoryInterface;

class DonateurController extends Controller
{
    protected $Donateur;

    public function __construct(DonateurRepositoryInterface $Donateurs)
    {
        $this->Donateur = $Donateurs;
    }
    public function index()
    {
       return  $this->Donateur->getAllDonateurs();
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Donateur->Create_Donateur();
    }

    public function store(StoreDonateursRequest $request)
    {
       return $this->Donateur->Store_Donateur($request);
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
        $Donateurs = $this->Donateur->editDonateurs($id);
       
        $genders = $this->Donateur->GetGender();
        return view('pages.Donateur.Edit',compact('Donateurs','genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Donateur->UpdateDonateurs($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Donateur->DeleteDonateurs($request);
    }
    public function getdonateur($id){
        return $this->Donateur->getdonateur($id);
    }
}
