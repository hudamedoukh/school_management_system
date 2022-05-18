<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\My_Parent;
use App\Models\ParentAttachment;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads;
    public $successMessage = '';
    public $catchError;
    public $currentStep = 1, $updateMode = false, $photos, $show_table = true, $Parent_id,
        // Father_INPUTS
        $Email, $Password,
        $Name_Father,
        $National_ID_Father,
        $Phone_Father, $Job_Father,
        $Address_Father,

        // Mother_INPUTS
        $Name_Mother,
        $National_ID_Mother,
        $Phone_Mother, $Job_Mother,
        $Address_Mother;

    public  function showformadd()
    {
        $this->show_table = false;
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Email' => 'required|email',
            'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }
    public function render()
    {
        return view('livewire.add-parent', [
            'my_parents' => My_Parent::all(),
        ]);
    }

    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate([
            'Email' => 'required|unique:my__parents,Email,' . $this->id,
            'Password' => 'required',
            'Name_Father' => 'required',
            'Job_Father' => 'required',
            'National_ID_Father' => 'required|unique:my__parents,National_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Address_Father' => 'required',
        ]);
        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->validate([
            'Name_Mother' => 'required',
            'National_ID_Mother' => 'required|unique:my__parents,National_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Address_Mother' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function submitForm()
    {

        $My_Parent = new My_Parent();
        // Father_INPUTS
        $My_Parent->Email = $this->Email;
        $My_Parent->Password = Hash::make($this->Password);
        $My_Parent->Name_Father = $this->Name_Father;
        $My_Parent->National_ID_Father = $this->National_ID_Father;
        $My_Parent->Phone_Father = $this->Phone_Father;
        $My_Parent->Job_Father =  $this->Job_Father;
        $My_Parent->Address_Father = $this->Address_Father;

        // Mother_INPUTS
        $My_Parent->Name_Mother =  $this->Name_Mother;
        $My_Parent->National_ID_Mother = $this->National_ID_Mother;
        $My_Parent->Phone_Mother = $this->Phone_Mother;
        $My_Parent->Job_Mother =  $this->Job_Mother;
        $My_Parent->Address_Mother = $this->Address_Mother;
        $My_Parent->save();


        if (!empty($this->photos)) {
            foreach ($this->photos as $photo) {
                $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName(), $disk = 'parent_attachments');
                ParentAttachment::create([
                    'file_name' => $photo->getClientOriginalName(),
                    'parent_id' => My_Parent::latest()->first()->id,
                ]);
            }
        }
        $this->successMessage = 'تم الحفظ بنجاح';
        $this->clearForm();
        $this->currentStep = 1;
    }
    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = My_Parent::where('id', $id)->first();
        $this->Email = $My_Parent->Email;
        $this->Parent_id = $id;
        $this->Password = $My_Parent->Password;
        $this->Name_Father = $My_Parent->Name_Father;
        $this->National_ID_Father = $My_Parent->National_ID_Father;
        $this->Phone_Father = $My_Parent->Phone_Father;
        $this->Job_Father = $My_Parent->Job_Father;
        $this->Address_Father = $My_Parent->Address_Father;
        $this->Name_Mother = $My_Parent->Name_Mother;
        $this->Phone_Mother = $My_Parent->Phone_Mother;
        $this->National_ID_Mother = $My_Parent->National_ID_Mother;
        $this->Job_Mother = $My_Parent->Job_Mother;
        $this->Address_Mother = $My_Parent->Address_Mother;
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

    public function submitForm_edit()
    {

        if ($this->Parent_id) {
            $parent = My_Parent::find($this->Parent_id);
            $parent->update([
                'Email' => $this->Email,
                'Password' =>  Hash::make($this->Password),
                'Job_Father' => $this->Job_Father,
                'Address_Father' => $this->Address_Father,
                'Phone_Father' => $this->Phone_Father,
                'Name_Father' => $this->Name_Father,
                'National_ID_Father' => $this->National_ID_Father,
                'Name_Mother' => $this->Name_Mother,
                'Job_Mother' => $this->Job_Mother,
                'National_ID_Mother' => $this->National_ID_Mother,
                'Phone_Mother' => $this->Phone_Mother,
                'Address_Mother' => $this->Address_Mother,
            ]);
        //تعديل المرفقات وحذفها (لسا ما عملتو)
            $notification = array(
                'message' => 'تم تعديل ولي الامر  بنجاح',
                'alert-type' => 'info'
            );
        }

        return redirect()->to('/add_parent')->with($notification);
    }

    public function delete($id)
    {
        $parent = My_Parent::findOrFail($id);
        $parent->delete();
        $notification = array(
            'message' => 'تم حذف ولي الامر  بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->to('/add_parent')->with($notification);
    }

    //clearForm
    public function clearForm()
    {
        $this->Email = '';
        $this->Password = '';
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->National_ID_Father = '';
        $this->Phone_Father = '';
        $this->Address_Father = '';
        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->National_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Address_Mother = '';
    }


    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }
}
