<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Exports\ColaboradoresExport;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Maatwebsite\Excel\Facades\Excel;


class ExportarColaboradores implements ShouldQueue
{
   use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $path;
    
    public function __construct()
    {
        $this->path = 'relatorios/colaboradores.xlsx';
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Excel::store(new ColaboradoresExport, $this->path, 'public');
    }
}
