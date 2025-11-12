<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class Logs extends Component
{

    public $data;

    public function mount()
    {
        $this->data = Activity::latest()->get(); 
    }
    public function render()
    {
        return view('livewire.logs');
    }
}
