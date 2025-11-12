<?php

namespace App\Livewire\Entities\Colaborador;

use Livewire\Component;
use App\Models\Unidade;
use App\Models\Colaborador;

class ColaboradorCreate extends Component
{

    public string $nome;
    public string $email;
    public string $cpf;
    public $unidades;
    public $unidade_id;

    public function mount()
    {
        $this->unidades = Unidade::all();
    }

    public function store()
    {
        $validated = $this->validate();

        $store = Colaborador::create($validated);
        return redirect()->to('/colaborador/listar')
            ->with('status', 'Colaborador cadastrado!');
    }

    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255','unique:colaborador','email'],
            'cpf' => ['required', 'string', 'cpf', 'max:255','unique:colaborador'],
            'unidade_id' => ['required','exists:unidade,id']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
            'email.unique' => 'o Email deve ser único',
            'cpf.unique' => 'O CPF deve ser único'
        ];
    }


    public function render()
    {
        return view('livewire.entities.colaborador.colaborador-create');
    }



    
}
