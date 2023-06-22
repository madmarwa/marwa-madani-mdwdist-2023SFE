<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\My_Parent;
use Livewire\WithFileUploads;
use App\Models\ParentAttachment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AddParent extends Component
{
    
    use WithFileUploads;
    public $successMessage = '';

    public $catchError,$updateMode = false,$photos,$show_table = true,$Parent_id;

    public $currentStep = 1,

        // Father_INPUTS
        
        $Name_Father, $Name_Father_en,
        $National_ID_Father, 
        $Phone_Father, $Job_Father, $Job_Father_en,
       
        $Address_Father, 

        // Mother_INPUTS
        $Name_Mother, $Name_Mother_en,
        $National_ID_Mother, 
        $Phone_Mother, $Job_Mother, $Job_Mother_en,
       
        $Address_Mother;


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            
            'National_ID_Father' => 'required|min:8|max:10',
            
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:10',
            'National_ID_Mother' =>  'required|min:8|max:10',
         
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:10'
        ]);
    }


    public function render()
    {
        return view('livewire.add-parent', [
            
            'my_parents' => My_Parent::all(),
        ]);

    }

    public function showformadd(){
        $this->show_table = false;
    }



    //firstStepSubmit
    public function firstStepSubmit()
    {
       $this->validate([
            
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            
            
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
           
           
            'Address_Father' => 'required',
        ]);

        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {

        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            
           
           
            'Job_Mother_en' => 'required',
          
           
        ]);

        $this->currentStep = 3;
    }

    public function submitForm(){

        try {
            $My_Parent = new My_Parent();
            // Father_INPUTS
           
            $My_Parent->Name_Father = ['fr' => $this->Name_Father_en, 'ar' => $this->Name_Father];
            $My_Parent->National_ID_Father = $this->National_ID_Father;
           
            $My_Parent->Phone_Father = $this->Phone_Father;
            $My_Parent->Job_Father = ['fr' => $this->Job_Father_en, 'ar' => $this->Job_Father];
          
          
 
            $My_Parent->Address_Father = $this->Address_Father;

            // Mother_INPUTS
            $My_Parent->Name_Mother = ['fr' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
            $My_Parent->National_ID_Mother = $this->National_ID_Mother;
       
            $My_Parent->Phone_Mother = $this->Phone_Mother;
            $My_Parent->Job_Mother = ['fr' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
           
          
          
            $My_Parent->Address_Mother = $this->Address_Mother;
            $My_Parent->save();

            if (!empty($this->photos)){
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName(), $disk = 'parent_attachments');
                    ParentAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'parent_id' => My_Parent::latest()->first()->id,
                    ]);
                }
            }
            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->currentStep = 1;
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };

    }


    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = My_Parent::where('id',$id)->first();
        $this->Parent_id = $id;
       
        $this->Name_Father = $My_Parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $My_Parent->getTranslation('Name_Father', 'fr');
        $this->Job_Father = $My_Parent->getTranslation('Job_Father', 'ar');;
        $this->Job_Father_en = $My_Parent->getTranslation('Job_Father', 'fr');
        $this->National_ID_Father =$My_Parent->National_ID_Father;
       
        $this->Phone_Father = $My_Parent->Phone_Father;
       
      
        $this->Address_Father =$My_Parent->Address_Father;
        

        $this->Name_Mother = $My_Parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $My_Parent->getTranslation('Name_Father', 'fr');
        $this->Job_Mother = $My_Parent->getTranslation('Job_Mother', 'ar');;
        $this->Job_Mother_en = $My_Parent->getTranslation('Job_Mother', 'fr');
        $this->National_ID_Mother =$My_Parent->National_ID_Mother;
     
        $this->Phone_Mother = $My_Parent->Phone_Mother;
       
        
        $this->Address_Mother =$My_Parent->Address_Mother;
     
    }

    //firstStepSubmit
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;

    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;

    }

    public function submitForm_edit(){

        if ($this->Parent_id){
            $parent = My_Parent::find($this->Parent_id);
            $parent->update([
               
                'National_ID_Father' => $this->National_ID_Father,
            ]);

        }

        return redirect()->to('/add_parent');
    }

    public function delete($id)
    {
        // Récupérer les informations sur les images associées à l'entité parent
        $attachments = ParentAttachment::where('parent_id', $id)->get();
    
        // Supprimer les images du dossier d'attachement
        foreach ($attachments as $attachment) {
            $path = $attachment->file_name;
            if (Storage::disk('parent_attachments')->exists($path)) {
                Storage::disk('parent_attachments')->delete($path);
            }
        }
    
        // Supprimer l'entité parent
        My_Parent::findOrFail($id)->delete();
    
        return redirect()->to('/add_parent');
    }

    //clearForm
    public function clearForm()
    {
      
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father ='';
   
        $this->Phone_Father = '';
       
        $this->Address_Father ='';
      

        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother ='';
       
        $this->Phone_Mother = '';
      

        $this->Address_Mother ='';
      

    }


    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }
}
