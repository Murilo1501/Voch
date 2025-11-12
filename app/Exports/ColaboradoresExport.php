<?php

namespace App\Exports;

use App\Models\Colaborador;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ColaboradoresExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $dadosColaboradores = Colaborador::with('unidade')->get();

        $valores = [];

        foreach ($dadosColaboradores as $colaborador) {
            $valores[] = [
                $colaborador->id,
                $colaborador->nome,
                $colaborador->email,
                $colaborador->cpf,
                optional($colaborador->unidade)->nome ?? 'Sem Unidade',
                $colaborador->created_at->format('d/m/Y'),
                $colaborador->updated_at->format('d/m/Y'),
            ];
        }

       

        return collect($valores);
    }

    public function headings(): array
    {
        return [
            'ID',
            'NOME',
            'EMAIL',
            'CPF',
            'UNIDADE',
            'DATA DE CADASTRO',
            'ÚLTIMA ATUALIZAÇÃO',
        ];
    }
}
