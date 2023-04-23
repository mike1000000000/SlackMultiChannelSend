<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Settings
        </h2>
    </x-slot>
    <div class="mb-30 pb-30 flex-col overflow-y-scroll basis-0 grow" id="maincontent">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form id="settingsForm" method="post" action="" oninput="Livewire.emit('formChanged')">
                    @csrf
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <label for="slackBotName" class="block font-medium text-sm text-gray-700">Slack Bot Name</label>
                        <input type="text" name="slackBotName" id="slackApi" class="form-input rounded-md shadow-sm mt-1 block w-full"
                               value="{{ old('slackBotName', $settings['slackBotName'] ?? '') }}" />
                        @error('slackBotName')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Slack API</label>
                            <input type="text" name="slackApi" id="slackApi" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('slackApi', $settings['slackApi'] ?? '') }}" />
                            @error('slackApi')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <button class="w-24 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" type="submit" form="settingsForm">
            Save
        </button>
    </x-slot>
</x-app-layout>
