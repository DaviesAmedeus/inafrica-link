<?php

namespace App\Livewire\Front;

use Livewire\Component;

class SingleTour extends Component
{

 public $tour;

  public $tab = null;
  public $tabname = 'overview';
  protected  $queryString = ['tab' => ['keep' => true]];


   public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount($tour = null)
    {
$this->tour = $tour;
       

        $this->tab = Request('tab') ? Request('tab') : $this->tabname;

    }

    public function render()
    {
        return view('livewire.front.single-tour');
    }
}
