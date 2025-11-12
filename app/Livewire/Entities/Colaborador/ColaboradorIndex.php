<?php

namespace App\Livewire\Entities\Colaborador;

use Livewire\Component;
use App\Models\Colaborador;
use App\Jobs\ExportarColaboradores;

class ColaboradorIndex extends Component
{

    public $data;

    public function mount()
    {
        $this->data = Colaborador::all();
    }

    public function deletar(int $id)
    {
        $colaborador = Colaborador::find($id);

        if (!$colaborador) {
             return redirect()->to('/colaborador/listar')
             ->with('status', 'colaborador nao encontrado');    
        }

        $colaborador->delete();
        $this->data = Colaborador::all();

        return redirect()->to('/colaborador/listar')
            ->with('status', 'Colaborador deletado com sucesso!');
    }

    public function gerarRelatorio()
    {
        ExportarColaboradores::dispatch();
        session()->flash('status', 'Relatório sendo gerado! Atualize a página');
    }

    public function render()
    {
        return view('livewire.entities.colaborador.colaborador-index');
    }
}
