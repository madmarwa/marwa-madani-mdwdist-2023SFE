<?php

namespace App\Repository;
use Exception;
use App\Models\Gender;
use App\Models\Member;
use App\Models\Specialization;

use Illuminate\Support\Facades\Hash;
use App\Repository\MembersRepositoryInterface;

class MemberRepository implements MemberRepositoryInterface{

    public function getAllMembers(){
         $Members=Member::all();
        return view('pages.Member.Members',compact('Members'));
    }
   
    public function Store_Member($request){


     
            try {
                $Members = new Member();
                $Members->Email = $request->Email;
               
                $Members->name = ['fr' => $request->Name_en, 'ar' => $request->Name_ar];
               
                $Members->Gender_id = $request->Gender_id;
                $Members->Phone_Member=$request->Phone_Member;
                $Members->Address = $request->Address;
               
                $Members->save();
                toastr()->success(trans('messages.success'));
                return redirect()->route('Members.index');
            }
            catch (Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
    
    

    }
  
        public function Create_Member(){
            //
                 
                   $data['Genders'] = Gender::all();
                   $Members = new Member();
                   return view('pages.Member.create',$data,  compact('Members'));
            
                }
                public function editMembers($id)
                {
                    return Member::findOrFail($id);
                }
            
            
                public function UpdateMembers($request)
                {
                    try {
                       $Members = Member::findOrFail($request->id);
                       $Members->Email = $request->Email;
               
                $Members->name = ['fr' => $request->Name_en, 'ar' => $request->Name_ar];
               
                $Members->Gender_id = $request->Gender_id;
                $Members->Phone_Member=$request->Phone_Member;
                $Members->Address = $request->Address;
                       $Members->save();
                        toastr()->success(trans('messages.Update'));
                        return redirect()->route('Members.index');
                    }
                    catch (Exception $e) {
                        return redirect()->back()->with(['error' => $e->getMessage()]);
                    }            
    
}
public function GetGender(){
    return Gender::all();
 }
 public function DeleteMembers($request)
 {
     Member::findOrFail($request->id)->delete();
     toastr()->error(trans('messages.Delete'));
     return redirect()->route('Members.index');
 }
}