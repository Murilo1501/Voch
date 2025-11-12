<?php

namespace App\Livewire\Entities\Unidade;

use Livewire\Component;
use App\Models\Unidade;

class UnidadeIndex extends Component
{

    public $data;

    public function mount()
    {
        $this->data = Unidade::all();
    }

    public function deletar(int $id)
    {
        $unidade = Unidade::find($id);

        if (!$unidade) {
            return redirect()->to('/unidade/listar')
            ->with('status', 'grupo nao encontrado');    
        }

        $unidade->delete();
        $this->data = Unidade::all();

         return redirect()->to('/unidade/listar')
            ->with('status', 'Unidade deletada com sucesso!');
    }


    public function render()
    {
        return view('livewire.entities.unidade.unidade-index');
    }
}
