<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Student;
use Session;

class Students extends Component
{


    public $first_name;
    public $last_name;
    public $gender;
    
    public $edit_id;
    public $edit_first_name;
    public $edit_last_name;
    public $edit_gender;

    // validation form 
    public function updated($field){

        $this->validateOnly($field, [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'gender' => 'required',
            'edit_first_name' => 'required|min:3',
            'edit_last_name' => 'required|min:3',
            'edit_gender' => 'required',
        ],[
            'first_name.required' => 'First Name field is required',
            'last_name.required' => 'Last Name field is required',
            'gender.required' => 'Gender Field field is required',
            'first_name.min' => 'First Name must be less than 3 charecters',
            'last_name.min' => 'Last Name must be less than 3 charecters',
            'edit_first_name.required' => 'First Name field is required',
            'edit_last_name.required' => 'Last Name field is required',
            'edit_gender.required' => 'Gender Field field is required',
            'edit_first_name.min' => 'First Name must be less than 3 charecters',
            'edit_last_name.min' => 'Last Name must be less than 3 charecters'
        ]);

    }

    // save form 
    public function savepost(){
        $savepost = $this->validate([
            'first_name' => 'required|min:6',
            'last_name' => 'required|min:6',
            'gender' => 'required',
        ],[
            'first_name.required' => 'First Name field is required',
            'last_name.required' => 'Last Name field is required',
            'gender.required' => 'Gender Field field is required',
            'first_name.min' => 'First Name must be less than 6 charecters',
            'last_name.min' => 'Last Name must be less than 6 charecters'
        ]);

        Student::create($savepost);
        session()->flash('insert', 'Student Inserted Successfully.');
        $this->cleanevars();
    }

    // null form field 
    private function cleanevars(){

        $this->first_name = null;
        $this->last_name = null;
        $this->gender = null;
            
    }

    // edit student 
    function edit_student($id){
        $student = Student::findOrFail($id);
        $this->edit_id = $student->id;
        $this->edit_first_name = $student->first_name;
        $this->edit_last_name = $student->last_name;
        $this->edit_gender = $student->gender;

        Session::put('update_data', 'Edit Data');
        // session()->flash('update_data', 'Edit Data');
    }


 
      // update form 
      public function updatestudent(){
        $this->validate([
            'edit_first_name' => 'required|min:3',
            'edit_last_name' => 'required|min:3',
            'edit_gender' => 'required',
        ],[
            'edit_first_name.required' => 'First Name field is required',
            'edit_last_name.required' => 'Last Name field is required',
            'edit_gender.required' => 'Gender Field field is required',
            'edit_first_name.min' => 'First Name must be less than 3 charecters',
            'edit_last_name.min' => 'Last Name must be less than 3 charecters'
        ]);

        Student::find($this->edit_id)->update([
            'first_name' => $this->edit_first_name,
            'last_name' => $this->edit_last_name,
            'gender' => $this->edit_gender,
        ]);

        Session::forget('update_data');  
        Session::flash('update', 'Student Updated Successfully.');
        
    }










    // delete student 
    function delete_student($id){
        Student::destroy($id);
        session()->flash('delete', 'Student Deleted Successfully.');
    }

    


    public function render(){
        $student = Student::latest()->paginate(10);
        return view('livewire.students',compact('student'));
    }

}
