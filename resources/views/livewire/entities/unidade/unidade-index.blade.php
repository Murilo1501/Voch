<div>
    
    <div class="flex flex-row justify-between ">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">
            Lista de Unidades
        </h1>

        <div class="flex">
            <button type="button" class="text-white bg-gray-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="/unidade/cadastrar">cadastrar Unidade </a></button>
        </div>
    </div>
   
  @if (session('status'))
   <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50  dark:text-green-400" role="alert" style="background-color: #2e2e2e;>
        <span class="font-medium">  {{ session('status') }}</span> 
    </div>
@endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-white text-white" style="background-color: #515151;" >
                <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 text-white">
                    <tr style="background-color: #515151;">
                         <th scope="col" class="px-6 py-3">
                           ID
                        </th>

                        <th scope="col" class="px-6 py-3">
                           Nome Fantasia
                        </th>
                         <th scope="col" class="px-6 py-3">
                           Bandeira
                        </th>
                        <th scope="col" class="px-6 py-3">
                           CNPJ
                        </th>
                         <th scope="col" class="px-6 py-3">
                           Razao Social
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Data de criacao 
                        </th>
                        <th scope="col" class="px-6 py-3">
                            última atualizacao 
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Editar
                        </th>
                         <th scope="col" class="px-6 py-3">
                            Deletar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr class="odd:bg-white odd:dark:bg-gray-600 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200" style="background-color: #515151;">
                            <td class="px-6 py-4">{{$item->id}}</td>
                            <td class="px-6 py-4">{{$item->nome}}</td>
                            <td class="px-6 py-4">{{$item->razaoSocial}}</td>
                            <td class="px-6 py-4">{{$item->cnpj}}</td>
                            <td class="px-6 py-4">{{$item->bandeira->nome}}</td>
                            <td class="px-6 py-4">{{$item->created_at}}</td>
                            <td class="px-6 py-4">{{$item->updated_at}}</td>
                            <td class="px-6 py-4"><a href="{{'/unidade/'.$item->id.'/editar'}}">Editar</a></td>
                            <td class="px-6 py-4"> <button wire:click="deletar({{ $item->id }})"> deletar</button> </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>

   
    </div>
  
</div>

