<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Template
        </h2>
    </x-slot>

    <div class="mb-30 pb-30 flex-col overflow-y-scroll basis-0 grow" id="maincontent">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $template->id }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $template->name }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Text
                                    </th>
                                    <td class="px-6 py-4 flex-wrap text-sm text-gray-900 bg-white divide-y divide-gray-200 ">
                                        {{ $template->text }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mb-4" >
            <a href="{{ route('templates.index') }}" >Back to list</a>
        </button>
    </x-slot>
</x-app-layout>
