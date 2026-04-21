<?php

namespace App\Livewire\Admin;

use App\Models\Tour;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Tours extends Component
{
    use WithPagination;
    public $perPage = 2;

    public function render()
    {
        return view('livewire.admin.tours', [
            'posts'=> Auth::user()->type== "superAdmin" ? Tour::paginate($this->perPage) : Tour::where('author_id', Auth::user()->id)->paginate($this->perPage)
        ]);
    }
}
