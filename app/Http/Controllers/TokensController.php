<?php

namespace App\Http\Controllers;

use App\Models\Channels;
use App\Models\Tokens;
use Illuminate\Http\Request;

class TokensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tokens = Tokens::all('id', 'name', 'description');
        return view('tokens.index', compact('tokens'));
    }

    /**
     * @param $channel
     * @param $text
     * @return array|mixed|string|string[]
     */
    public function updateText($channel, $text)
    {
        if ($text == '') {
            return '';
        }

        $tokens = Tokens::all('id', 'name', 'description');
        $channelTokensJson  = Channels::find($channel)->tokens;
        $channelTokens = json_decode($channelTokensJson, true);

        // Replace tokens enclosed in double-curly brackets in text
        foreach ($tokens as $token) {
            if (!isset($channelTokens[$token->name])) {
                continue;
            }
            $pattern = '/{{\s*' . preg_quote($token->name) . '\s*}}/i';
            $text = preg_replace($pattern, $channelTokens[$token->name], $text);
        }
        return $text;
    }
}
