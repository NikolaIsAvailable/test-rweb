<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CryptoTableRow extends Component
{
    public $crypto;
    
    public function render()
    {
        return view('livewire.crypto-table-row', ['crypto' => $this->crypto]);
    }
}
