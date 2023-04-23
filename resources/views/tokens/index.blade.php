<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Token List
        </h2>
    </x-slot>

    <div class="mb-30 pb-30 flex-col overflow-y-scroll basis-0 grow" id="maincontent">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        @livewire('dynamic-livewire-tokens')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
