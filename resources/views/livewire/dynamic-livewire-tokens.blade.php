<div>
    <table class="min-w-full divide-y divide-gray-200 w-full">
        <tr class="border-b">
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">
                Token
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Description
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Action
            </th>
        </tr>
        @foreach($inputs as $key => $value)
            <tr class="border-b">
                <th scope="col" class="px-6 py-3 bg-white text-left text-lg font-medium text-gray-500 ">
                    &#123;&#123; {{ $value['name'] }} &#125;&#125;
                </th>
                <td class="px-6 py-4 flex-wrap text-gray-900 bg-white divide-y divide-gray-200 flex-grow">
                    {{ $value['description'] }}
                </td>
                <td class="px-6 py-4 flex-wrap text-gray-900 bg-white divide-y divide-gray-200 w-1/6">
                    <button
                        class="align-middle hover:shadow-form rounded-md bg-[#6A64F1] w-24 h-10 text-center text-base font-semibold text-white outline-none"
                        wire:click.prevent="remove({{ $key }})">
                        Remove
                    </button>
                </td>
            </tr>
        @endforeach
    </table>

    <div x-data="{ show: false }" x-show="$wire.displayModal" >
        <div class="fixed inset-0 bg-gray-50 opacity-70"></div>
        <div class="p-4 bg-white w-1/2 h-96 m-auto rounded-md fixed inset-0 border-2 border-gray-400">
            <header>
                <h1 class="font-bold text-lg">
                    Add Token
                </h1>
            </header>
            <main class="h-auto overflow-auto  w-full p-4">
                <form>
                    <div class="add-input p-2 w-full">
                        <div class="mb-5 w-full">
                            <label
                                for="Token"
                                class="mb-3 block text-base font-medium text-[#07074D]"
                            >
                                New Token @error('name') <span class="text-red-700 text-sm error">   *{{ $message }}</span>@enderror
                            </label>
                            <input
                                type="text"
                                name="Token"
                                id="Token"
                                placeholder="Token"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                wire:model="name"
                            />

                        </div>
                    </div>
                    <div class="w-full px-3">
                        <div class="mb-5 ">
                            <label
                                for="Description"
                                class="mb-3 block text-base font-medium text-[#07074D]"
                            >
                                Description @error('description') <span class="text-red-700 text-sm error">   *{{ $message }}</span>@enderror
                            </label>
                            <input
                                type="text"
                                name="Description"
                                id="Description"
                                placeholder="Description"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                wire:model="description"
                            />

                        </div>
                    </div>
                </form>
            </main>
            <footer>
                <div class="grid grid-cols-2 gap-4 border-0 border-green-700">
                    <div>
                        <button class="bg-gray-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="Livewire.components.getComponentsByName('dynamic-livewire-tokens').at().set('displayModal',false);return false;">
                            Go back
                        </button>
                    </div>
                    <div class="flex justify-end">
                        <button
                            class="justify-self-center align-middle hover:shadow-form rounded-md bg-green-500 w-24 h-10 mb-auto  text-center text-base
                            font-semibold text-white outline-none"
                            wire:click.prevent="add({{$i}})">
                            Add
                        </button>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <x-slot name="footer">
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 mr-5"
                onclick="Livewire.components.getComponentsByName('dynamic-livewire-tokens').at().set('displayModal',true);return false;">
            Add Token
        </button>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 w-32"
                onclick="Livewire.emit('store');return false;">
            Save
        </button>
    </x-slot>
</div>
