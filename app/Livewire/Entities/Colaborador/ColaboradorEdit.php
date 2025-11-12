<?php

namespace App\Livewire\Entities\Colaborador;

use Livewire\Component;
use App\Models\Unidade;
use App\Models\Colaborador;

class ColaboradorEdit extends Component
{
    public string $nome;
    public string $email;
    public string $cpf;
    public $unidades;
    public $unidade_id;
    public int $id;

    public function mount(int $id)
    {
        $this->unidades = Unidade::all();

        $colaborador = Colaborador::findOrFail($id);
        $this->nome = $colaborador->nome;
        $this->email = $colaborador->email;
        $this->cpf = $colaborador->cpf;
        $this->unidade_id = $colaborador->unidade_id;

        $this->id = $colaborador->id;
    }

    public function edit()
    {
        $validated = $this->validate();

        $colaborador = Colaborador::findOrFail($this->id);
        $colaborador->nome = $this->nome;
        $colaborador->email = $this->email;
        $colaborador->cpf = $this->cpf;
        $colaborador->unidade_id = $this->unidade_id;

        $colaborador->save();

        return redirect()->to('/colaborador/listar')
             ->with('status', 'Colaborador atualizado com sucesso!');
    }

    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255','email'],
            'cpf' => ['required', 'string', 'cpf', 'max:255'],
            'unidade_id' => ['required','exists:unidade,id']
        ];
    }


     protected function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.cpf' => 'O CPF informado é inválido.',
            'unidade_id.required' => 'Selecione uma unidade.',  
            'email.email' => 'O Email é inválido',
            'cpf.unique' => 'O CPF deve ser único'
        ];
    }

    public function render()
    {
        return view('livewire.entities.colaborador.colaborador-edit');
    }
}
