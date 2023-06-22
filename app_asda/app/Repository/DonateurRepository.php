<?php

namespace App\Repository;
use Exception;
use App\Models\Don;
use App\Models\Gender;
use App\Models\Donateur;

use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;
use App\Repository\DonateursRepositoryInterface;

class DonateurRepository implements DonateurRepositoryInterface{

    public function getAllDonateurs(){
         $Donateurs=Donateur::all();
        return view('pages.Donateur.Donateurs',compact('Donateurs'));
    }
   
    public function Store_Donateur($request){


     
            try {
                $Donateurs = new Donateur();
                $Donateurs->Email = $request->Email;
               
                $Donateurs->name = ['fr' => $request->Name_en, 'ar' => $request->Name_ar];
               
                $Donateurs->Gender_id = $request->Gender_id;
                $Donateurs->Phone_Donateur=$request->Phone_Donateur;
                $Donateurs->Address = $request->Address;
               
                $Donateurs->save();
                toastr()->success(trans('messages.success'));
                return redirect()->route('Donateurs.index');
            }
            catch (Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
    
    

    }
  
        public function Create_Donateur(){
            //
                 
                   $data['Genders'] = Gender::all();
                   $Donateurs = new Donateur();
                   return view('pages.Donateur.create',$data,  compact('Donateurs'));
            
                }
                public function editDonateurs($id)
                {
                    return Donateur::findOrFail($id);
                }
            
            
                public function UpdateDonateurs($request)
                {
                    try {
                       $Donateurs = Donateur::findOrFail($request->id);
                       $Donateurs->Email = $request->Email;
               
                $Donateurs->name = ['fr' => $request->Name_en, 'ar' => $request->Name_ar];
               
                $Donateurs->Gender_id = $request->Gender_id;
                $Donateurs->Phone_Donateur=$request->Phone_Donateur;
                $Donateurs->Address = $request->Address;
                       $Donateurs->save();
                        toastr()->success(trans('messages.Update'));
                        return redirect()->route('Donateurs.index');
                    }
                    catch (Exception $e) {
                        return redirect()->back()->with(['error' => $e->getMessage()]);
                    }            
    
}
public function GetGender(){
    return Gender::all();
 }
 public function DeleteDonateurs($request)
 {
     Donateur::findOrFail($request->id)->delete();
     toastr()->error(trans('messages.Delete'));
     return redirect()->route('Donateurs.index');
 }
 public function getdonateur($id)
 { 
     $Donateur = Donateur::where("id", $id)->get();
     return $Donateur;
 }
}