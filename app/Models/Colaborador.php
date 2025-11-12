<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//Log Trait
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Colaborador extends Model
{

    use LogsActivity;


    protected $fillable = ['nome','email','cpf','unidade_id'];
    protected $table = 'colaborador';

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['nome','email','cpf'])
        ->useLogName('Colaborador')  
        ->logOnlyDirty() 
        ->dontSubmitEmptyLogs()
        ->setDescriptionForEvent(fn(string $event) => "Colaborador {$event}");
    }
}
