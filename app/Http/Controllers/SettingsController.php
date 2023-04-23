<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingsRequest;
use App\Models\Settings;
use Illuminate\Http\RedirectResponse;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = $this->getSettings();
        return view('settings', compact('settings'));
    }

    private function getSettings(bool $getApi = false)
    {
        $userid = (string) auth()->user()->id;
        $settings = Settings::where([['userid',$userid]])->get()->pluck('value', 'name')->toArray();

        // Hide API key
        if (!$getApi && array_key_exists('slackApi', $settings)) {
            $settings['slackApi'] = str_repeat('•', 64);
        }
        return $settings;
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreSettingsRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSettingsRequest $request): RedirectResponse
    {
        $parameters = $request->validated();
        $style = 'success';
        $message = 'Settings saved';

        // If the API key is not valid, don't save it otherwise it will be encrypted
        if (str_contains($parameters['slackApi'], '•') || $parameters['slackApi'] === '') {
            unset($parameters['slackApi']);
        } else {
            $slackApi = $parameters['slackApi'];
            $parameters['slackApi'] = encrypt($slackApi);
        }

        $userid = (string) auth()->user()->id;

        try {
            foreach ($parameters as $key => $value) {
                Settings::updateOrCreate(
                    ['name' => $key, 'userid' => $userid],
                    ['value' => $value]
                );
            }
        } catch (\Exception $e) {
            $style = 'error';
            $message = 'Error saving settings. Code: ' . $e->getCode();
        }

        return redirect()->route('sendmessages')->with([
                        'flash.banner' => $message,
                        'flash.bannerStyle' => $style,]);
    }
}
