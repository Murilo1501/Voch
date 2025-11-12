<div>
    
    <div class="flex flex-row justify-between ">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">
            Lista de Logs 
        </h1>
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
                           Nome Log
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descrição
                        </th>
                         <th scope="col" class="px-6 py-3">
                            Entidade
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Evento 
                        </th>
                         <th scope="col" class="px-6 py-3">
                            Id do usuário 
                        </th>
                        <th scope="col" class="px-6 py-3">
                            data de criação
                        </th>
                        <th scope="col" class="px-6 py-3">
                            última atualizacao 
                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr class="odd:bg-white odd:dark:bg-gray-600 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200" style="background-color: #515151;">
                            <td class="px-6 py-4">{{$item->id}}</td>
                            <td class="px-6 py-4">{{$item->log_name}}</td>
                            <td class="px-6 py-4">{{$item->description}}</td>
                            <td class="px-6 py-4">{{$item->subject_type}}</td>
                            <td class="px-6 py-4">{{$item->event}}</td>
                            <td class="px-6 py-4">{{$item->causer_id}}</td>
                            <td class="px-6 py-4">{{$item->created_at}}</td>
                            <td class="px-6 py-4">{{$item->updated_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>

   
    </div>
  
</div>

