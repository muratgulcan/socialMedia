<?php

namespace App\Http\Livewire;

use Livewire\Component;




class SearchDropDown extends Component
{

    

    public function render()
    {

        $search = 'hello there';
        return view('livewire.search-dropdown', ['search'=>$search,]);
    }
}
