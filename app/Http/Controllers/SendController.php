<?php

namespace App\Http\Controllers;

use App\Actions\Slack\PostToChannel;
use Illuminate\Http\Request;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('send-message');
    }
}
