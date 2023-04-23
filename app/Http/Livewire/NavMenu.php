<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavMenu extends Component
{
    private $menuJSON = '[
        {"title" : "Send Messages", "url" : "sendmessages"},
        {"title" : "Channels", "url" : "channels"},
        {"title" : "Templates", "url" : "templates"},
        {"title" : "Tokens", "url" : "tokens"},
        {"title" : "Settings", "url" : "settings"}
    ]';

    public $menuItems = [];

    public function mount()
    {
        $this->menuItems = json_decode($this->menuJSON);
    }

    public function render()
    {
        return view('livewire.nav-menu');
    }
}
