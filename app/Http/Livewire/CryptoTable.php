<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CryptoTable extends Component
{
    public $cryptoData;
    public $cryptoDataAll;
    public $isPriceAsc;
    public $isMarketCapAsc;
    public $isRankAsc;
    
    protected $listeners = ['searchCrypto', 'filterByMarketCap', 'filterByCryptoPrice', 'filterByRank'];

    public function mount()
    {
        $this->cryptoData = $this->getTop100Crypto();
        $this->cryptoDataAll = $this->getTop100Crypto();
    }

    public function getTop100Crypto() 
    {
        $data = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false')->json();

        return $data;
    }

    public function render()
    {
        // var_dump($this->cryptoData);
        return view('livewire.crypto-table', ['cryptoData' => $this->cryptoData]);
    }

    public function searchCrypto($search)
    {
        if ($search == '') {
            $this->cryptoData = $this->cryptoDataAll;
        } else {
            $this->cryptoData = Arr::where($this->cryptoDataAll, function ($value, $key) use($search) {
                return Str::contains($value["id"], $search);
            });
        }
    }

    public function filterByCryptoPrice()
    {
        foreach ($this->cryptoData as $key => $row)
        {
            $current_price[$key] = $row['current_price'];
        }
        if ($this->isPriceAsc === '1') {
            array_multisort($current_price, SORT_ASC, $this->cryptoData);
        } else {
            array_multisort($current_price, SORT_DESC, $this->cryptoData);
        }
        
    }
    
    public function filterByMarketCap()
    {
        foreach ($this->cryptoData as $key => $row)
        {
            $market_cap[$key] = $row['market_cap'];
        }
        if ($this->isMarketCapAsc === '1') {
            array_multisort($market_cap, SORT_ASC, $this->cryptoData);
        } else {
            array_multisort($market_cap, SORT_DESC, $this->cryptoData);
        }
    }
    
    public function filterByRank()
    {
        foreach ($this->cryptoData as $key => $row)
        {
            $market_cap_rank[$key] = $row['market_cap_rank'];
        }
        if ($this->isRankAsc === '1') {
            array_multisort($market_cap_rank, SORT_DESC, $this->cryptoData);
        } else {
            array_multisort($market_cap_rank, SORT_ASC, $this->cryptoData);
        }
    }
}


