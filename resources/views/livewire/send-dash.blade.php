<div class="h-full pb-10">
    <div class="flex flex-row h-full my-5">
        <div class="basis-1/3 h-full flex flex-col border-0 border-gray-50">
            <label for="channels" class="block ml-3 mb-3 mt-3 text-sm font-extrabold text-gray-900">Select a channel</label>
            <div class="overflow-y-scroll overflow-y-hidden border-2 border-gray-100 h-full px-1 py-2 rounded shadow-sm">
                <ul @if($selectedTemplate == 0) disabled @endif>
                    @foreach ($channels as $channel)
                        <li
                            class="flex px-3 m-2 rounded p-3 border-2
                            {{ $this->checkIfTokensFilled($channel->slack_channelid) ? 'border-gray-200' : 'border-red-700'}}
                            {{ $channel->slack_channelid  == $selectedChannel && $selectedTemplate != 0 ? 'bg-blue-400' : ''}}"
                            id="channel-{{$channel->slack_channelid}}"
                            wire:click="$set('selectedChannel','{{ $channel->slack_channelid }}')">
                            <div class="flex-grow border-blue-700 border-0 padding: 10px; ">
                                {{ $channel->name }}
                            </div>

{{--                        If the message has been changed from the default template, show a warning icon--}}
                            @if( $this->checkIfChannelMessageChanged($channel->slack_channelid) )
                                <div class="pr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                    </svg>
                                </div>
                            @endif

                            <div class="grow-0 w-6 border-green-700 border-0">
                                <input type="checkbox"
                                   @if($selectedTemplate == 0) disabled @endif
                                   wire:model.defer="channelsSelected"
                                   name="channel-{{ $channel->slack_channelid}}" value="{{ $channel->slack_channelid }}">
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="basis-2/3 flex flex-col pl-2 ">
            <select
                name="template"
                id="template"
                wire:model="selectedTemplate"
                wire:change="templateChanged"
                onchange="if({{ $selectedTemplate }} !== 0) {
                          if(!confirm('You will lose all changes. Are you sure?')) { this.value = '{{ $selectedTemplate }}';}}"
                class="mb-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="0" disabled>Select a template</option>
                @foreach ($templates as $id => $template)
                   @if($id != 0)
                        <option value="{{ $id }}">{{ $template['name'] }}</option>
                   @endif
                @endforeach
            </select>
            <textarea
                name="message"
                id="message"
                @if($selectedTemplate == 0) disabled @endif
                wire:model.lazy="messages.{{ $selectedChannel }}"
                @dblclick="alert('Double click');"
                class="h-full w-full overflow-y-scroll border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm resize-none"
                placeholder="Please select a template"
            >
            </textarea>
            <button class="bg-[#6A64F1] hover:shadow-form text-white font-bold py-2 px-4 rounded  disabled:opacity-50"
                    @if($selectedTemplate == 0) disabled @endif
                wire:click="updateMessage()"
            >
                Update
            </button>
        </div>
    </div>
    <x-slot name="footer">
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4"
                onclick="Livewire.emit('sendMessage');return false;">
            Send Messages
        </button>
    </x-slot>
</div>
