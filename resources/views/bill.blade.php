<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            BILL DETAIL
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert type="success" class="bg-green-700 text-green-100 p-4" />
            <x-alert type="error" class="bg-red-700 text-red-100 p-4" />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-5">
                    <div class="mb-3 xl:w-96">
                        <div class="flex justify-center">
                            <ul class="bg-white rounded-lg border border-gray-200 w-96 text-gray-900">
                                <li class="px-6 py-2 border-b border-gray-200 w-full rounded-t-lg">
                                    <b>TOTAL COST (TAX INCLUDED):</b> ${{ $bill->total_cost }}
                                </li>
                                <li class="px-6 py-2 border-b border-gray-200 w-full rounded-t-lg">
                                    <b>TOTAL TAX:</b> ${{ $bill->total_tax }}
                                </li>
                                <li class="px-6 py-2 border-b border-gray-200 w-full rounded-t-lg">
                                    <b>CUSTOMER:</b> {{ $bill->user->name }}
                                </li>
                                <li class="px-6 py-2 border-b border-gray-200 w-full rounded-t-lg">
                                    <b>DATE:</b> {{ $bill->created_at->format('d-m-Y') }}
                                </li>
                                <li class="px-6 py-2 border-b border-gray-200 w-full rounded-t-lg">
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full">
                                                        <thead class="border-b">
                                                            <tr>
                                                                <th scope="col"
                                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                                    NAME
                                                                </th>
                                                                <th scope="col"
                                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                                    PRICE
                                                                </th>
                                                                <th scope="col"
                                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                                    TAX
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            {{-- @dd($bill->items) --}}
                                                            @foreach ($bill->items as $item)
                                                                <tr class="border-b">
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                        {{$item->name}}
                                                                    </td>
                                                                    <td
                                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                        ${{$item->price}}
                                                                    </td>
                                                                    <td
                                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                        {{$item->tax}}%
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
