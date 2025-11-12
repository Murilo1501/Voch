<?php

namespace App\Livewire\Entities\Unidade;

use Livewire\Component;
use App\Models\Unidade;
use App\Models\Bandeira;

class UnidadeEdit extends Component
{

    public string $nome;
    public string $cnpj;
    public string $razaoSocial;
    public $bandeiras;
    public $bandeira_id;
    public int $id;

    public function mount(int $id)
    {
        $this->bandeiras = Bandeira::all();

        $this->bandeira_id = $id;

        $unidade = Unidade::findOrFail($id);

        $this->nome = $unidade->nome;
        $this->id = $unidade->id;
        $this->cnpj = $unidade->cnpj;
        $this->razaoSocial = $unidade->razaoSocial;
        $this->bandeira_id = $unidade->bandeira_id;
    }

    public function edit()
    {

        $validated = $this->validate();


        $unidade = $this->bandeiras = Unidade::findOrFail($this->id);
        $unidade->nome = $this->nome;
        $unidade->razaoSocial = $this->razaoSocial;
        $unidade->cnpj = $this->cnpj;  

        $unidade->save();

         return redirect()->to('/unidade/listar')
             ->with('status', 'Unidade atualizada com sucesso!');
    }

     public function rules()
    {
         return [
            'nome' => ['required', 'string', 'max:255'],
            'cnpj' => ['required','cnpj', 'string', 'max:255','unique:unidade'],
            'razaoSocial' => ['required', 'string', 'max:255'],
            'bandeira_id' => ['required','exists:bandeira,id']
        ];
    }

      public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'cnpj.required' => 'O CNPJ é obrigatório.',
            'cnpj.cnpj' => 'O CNPJ informado é inválido.',
            'bandeira_id.required' => 'Selecione uma bandeira.',  
            'razaoSocial.required' => 'A razão social é obrigatória',
            'cnpj.unique' => 'CNPJ deve ser único'
        ];
    }


    public function render()
    {
        return view('livewire.entities.unidade.unidade-edit');
    }
}
