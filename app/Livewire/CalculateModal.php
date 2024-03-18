<?php

namespace App\Livewire;

use App\Models\FoodRegistration;
use Livewire\Component;

class CalculateModal extends Component
{
    public $calorie;
    public $quantity;

    public function mount($id)
    {
        // dd($id);
        $quantity = FoodRegistration::find($id)->get(['quantity'])->first();
        // dd($quantity);
        $this->quantity = $quantity;
    }

    public $showModal = false;

    public function render()
    {
        return view('livewire.calculate-modal');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
