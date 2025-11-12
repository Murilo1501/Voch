<?php

namespace App\Livewire\Entities\GrupoEconomico;

use Livewire\Component;
use App\Models\GrupoEconomico;

class GrupoEconomicoEdit extends Component
{

    public string $nome = '';
    public int $id;

    public function mount(int $id)
    {
        $grupo = GrupoEconomico::findOrFail($id);
        $this->nome = $grupo->nome;
        $this->id = $grupo->id;
    }

    public function edit()
    {
        $validated = $this->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);

        $grupo = GrupoEconomico::findOrFail($this->id);
        $grupo->nome = $this->nome;

        $grupo->save();

          return redirect()->to('/grupoEconomico/listar')
            ->with('status', 'grupo economico atualizado com sucesso!');
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
        return view('livewire.entities.grupo-economico.grupo-economico-edit');
    }
}
