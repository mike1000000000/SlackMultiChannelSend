<?php

namespace App\Http\Livewire;

use App\Models\Channels;
use App\Models\Tokens;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ChannelTokenSelector extends Component
{
    public $tokens;
    public $channel;
    public $existingChannelTokens = [];
    public $token = 0;
    public $value = '';

    // Listen for the livewire event from the parent component
    protected $listeners = ['store'];

    protected $rules = [
        'token' => 'required|integer|gt:0',
        'value' => 'required|string|min:1',
    ];

    protected $messages = [
        'token.gt' => 'Please choose a token from the dropdown.'
    ];

    public function mount()
    {
        $this->tokens = Tokens::all();
        try {
            if (!empty($this->channel->tokens)) {
                $this->existingChannelTokens = json_decode($this->channel->tokens, 1);
            } else {
                $this->existingChannelTokens = [];
            }
        } catch (\Exception $e) {
            if (env('APP_DEBUG')) {
                Log::error('Retrieve existing tokens error' . $e->getMessage());
            }
        }
    }

    public function render()
    {
        return view('livewire.channel-token-selector');
    }

    public function addTokenToChannel()
    {
        $this->validate();
        $tokenArray = [$this->tokens->where('id', $this->token)->pluck('name')[0] => $this->value];
        $this->existingChannelTokens = array_merge($this->existingChannelTokens, $tokenArray);

        $this->token = 0;
        $this->value = null;
    }

    public function remove($token)
    {
        unset($this->existingChannelTokens[$token]);
    }

    public function store()
    {
        $userid = (string) auth()->user()->id;
        $jsonEncodedTokens = json_encode($this->existingChannelTokens);
        Channels::where(['slack_channelid' => $this->channel->slack_channelid,'userid' => $userid])
            ->update(['tokens' => $jsonEncodedTokens]);

        $this->dispatchBrowserEvent('banner-message', [
            'style' => 'success',
            'message' => 'Updated Successfully'
        ]);
    }
}
