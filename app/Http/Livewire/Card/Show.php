<?php

namespace App\Http\Livewire\Card;

use App\Models\Card;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $name;
    public $card_type;
    public $description;
    public $password;

    public $loadModal = false;

    protected $rules = [
        'name' => 'required|string|min:2',
        'card_type' => 'required|string',
        'description' => 'string|min:2|nullable',
        'password' => 'numeric|digits:8|nullable',
    ];

    public function render()
    {
        return view('livewire.card.show', [
            'cards' => Card::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function createCardForm()
    {
        $this->resetValidation();
        $this->loadModal = true;
    }

    public function save()
    {
        $this->validate();

        Card::create($this->modelData());

        session()->flash('message', 'Card created');

        $this->reset();
    }

    public function modelData()
    {
        return [
            'name' => $this->name,
            'card_type' => $this->card_type,
            'description' => $this->description,
            'password' => $this->password,
        ];
    }
}
