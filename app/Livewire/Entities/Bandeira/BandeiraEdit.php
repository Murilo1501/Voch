<?php

namespace App\Livewire\Entities\Bandeira;

use Livewire\Component;
use App\Models\GrupoEconomico;
use App\Models\Bandeira;

class BandeiraEdit extends Component
{

    public string $nome = '';
    public int $id;
    public $grupoEconomicoId;
    public $grupoEconomico;



    public function mount(int $id)
    {
        $this->grupoEconomico = GrupoEconomico::all();
    
        $this->grupoEconomicoId = $id;

        $bandeira = Bandeira::findOrFail($id);
        $this->nome = $bandeira->nome;
        $this->id = $bandeira->id;

    }

    public function edit()
    {
        $validated = $this->validate();

        $bandeira = Bandeira::findOrFail($this->id);
        $bandeira->nome = $this->nome;
        $bandeira->grupo_economico_id = $this->grupoEconomicoId;

        $bandeira->save();

        return redirect()->to('/bandeira/listar')
             ->with('status', 'bandeira atualizada com sucesso!');


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
        return view('livewire.entities.bandeira.bandeira-edit');
    }
}
