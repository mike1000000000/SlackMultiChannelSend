<?php

namespace App\Http\Livewire;

use App\Models\Tokens;
use Illuminate\Support\Collection;
use Livewire\Component;

class DynamicLivewireTokens extends Component
{
    public Collection $originalTokens;
    public $i = 1;
    public $name;
    public $description;
    public Collection $inputs;

    public $displayModal = false;

    protected $listeners = ['store'];

    public function mount()
    {
        $result = $this->getTokens();
        $this->originalTokens = $result;
        $this->inputs = $result;
    }

    private function getTokens(): Collection
    {
        $tokens =  Tokens::all('id', 'name', 'description')->toArray();
        $result = [];
        foreach ($tokens as $token) {
            $result[$token['id']] = ['name' => $token['name'],'description' => $token['description']];
        }
        return collect($result);
    }

    public function render()
    {
        return view('livewire.dynamic-livewire-tokens');
    }

    public function add($i)
    {
        $validatedTokens = $this->validate(
            [
            'name' => 'required',
            'description' => 'required',
            ],
            [
                'name.required' => 'Name field is required',
                'description.required' => 'Description field is required',
            ]
        );

        $this->inputs->push(['name' => $this->name,'description' => $this->description]);

        $this->resetInputFields();
    }

    public function remove($i)
    {
        $this->inputs->pull($i);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
    }

    public function store()
    {
        #removed
        $tokenIDsRemoved = $this->originalTokens->diffKeys($this->inputs);
        foreach ($tokenIDsRemoved as $key => $_) {
            Tokens::destroy($key);
        }

        #added
        $tokenIDsAdded = $this->inputs->diffKeys($this->originalTokens);
        if ($tokenIDsAdded->isNotEmpty()) {
            foreach ($tokenIDsAdded as $newTokenID => $_) {
                if (
                    !empty($this->inputs[$newTokenID]['name']) &&
                    !empty($this->inputs[$newTokenID]['description'])
                ) {
                    Tokens::create([
                        'name' => $this->inputs[$newTokenID]['name'],
                        'description' => $this->inputs[$newTokenID]['description']]);
                }
            }
        }

        # Reset the values now that everything is stored/deleted
        $result = $this->getTokens();
        $this->originalTokens = $result;
        $this->inputs = $result;

        $this->resetInputFields();

        $this->dispatchBrowserEvent('banner-message', [
            'style' => 'success',
            'message' => 'Updated Successfully'
        ]);
    }
}
