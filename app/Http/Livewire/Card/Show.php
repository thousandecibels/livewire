<?php

namespace App\Http\Livewire\Card;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
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
    public $modelId;

    protected $rules = [
        'name' => 'required|string|min:2',
        'card_type' => 'required|string',
        'description' => 'string|min:2|nullable',
        'password' => 'numeric|digits:8|nullable',
    ];

    public function render()
    {
        return view('livewire.card.show', [
            'cards' => Card::where('team_id', Auth::user()->currentTeam->id)->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function createCardForm()
    {
        $this->resetValidation();
        $this->reset();
        $this->loadModal = true;
    }

    public function updateCardForm($id)
    {
        $this->resetValidation();
        $this->reset();

        $this->modelId = $id;
        $this->loadModal = true;
        $this->loadModel();
    }

    public function save()
    {
        $this->validate();

        Card::create($this->modelData());

        session()->flash('message', 'Card created');

        $this->reset();
    }

    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        Card::find($this->modelId)->update($this->modelData());

        session()->flash('message', 'Card updated');

        $this->reset();
    }

    public function modelData()
    {
        return [
            'team_id' => Auth::user()->currentTeam->id,
            'name' => $this->name,
            'card_type' => $this->card_type,
            'description' => $this->description,
            'password' => $this->password,
        ];
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = Card::find($this->modelId);

        $this->name = $data->name;
        $this->card_type = $data->card_type;
        $this->description = $data->description;
        $this->password = $data->password;
    }
}
