<?php

namespace App\Actions\Slack;

use App\Models\Settings;
use Exception;
use Illuminate\Support\Facades\Log;
use JoliCode\Slack\ClientFactory;

class GetChannels
{
    public function getSlackChannels()
    {
        $userid = (string) auth()->user()->id;
        $channelList = [];
        try {
            $yourSlackToken = Settings::where([['userid', $userid], ['name', 'slackApi']])->get()->value('value');
            $yourSlackToken = decrypt($yourSlackToken);
            $client = ClientFactory::create($yourSlackToken);
            $conversations = $client->conversationsList([
                'types' => 'public_channel,private_channel'
            ]);
            $channels = $conversations->getChannels();

            foreach ($channels as $channel) {
                $channelList[$channel->getId()] = ['name' => $channel->getName(),
                    'description' => $channel->getPurpose()->getValue(),
                    'isshared' => $channel->getIsShared()];
            }
        } catch (Exception $e) {
            if (env('APP_DEBUG')) {
                Log::error('Get channels error: ' . $e->getMessage());
            }
            request()->session()->flash('flash.bannerStyle', 'error');
            request()->session()->flash(
                'flash.banner',
                'Error getting channels: ' . $e->getMessage() . '. Please check your Slack API key.'
            );
        }
        return $channelList;
    }
}
