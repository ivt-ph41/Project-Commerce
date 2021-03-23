<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Text extends Component
{
    public $text = 0;
    public function plus(){
        $this->text++;
    }
    public function render()
    {
        return view('livewire.text')->layout('layouts.base');
    }
}
