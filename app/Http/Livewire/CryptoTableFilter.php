<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CryptoTableFilter extends Component
{
    public $search;
    protected $listeners = ['searchCrypto'];
    
    public function render()
    {
        return view('livewire.crypto-table-filter');
    }

    public function searchCrypto()
    {
        $this->emitTo('crypto-table', 'searchCrypto', $this->search);
    }
}
