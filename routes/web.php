<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

//Entities

//Grupo Economico
use App\Livewire\Entities\GrupoEconomico\GrupoEconomicoIndex;
use App\Livewire\Entities\GrupoEconomico\GrupoEconomicoCreate;
use App\Livewire\Entities\GrupoEconomico\GrupoEconomicoEdit;

//Bandeira 
use App\Livewire\Entities\Bandeira\BandeiraIndex;
use App\Livewire\Entities\Bandeira\BandeiraCreate;
use App\Livewire\Entities\Bandeira\BandeiraEdit;

//Unidade
use App\Livewire\Entities\Unidade\UnidadeIndex;
use App\Livewire\Entities\Unidade\UnidadeCreate;
use App\Livewire\Entities\Unidade\UnidadeEdit;

//Colaborador 
use App\Livewire\Entities\Colaborador\ColaboradorIndex;
use App\Livewire\Entities\Colaborador\ColaboradorCreate;
use App\Livewire\Entities\Colaborador\ColaboradorEdit;

//Log

use App\Livewire\Logs;



//Route::redirect('/', '/login');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::middleware(['auth'])->group(function () {


    //Route::get('/dashboard',Logs::class)->name('auditoria.listar');

    //Grupo Economico 
    Route::get('grupoEconomico/listar',GrupoEconomicoIndex::class)->name('grupoEconomico.listar');
    Route::get('grupoEconomico/cadastrar',GrupoEconomicoCreate::class)->name('grupoEconomico.cadastrar');
    Route::get('grupoEconomico/{id}/editar',GrupoEconomicoEdit::class)->name('grupoEconomico.editar');
    Route::get('grupoEconomico/{id}/deletar',GrupoEconomicoIndex::class)->name('grupoEconomico.deletar');

    //Bandeira 
    Route::get('bandeira/listar',BandeiraIndex::class)->name('bandeira.listar');
    Route::get('bandeira/cadastrar',BandeiraCreate::class)->name('bandeira.cadastrar');
    Route::get('bandeira/{id}/editar',BandeiraEdit::class)->name('bandeira.editar');
    Route::get('bandeira/{id}/deletarr',BandeiraIndex::class)->name('bandeira.deletar');

    //Unidade 
    Route::get('unidade/listar',UnidadeIndex::class)->name('unidade.listar');
    Route::get('unidade/cadastrar',UnidadeCreate::class)->name('unidade.create');
    Route::get('unidade/{id}/editar',UnidadeEdit::class)->name('unidade.edit');
    Route::get('unidade/{id}/deletar',UnidadeIndex::class)->name('unidade.deletar');

    //Colaborador
    Route::get('colaborador/listar',ColaboradorIndex::class)->name('colaborador.listar');
    Route::get('colaborador/cadastrar',ColaboradorCreate::class)->name('colaborador.create');
    Route::get('colaborador/{id}/editar',ColaboradorEdit::class)->name('colaborador.edit');
    Route::get('colaborador/{id}/deletar',ColaboradorIndex::class)->name('colaborador.deletar');   
    Route::get('colaborador/relatorio',ColaboradorIndex::class)->name('colaborador.relatorio');     

    //Log 
    Route::get('auditoria/listar',Logs::class)->name('auditoria.listar');
       


    
});

require __DIR__.'/auth.php';
