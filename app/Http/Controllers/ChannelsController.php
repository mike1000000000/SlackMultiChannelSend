<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChannelsRequest;
use App\Models\Channels;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userid = (string) auth()->user()->id;
        $channelList = Channels::where([['userid',$userid]])->get();
        return view('channels.index', compact('channelList'));
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreChannelsRequest $request
     */
    public function store(StoreChannelsRequest $request)
    {
        $validatedInput = $request->validated();
        Channels::create($validatedInput);
    }

    /**
     * Display the specified resource.
     */
    public function show(Channels $channel)
    {
        $userid = (string) auth()->user()->id;
        if ($channel->userid !== $userid) {
            return redirect()->route('channels.index');
        }

        return view('channels.view', compact('channel'))->with('tokens', json_decode($channel->tokens)) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Channels $channel)
    {
        return view('channels.edit', compact('channel'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channels $channel)
    {
        $channel->delete();
        return redirect()->route('channels.index');
    }
}
