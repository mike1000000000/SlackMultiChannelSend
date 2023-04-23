<?php

namespace App\Actions\Slack;

use App\Models\Settings;
use Exception;
use Illuminate\Support\Facades\Log;
use JoliCode\Slack\ClientFactory;

class PostToChannel
{
    /**
     * @param $channelID
     * @param $text
     * @throws Exception
     */
    public function postToChannel($channelID, $text)
    {
        $userid = (string) auth()->user()->id;
        try {
            $yourSlackToken = Settings::where([['userid', $userid], ['name', 'slackApi']])->get()->value('value');
            $yourSlackToken = decrypt($yourSlackToken);
            $botName = Settings::where([['userid', $userid], ['name', 'slackBotName']])->get()->value('value');
            $client = ClientFactory::create($yourSlackToken);
            $client->chatPostMessage([
                'username' => $botName,
                'channel' => $channelID,
                'text' => $text,
            ]);
        } catch (Exception $e) {
            if (env('APP_DEBUG')) {
                Log::error('Get channels error: ' . $e->getMessage());
            }
            throw new Exception($e->getMessage(), $e->getCode(), $e);
        }
    }
}
