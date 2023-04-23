<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Send Messages
        </h2>
    </x-slot>
    <div class="flex-col basis-0 grow" id="maincontent">
        <div class="mx-auto sm:px-6 lg:px-8 h-full">
            <div class="h-full">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 h-full">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 h-full">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white px-3 h-full">
                            @livewire('send-dash')
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
    </div>
</x-app-layout>
