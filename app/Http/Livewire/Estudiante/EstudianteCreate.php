<?php

namespace App\Http\Livewire\Estudiante;

use Livewire\Component;

class EstudianteCreate extends Component
{

    public $vive = 'true';

    public function render()
    {
        // return view('livewire.matricula-create', compact('estudiante'));
        

        
        return view('livewire.estudiante.estudiante-create');
        
    }
}
