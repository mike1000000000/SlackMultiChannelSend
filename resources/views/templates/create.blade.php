<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Template
        </h2>
    </x-slot>

    <div class="mb-30 pb-30 flex-col overflow-y-scroll basis-0 grow" id="maincontent">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form id="templateform" method="post" action="{{ route('templates.store') }}" oninput="Livewire.emit('formChanged')">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', '') }}" />
                            @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="server" class="block font-medium text-sm text-gray-700">Server</label>
                            <textarea rows="10" cols="100" type="text" name="text" id="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                       />{{ old('text', '') }}</textarea>
                            @error('text')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mb-4" >
            <a href="{{ route('templates.index') }}" >Back to list</a>
        </button>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4"  type="submit"  form="templateform">
            Save
        </button>
    </x-slot>
</x-app-layout>
