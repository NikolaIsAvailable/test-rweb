<div>
    <livewire:crypto-table-filter />
    <div>
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-start justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                    <table class="min-w-max w-full table-auto">
                        <thead class="w-full">
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal" 
                                x-data="{ priceFilter: @entangle('isPriceAsc'),
                                          marketCapFilter: @entangle('isMarketCapAsc'),
                                          rankFilter: @entangle('isRankAsc')
                                }">
                                <th 
                                    wire:click="$emitTo('crypto-table', 'filterByRank')" 
                                    class="py-3 px-3 cursor-pointer hover:bg-gray-300"
                                    @click="rankFilter === '0' ? rankFilter = '1' : rankFilter = '0'">
                                    Rank
                                    <div class="transform-gpu ml-2 inline-block ease-in duration-200" x-show="rankFilter" :class="[rankFilter === '1' ? 'rotate-180' : 'rotate-0']">
                                        <i class="fa-solid fa-caret-up"></i>
                                    </div>
                                </th>
                                <th class="py-3 px-6 text-left">Name</th>
                                <th
                                    wire:click="$emitTo('crypto-table', 'filterByCryptoPrice')" 
                                    class="py-3 px-3 cursor-pointer hover:bg-gray-300"
                                    @click="priceFilter === '0' ? priceFilter = '1' : priceFilter = '0'">
                                    Current Price
                                    <div class="transform-gpu ml-2 inline-block ease-in duration-200" x-show="priceFilter" :class="[priceFilter === '1' ? 'rotate-180' : 'rotate-0']">
                                        <i class="fa-solid fa-caret-up"></i>
                                    </div>
                                </th>                                
                                <th class="py-3 px-3">Price 24h</th>
                                <th class="py-3 px-3">Price % 24h</th>
                                <th 
                                    wire:click="$emitTo('crypto-table', 'filterByMarketCap')" 
                                    class="py-3 px-3 cursor-pointer hover:bg-gray-300"
                                    @click="marketCapFilter === '0' ? marketCapFilter = '1' : marketCapFilter = '0'">
                                    Market Cap 
                                    <div class="transform-gpu ml-2 inline-block ease-in duration-200" x-show="marketCapFilter" :class="[marketCapFilter === '1' ? 'rotate-180' : 'rotate-0']">
                                        <i class="fa-solid fa-caret-up"></i>
                                    </div>
                                </th>
                                <th class="py-3 px-3">Market cap 24h</th>
                                <th class="py-3 px-3">Market cap % 24h</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($cryptoData as $crypto)
                                <livewire:crypto-table-row :crypto="$crypto" :wire:key="$crypto['id']"/>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


