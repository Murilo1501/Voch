<?php

namespace App\Livewire\Entities\GrupoEconomico;

use Livewire\Component;
use App\Models\GrupoEconomico;
class GrupoEconomicoCreate extends Component
{

    public string $nome = '';

    public function store()
    {
        $validated = $this->validate();

        $store = GrupoEconomico::create([
            'nome' => $this->nome
        ]);

            return redirect()->to('/grupoEconomico/listar')
                ->with('status', 'grupo economico criado!');
    
    }

    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
        ];
    }

    protected function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
        ];
    }


    public function render()
    {
        return view('livewire.entities.grupo-economico.grupo-economico-create');
    }
}
