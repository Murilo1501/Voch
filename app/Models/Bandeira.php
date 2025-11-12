<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GrupoEconomico;
use App\Models\Unidade;

//Log Trait
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Bandeira extends Model
{
    protected $fillable = ['nome','grupo_economico_id'];
    protected $table = 'bandeira';

    use LogsActivity;

    public function grupoEconomico()
    {
        return $this->belongsTo(GrupoEconomico::class);
    }

    public function unidade()
    {
        return $this->hasMany(Unidade::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['nome','grupo_economico_id'])
        ->useLogName('Bandeira')  
        ->logOnlyDirty() 
        ->dontSubmitEmptyLogs()
        ->setDescriptionForEvent(fn(string $event) => "Bandeira {$event}");
    }
}
