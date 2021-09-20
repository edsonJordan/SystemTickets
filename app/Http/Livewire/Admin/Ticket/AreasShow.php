<?php

namespace App\Http\Livewire\Admin\Ticket;

use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;

class AreasShow extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $areas = Area::where('area', 'LIKE', '%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.areas-show', compact('areas'));
    }
}