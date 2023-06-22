<?php

namespace App\Http\Controllers\Don;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\DonRepositoryInterface;

class DonController extends Controller
{
    protected $Don;

    public function __construct(DonRepositoryInterface $Dons)
    {
        $this->Don = $Dons;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  $this->Don->getAllDons();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Don->Create_Don();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Don->Store_Don($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $donateur_id)
    {
        return $this->Don->Show_Don($donateur_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->Don->Edit_Don($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Don->updateDon($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->Don->DeleteDon($id);
    }
   
}
