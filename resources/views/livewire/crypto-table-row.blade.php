<tr class="border-b border-gray-200 hover:bg-gray-100">
    <td class="py-3 px-6 text-center whitespace-nowrap">{{ $crypto['market_cap_rank'] }}</td>
    <td class="py-3 px-6 text-center whitespace-nowrap">
        <div class="flex items-center">
            <div class="mr-2">
                <img class="w-6 h-6 rounded-full" src="{{ $crypto['image'] }}" alt="{{ $crypto['name'] }}_logo"/>
            </div>
            <span class="font-medium mr-2">{{ $crypto['name'] }}</span>
            <span class="font-extralight uppercase">{{ $crypto['symbol'] }}</span>
        </div>
    </td>
    <td class="py-3 px-6 text-center whitespace-nowrap">{{ $crypto['current_price'] }}</td>
    <td class="py-3 px-6 text-center whitespace-nowrap {{$crypto['price_change_24h'] < 0 ? 'text-red-600' : 'text-black'}}">{{ $crypto['price_change_24h'] }}</td>
    <td class="py-3 px-6 text-center whitespace-nowrap {{$crypto['price_change_percentage_24h'] < 0 ? 'text-red-600' : 'text-black'}}">{{ $crypto['price_change_percentage_24h'] }}</td>
    <td class="py-3 px-6 text-center whitespace-nowrap">{{ $crypto['market_cap'] }}</td>
    <td class="py-3 px-6 text-center whitespace-nowrap {{$crypto['market_cap_change_24h'] < 0 ? 'text-red-600' : 'text-black'}}">{{ $crypto['market_cap_change_24h'] }}</td>
    <td class="py-3 px-6 text-center whitespace-nowrap {{$crypto['market_cap_change_percentage_24h'] < 0 ? 'text-red-600' : 'text-black'}}">{{ $crypto['market_cap_change_percentage_24h'] }}</td>
</tr>