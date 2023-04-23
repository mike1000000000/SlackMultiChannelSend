<?php

namespace App\Http\Livewire;

use App\Models\Channels;
use Livewire\Component;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Actions\Slack\GetChannels;

class ChannelSelector extends Component
{
    public $displayModal = false;
    public $channelList = [];
    public $existingChannels = [];
    public $debug = false;
    public $channelsAdded = 0;
    public $addChannelError = false;

    public function mount()
    {
        $this->channelList = (new GetChannels())->getSlackChannels();
    }

    public function render()
    {
        $userid = (string) auth()->user()->id;
        $this->existingChannels = Channels::where('userid', $userid)->pluck('slack_channelid')->toArray();
        $channelAction = new GetChannels();
        $this->channelList = $channelAction->getSlackChannels();
        return view('livewire.channel-selector');
    }

    public function addChannel($channelID)
    {
        try {
            $userid = (string)auth()->user()->id;
            $channelInfo = [
                'slack_channelid' => $channelID,
                'userid' => $userid,
                'name' => $this->channelList[$channelID]['name'],
                'description' => $this->channelList[$channelID]['description'],
            ];
            Channels::updateOrCreate($channelInfo);
            $this->channelsAdded++;
        } catch (Exception $e) {
            if (env('APP_DEBUG')) {
                Log::error('Save channel (' . $channelID . ') error: ' . $e->getMessage());
            }
            $this->addChannelError = true;
        }
    }

    public function goBack()
    {
        if ($this->channelsAdded !== 0) {
            $message = ($this->addChannelError === true) ?
                'Error adding channel/s' : 'Channel/s added: ' . $this->channelsAdded;
            $style = ($this->addChannelError === true) ? 'error' : 'success';

            return redirect()->to('/channels')->with([
                'flash.banner' => $message,
                'flash.bannerStyle' => $style,
            ]);
        } else {
            return redirect()->to('/channels');
        }
    }
}
