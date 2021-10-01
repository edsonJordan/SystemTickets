<?php

namespace App\Http\Livewire\Admin\Ticket;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersShow extends Component
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
        $users = User::where('name', 'LIKE', '%'.$this->search.'%')                    
                    ->orWhere('email', 'LIKE', '%'.$this->search.'%')->paginate(10);

        return view('livewire.admin.ticket.users-show', compact('users'));
    }
}
