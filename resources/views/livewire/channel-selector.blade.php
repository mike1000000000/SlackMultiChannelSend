<div>
    <div x-data="{ show: false }" x-show="$wire.displayModal">
        <div class="fixed inset-0 bg-gray-50 opacity-70"></div>
        <div class="bg-white shadow-md p-4 w-4/6 h-4/6 m-auto rounded-md fixed inset-0">
            <header class="pb-6">
                <h1 class="font-bold text-lg">
                    Add Channels
                </h1>
            </header>
            <main class="mx-4 h-4/5 overflow-x-auto border-2 border-gray-100 mb-8">
                <table class="min-w-full divide-y divide-gray-200 w-full ">
                    <thead>
                    <tr>
                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            NAME
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            DESCRIPTION
                        </th>
                        <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($channelList as $key => $channel)
                        <tr>
                            <td class="px-6 py-4 flex-wrap text-sm text-gray-900">
                                {{ $channel['name'] }} {{ $channel['isshared'] ? '(shared)' : ''  }}
                            </td>
                            <td class="px-6 py-4 flex-wrap text-sm text-gray-900">
                                {{ $channel['description'] }}
                            </td>
                            <td class="px-6 py-4 flex-wrap text-sm font-medium">
                                <button
                                    wire:click="addChannel('{{$key}}')"
                                    class="justify-self-center align-middle hover:shadow-form rounded-md bg-green-500 w-24 h-10 mx-1 text-center text-base font-semibold text-white outline-none disabled:opacity-25"
                                    {{in_array($key,$existingChannels) ? 'disabled' : ''}}
                                >
                                    {{in_array( $key,$existingChannels) ? 'added' : 'add'}}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </main>
            <footer class="h-1/6">
                <button class="bg-gray-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" wire:click="goBack()">
                    Go back
                </button>
            </footer>
        </div>
    </div>

    <x-slot name="footer">
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="Livewire.components.getComponentsByName('channel-selector').at().set('displayModal',true);return false;">
            Add Channels
        </button>
    </x-slot>
</div>
