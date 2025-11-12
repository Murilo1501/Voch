<?php

namespace App\Livewire\Entities\GrupoEconomico;

use Livewire\Component;
use App\Models\GrupoEconomico;



class GrupoEconomicoIndex extends Component
{

    public $data;

    public function mount():void
    {
        $this->data = GrupoEconomico::all();
    }

    public function deletar(int $id)
    {
        $grupo = GrupoEconomico::find($id);

        if (!$grupo) {
             return redirect()->to('/grupoEconomico/listar')
             ->with('status', 'grupo nao encontrado');    
        }

        $grupo->delete();
        $this->data = GrupoEconomico::all();

         return redirect()->to('/grupoEconomico/listar')
             ->with('status', 'grupo economico deletado com sucesso!');

      
    }

    public function render()
    {
        return view('livewire.entities.grupo-economico.grupo-economico-index');
       
    }
}
