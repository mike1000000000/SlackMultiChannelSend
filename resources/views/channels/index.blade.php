<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Channels List
        </h2>
    </x-slot>

    <div class="mb-30 pb-30 flex-col overflow-y-scroll basis-0 grow" id="maincontent">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        @livewire('channel-selector')
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Channel Name
                                    </th>
                                    <th scope="col" class="flex-wrap px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($channelList as $channel=>$value)
                                    <tr>
                                        <td class="px-6 py-4 flex-wrap text-sm text-gray-900">
                                            {{ $value->name }}
                                        </td>
                                        <td class="px-6 py-4 flex-wrap text-sm text-gray-900">
                                            {{ $value->description }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('channels.show', $value->slack_channelid) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                            <a href="{{ route('channels.edit', $value->slack_channelid) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>

                                            <form class="inline-block" action="{{ route('channels.destroy', $value->slack_channelid) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
