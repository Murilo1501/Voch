<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Bandeira;
use App\Models\Colaborador;

//Log Trait
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Unidade extends Model
{

    use LogsActivity;

    protected $fillable = ['nome', 'razaoSocial', 'cnpj', 'bandeira_id'];
    protected $table = 'unidade';

    public function bandeira()
    {
        return $this->belongsTo(Bandeira::class);
    }

    public function colaborador()
    {
        return $this->hasMany(Colaborador::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['nome','razaoSocial','cnpj','bandeira_id'])
        ->useLogName('Unidade')  
        ->logOnlyDirty() 
        ->dontSubmitEmptyLogs()
        ->setDescriptionForEvent(fn(string $event) => "Unidade {$event}");
    }
}
