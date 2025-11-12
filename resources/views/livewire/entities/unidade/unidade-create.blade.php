<div>
  
     <div class="flex flex-row justify-between ">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">
            Cadastre uma nova Unidade 
        </h1>

        <div class="flex">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="/unidade/listar">Voltar</a></button>
        </div>
    </div>
      @if ($errors->any())
        <div class="bg-red-300 text-red-700 p-4 rounded mb-4 text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="max-w-sm " wire:submit="store">
        <div class="mb-5">
            <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome Unidade</label>
            <input type="text" id="nome" wire:model="nome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5  dark:border-gray-600  dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Unidade" required />
        </div>

         <div class="mb-5">
            <label for="razaoSocial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Razão Social</label>
            <input type="text" id="razaoSocial" wire:model="razaoSocial" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5  dark:border-gray-600  dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Razao Social" required />
        </div>

         <div class="mb-5">
            <label for="cnpj" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CNPJ</label>
            <input type="text" id="cnpj" wire:model="cnpj" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5  dark:border-gray-600  dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="CNPJ" required />
        </div>

         <div>
            <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Bandeira</label>
            <select wire:model="bandeira_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Selecione um grupo...</option>
                @foreach($bandeiras as $bandeira)
                    <option value="{{ $bandeira->id }}">{{ $bandeira->nome }}</option>
                @endforeach
            </select>
           
        </div>

        <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
    </form>

</div>