<?php

namespace App\Repository;

use Exception;

use App\Models\Don;
use App\Models\Donateur;
use Illuminate\Support\Facades\DB;



class DonRepository implements DonRepositoryInterface{

    public function getAllDons()
{ 
    $donateurs=Donateur::all();
    /*$donateurs = DB::table('donateurs')
        ->select('id', 'name', 'Email', 'Phone_Donateur')
        ->get();*/

    $donateursMontantTotal = [];

    foreach ($donateurs as $donateur) {
        $dons = DB::table('dons')
            ->where('donateur_id', $donateur->id)
            ->get();

        $montantTotal = 0;

        foreach ($dons as $don) {
            $montantTotal += $don->montant;
            $don->don_id = $don->id; // Ajout de l'ID du don à chaque objet $don
        }

        $donateur->dons = $dons;
        $donateursMontantTotal[$donateur->id] = $montantTotal;
    }

    return view('pages.Don.Dons', compact('donateurs', 'donateursMontantTotal'));
}

   
   
    public function Create_Don(){
        //
             
        $donateurs = Donateur::get();
               $Dons = new Don();
               return view('pages.Don.create',  compact('Dons' , 'donateurs'));
        
            }
          
        
            public function Store_Don($request){
               

     
                try {
                    $Dons = new Don();
                    $Dons->montant = $request->input('montant');
                    $Dons->montant = $request->input('montant');
                    $Dons->donateur_id = $request->input('donateur_id');
                  
                   
                    $Dons->save();
                    toastr()->success(trans('messages.success'));
                    return redirect()->route('Dons.index');
                }
                catch (Exception $e) {
                    return redirect()->back()->with(['error' => $e->getMessage()]);
                }
        
        
    
        }
        public function Show_Don($donateur_id)
        {
            $Dons = Don::where('donateur_id', $donateur_id)->get();
            $donateur = Donateur::find($donateur_id);
            
            return view('pages.Don.show', compact('Dons', 'donateur'));
        }  
        public function Edit_Don($id)
    {
        
        $Don = Don::findOrFail($id);
        $donateur = Donateur::find($Don->donateur_id);
    
    return view('pages.Don.Edit', compact('Don' , 'donateur'));
       
       
    }
    public function updateDon( $request, $id)
    {
        $don = Don::findOrFail($id);
        
        $don->montant = $request->input('montant');
        $don->save();
    
        return redirect()->route('Dons.show', $don->donateur_id)->with('success', 'Le montant a été modifié avec succès.');
    }
    public function DeleteDon($id_donateur)
{
    $donateur = Donateur::findOrFail($id_donateur);
    $donateur->dons()->delete(); // Supprimer tous les dons associés au donateur
    $donateur->delete(); // Supprimer le donateur lui-même
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Dons.index');
}


}  