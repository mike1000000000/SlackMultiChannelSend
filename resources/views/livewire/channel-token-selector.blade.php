<div>
   <div class="border-double border-gray-200 border-2 p-2 w-full">
       <div class="-mx-3 flex flex-wrap w-full " x-data="{ description: 'Please choose a token' }">
           <div class=" px-3 w-48  flex-none" >
               <div class="mb-5">
                   <label
                       for="Token"
                       class="mb-3 block text-base font-medium text-[#07074D]"
                   >
                       Token
                   </label>
                       <select  x-ref="tokenSelect" type="text" name="token" id="token"
                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                            @change="description=$refs.tokenSelect.options[$refs.tokenSelect.selectedIndex].dataset.description"
                            wire:model.lazy="token"
                   >
                       <option value="0" selected disabled>Select a token</option>
                       @foreach($tokens as $token)
                           <option class="col-md-8 form-control input-md" value="{{ $token->id }}" data-description="{{ $token->description }}" >
                               {{ $token->name }}
                           </option>
                       @endforeach
                   </select>
               </div>
           </div>
           <div class="px-3 flex-auto">
               <div class="mb-5 ">
                   <label
                       for="Description"
                       class="mb-3 block text-base font-medium text-[#07074D]"
                   >
                       Value
                   </label>
                   <input
                       type="text"
                       name="value"
                       id="value"
                       x-bind:disabled="!$refs.tokenSelect.selectedIndex"
                       wire:model.lazy="value"
                       x-bind:placeholder="description"
                       class="w-full rounded-md border border-[#e0e0e0] bg-white px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                   />
               </div>
           </div>
           <div class="flex-none" >
               <div class="h-full grid">
                   <button
                       class="justify-self-center align-middle hover:shadow-form rounded-md bg-green-500 w-16 h-10 mb-auto mt-9 text-center text-base font-semibold text-white outline-none"
                       @click.prevent="description='Please choose a token';$wire.addTokenToChannel()"
                   >
                   add
                   </button>
               </div>
           </div>
           <div class="w-full text-sm text-red-600">
               @error('token')<p class="px-3">{{ $message }}</p>@enderror
               @error('value')<p class="px-3">{{ $message }}</p>@enderror
           </div>
       </div>
   </div>
   <br>

    @foreach($existingChannelTokens as $key => $value)
        <div class="">
            <div class="flex flex-wrap">
                <div class="px-2 w-1/5">
                    <div class="mb-5">
                        <label
                            for="Token"
                            class="mb-3 block text-base font-medium text-[#07074D]"
                        >
                            Token
                        </label>
                        <input
                            type="text"
                            name="token"
                            id="token-{{$key}}"
                            disabled
                            class="h-11 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $key }}"
                            wire:key="item-token-{{ $key }}"
                        />
                    </div>
                </div>
                <div class="px-2 flex-auto">
                    <div class="mb-5 ">
                        <label
                            for="value"
                            class="mb-3 block text-base font-medium text-[#07074D]"
                        >
                            Value
                        </label>
                        <input
                            type="text"
                            name="Value"
                            id="value-{{$key}}"
                            placeholder="Value"
                            disabled
                            value="{{ $value }}"
                            wire:key="item-token-{{ $value }}"
                            class="h-11 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                    </div>
                </div>
                <div class="flex-none">
                    <div class="h-full grid">
                        <button
                            class="justify-self-center align-middle hover:shadow-form rounded-md bg-[#6A64F1] w-20 h-9 mt-10 text-center text-base font-semibold text-white outline-none"
                            wire:click.prevent="remove('{{ $key }}')">
                            remove
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <x-slot name="footer">
        <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mb-4">
            <a href="{{ route('channels.index') }}" >Back to channel list</a>
        </button>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4"
                onclick="Livewire.emit('store');return false;">
            Save
        </button>
    </x-slot>
</div>
