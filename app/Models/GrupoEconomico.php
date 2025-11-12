<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bandeira;

//Log Trait
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class GrupoEconomico extends Model
{

    use LogsActivity;

    protected $fillable = ['nome'];
    protected $table = 'grupo_economico';

    public function bandeiras()
    {
        return $this->hasMany(Bandeira::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['nome'])
        ->useLogName('GrupoEconomico')  
        ->logOnlyDirty() 
        ->dontSubmitEmptyLogs()
        ->setDescriptionForEvent(fn(string $event) => "Grupo Economico{$event}");
    }

    public function logs()
    {
        return $this->morphMany(Activity::class, 'subject');
    }
}
