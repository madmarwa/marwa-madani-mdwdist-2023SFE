<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreProductRequest;
use App\Repository\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $Product;

    public function __construct(ProductRepositoryInterface $Products)
    {
        $this->Product =$Products;
    }

    public function index()
    {
        return $this->Product->index();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        return $this->Product->store($request);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Product->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Product->destroy($request);
    }
}
