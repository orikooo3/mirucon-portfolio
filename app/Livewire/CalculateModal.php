<?php

namespace App\Livewire;

use App\Models\FoodRegistration;
use Livewire\Component;

class CalculateModal extends Component
{
    public $quantity;

    public function mount($id)
    {
        $this->quantity = FoodRegistration::find($id);
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
