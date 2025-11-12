<?php

namespace App\Livewire\Entities\Unidade;

use Livewire\Component;
use App\Models\Unidade;
use App\Models\Bandeira;

class UnidadeCreate extends Component
{

    public string $nome = '';
    public string $razaoSocial = '';
    public string $cnpj = '';
    public int $bandeira_id;
    public $bandeiras;

    public function mount()
    {
        $this->bandeiras = Bandeira::all();
    }

    public function store()
    {
        $validated = $this->validate();

        $store = Unidade::create($validated);

          return redirect()->to('/unidade/listar')
                ->with('status', 'Unidade criada!');
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
            'razaoSocial.required' => 'A razão social é obrigatória'
        ];
    }



    public function render()
    {
        return view('livewire.entities.unidade.unidade-create');
    }
}
