<?php
  
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Document;
use App\Models\Modele;
use App\Models\project;
use App\Models\User;

class Wizard extends Component
{
    public $currentStep = 1;
    public $name, $price, $detail, $status = 1;
    public $successMsg = '';
  
    /**
     * Write code on Method
     */
    public function render()
    {
        $modeles = Modele::get();
        $projects = project::get();

        return view('livewire.wizard' , ["modeles" => $modeles , "projects" => $projects]);
    }
  
    /**
     * Write code on Method
     */
    public function firstStepSubmit()
    {
      
        $this->currentStep = 2;
    }
  
    /**
     * Write code on Method
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'status' => 'required',
        ]);
  
    
    }
  
    /**
     * Write code on Method
     */
    public function submitForm()
    {
        Document::create([
            'name' => $this->name,
            'price' => $this->price,
            'detail' => $this->detail,
            'status' => $this->status,
        ]);
  
        $this->successMsg = 'Team successfully created.';
  
        $this->clearForm();
  
        $this->currentStep = 1;
    }
  
    /**
     * Write code on Method
     */
    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    /**
     * Write code on Method
     */
    public function clearForm()
    {
        $this->name = '';
        $this->price = '';
        $this->detail = '';
        $this->status = 1;
    }
}