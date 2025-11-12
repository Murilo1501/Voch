<?php

namespace App\Livewire\Entities\Bandeira;

use Livewire\Component;
use App\Models\GrupoEconomico;
use App\Models\Bandeira;

class BandeiraCreate extends Component
{

    public $nome;
    public $grupoEconomicoId;
    public $grupos;

    public function mount()
    {
        $this->grupos = GrupoEconomico::all(); 
    }


    public function store()
    {
        $validated = $this->validate();

        $store = Bandeira::create([
            'nome' => $this->nome,
            'grupo_economico_id' => $this->grupoEconomicoId
        ]);

            return redirect()->to('/bandeira/listar')
                ->with('status', 'Bandeira criada!');
        

    }

    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'grupoEconomicoId' => ['required','exists:grupo_economico,id']
        ];
    }

    public function messages()
    {
          return [
            'nome.required' => 'O nome é obrigatório.',
            'grupoEconomicoId.required' => 'Selecione uma Grupo Economico.',  
        ];
    }

    public function render()
    {
        return view('livewire.entities.bandeira.bandeira-create');
    }
}
