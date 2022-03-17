<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    @if ($user->role == false)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-alert type="success" class="bg-green-700 text-green-100 p-4" />
                <x-alert type="error" class="bg-red-700 text-red-100 p-4" />
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-center p-5">
                        <div class="mb-3 xl:w-96">
                            <form action="{{ route('purchase.store') }}" method="POST">
                                @csrf
                                <select
                                    class="form-select appearance-none
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    aria-label="Default select example" name="id_p">
                                    <option selected>Open this select menu</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} - ${{ $item->price }}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="flex space-x-2 justify-center py-4">
                                    <button type="submit"
                                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                        Purchase
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h6 class="text-base font-medium leading-tight text-gray-800">
                            Invoices pending
                            <span
                                class="inline-block py-1.5 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded">
                                {{ $invoices }}
                            </span>
                            <form action="{{ route('bill.store') }}" method="POST">
                                @csrf
                                <div class="flex space-x-2 justify-center py-4">
                                    <button type="submit"
                                        {{$invoices == 0 ? 'disabled' : ''}}
                                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                        {{ $invoices >= 1 ? 'Make bills' : 'No bills to make'}}
                                    </button>
                                </div>
                            </form>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="bg-white rounded-lg border border-gray-200 w-96 text-gray-900">
                @foreach ($bills as $bill)
                    <a href="{{route('bill.show',['bill'=> $bill->id])}}" aria-current="true"
                        class="
                    block
                    px-6
                    py-2
                    border-b border-gray-200
                    w-full
                    rounded-t-lg
                    cursor-pointer
                    ">
                       <b>#{{$bill->id}}</b> COST: ${{$bill->total_cost}}, DATE: {{$bill->created_at->format('d-m-Y')}}
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</x-app-layout>
