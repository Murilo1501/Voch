<?php

namespace App\Livewire\Entities\Bandeira;

use Livewire\Component;
use App\Models\Bandeira;

class BandeiraIndex extends Component
{

    public $data;

    public function mount():void
    {
        $this->data = Bandeira::all();
    }

    public function deletar(int $id)
    {
        $grupo = Bandeira::find($id);

        if (!$grupo) {
             return redirect()->to('/bandeira/listar')
             ->with('status', 'grupo nao encontrado');    
        }

        $grupo->delete();
        $this->data = Bandeira::all();

         return redirect()->to('/grupoEconomico/listar')
             ->with('status', 'grupo economico deletado com sucesso!');

      
    }

    public function render()
    {
        return view('livewire.entities.bandeira.bandeira-index');
    }
}
