<?php

namespace App\Repository;

use Exception;
use App\Models\Exam;
use App\Models\Mark;

use App\Models\Grade;
use App\Models\stock;
use App\Models\product;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductRepository implements ProductRepositoryInterface
{

    public function index()
    { $totalProducts = Product::nombreTotale();
        $products = product::get();
        return view('pages.product.products', compact('products' , 'totalProducts'));
    }

    public function create()
    {
       
        
    }

    public function store( $request)
    {
        try {
           
            $product = new product();
        
            $product->produit = [
                'fr' => $request->produit_en,
                'ar' => $request->produit
            ];
            
           
            $product->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('products.index');
        }
  
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    


    public function edit($id)
    {
    }

    public function update( $request)
    {
        try {
            $product = product::findOrFail($request->id);
            $product->produit = [
                'fr' => $request->produit_en,
                'ar' => $request->produit
            ];
            $product->save();
    
            toastr()->success(trans('messages.Update'));
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function destroy($request)
    {
        try {
            product::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

   
   
}
