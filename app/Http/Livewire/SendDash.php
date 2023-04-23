<?php

namespace App\Http\Livewire;

use App\Actions\Slack\PostToChannel;
use App\Http\Controllers\TokensController;
use App\Models\Channels;
use App\Models\Template;
use App\Models\Tokens;
use Livewire\Component;

class SendDash extends Component
{
    public $channels;
    public $templates = [];
    public $tokens = [];
    public $messages = [];
    public $originalMessages = [];
    public $selectedTemplate = 0;
    public $selectedChannel = '';
    public $channelsSelected = [];

    // Listen for the livewire event from the parent component
    protected $listeners = ['sendMessage'];

    public function mount()
    {
        $userid = auth()->user()->id;
        $this->channels = Channels::where('userid', $userid)->get();
        $this->getTemplates();
        $this->tokens = Tokens::all();
        $this->selectedChannel = $this->channels->first()->slack_channelid ?? null;
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.send-dash');
    }

    private function getTemplates()
    {
          $templates = Template::all('id', 'name', 'text')->toArray();
        foreach ($templates as $template) {
            $this->templates[$template['id']] = $template;
        }
        $this->templates[0]['text'] = '';
    }

    public function loadMessages()
    {
        $this->messages = []; // clear messages
        foreach ($this->channels as $channel) {
            $tokenController = new TokensController();
            $this->messages[$channel->slack_channelid] =
                $tokenController->updateText(
                    $channel->slack_channelid,
                    $this->templates[$this->selectedTemplate]['text'] ?? ''
                );
        }
        $this->originalMessages = $this->messages;
    }

    public function templateChanged()
    {
        $this->loadMessages();
    }

    public function checkIfTokensFilled($channelID): bool
    {
        $message = $this->messages[$channelID] ?? '';

        // using regex to check if there are any tokens left in the message
        $pattern = '/\{{.*?\}}/';
        preg_match_all($pattern, $message, $matches);
        if (count($matches[0]) > 0) {
            return false;
        }
        return true;
    }

    public function checkIfChannelMessageChanged($channelID): bool
    {
        $message = $this->messages[$channelID] ?? '';
        $originalMessage = $this->originalMessages[$channelID] ?? '';

        if ($message == $originalMessage) {
            return false;
        }
        return true;
    }

    public function updateMessage()
    {
        $tokenController = new TokensController();
        $this->messages[$this->selectedChannel] =
            $tokenController->updateText(
                $this->selectedChannel,
                $this->messages[$this->selectedChannel] ?? ''
            );
    }

    public function sendMessage()
    {
        $bannerstyle = 'success';
        $bannermessage = 'Messages Sent!';

        try {
            foreach ($this->channelsSelected as $channel) {
                $message = $this->messages[$channel];
                $SendSlackMessage = new PostToChannel();
                $SendSlackMessage->postToChannel($channel, $message);
            }
        } catch (\Exception $e) {
            $bannerstyle = 'error';
            $bannermessage = 'Failed to send messages. Error: ' . $e->getMessage();
        }

        $this->dispatchBrowserEvent('banner-message', [
            'style' => $bannerstyle,
            'message' => $bannermessage
        ]);
    }
}
