<?php

namespace App\Livewire;

use Livewire\Component;

class TestModal extends Component
{
    public $showModal = false;

    public function render()
    {
        return view('livewire.test-modal');
    }

    public function storePost()
    {
        dd('hola');
    }
}
