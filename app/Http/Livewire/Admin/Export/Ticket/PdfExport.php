<?php

namespace App\Http\Livewire\Admin\Export\Ticket;

use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PdfExport extends Component
{
    use WithPagination;
    
    protected $paginationTheme = "bootstrap";
    public $inputUser;
    public $inputStatus;
    public $inputDateStart;
    public $inputDateEnd;
    public $perPage= '2';
    private $getTickets ;

    private $menssage;

    public function updatinginputUser(){
        $this->resetPage();
    }
    public function updatinginputStatus(){
        $this->resetPage();
    }
    public function updatinginputDateStart(){
        $this->resetPage();
    }public function updatinginputDateEnd(){
        $this->resetPage();
    }

    public function render(){   
      

        $users = User::select('name', 'id')->get();
        $getStatus = TicketStatus::select('status', 'id')->get();  
        empty($this->inputUser) ? $this->inputUser=null: $this->inputUser;
        empty($this->inputStatus) ? $this->inputStatus= null: $this->inputStatus;
        empty($this->inputDateEnd) ? $this->inputDateEnd=null: $this->inputDateEnd;        
        empty($this->inputDateStart) ? $this->inputDateStart= null: $this->inputDateStart; 
       
        if($this->inputDateStart == null and $this->inputDateEnd == null){
            $this->getTickets = $tickets = Ticket::Where([['user_id', 'LIKE', $this->inputUser], ['status_id', 'LIKE', $this->inputStatus]])->paginate($this->perPage);
        }
        if(!is_null($this->inputDateStart) ){
            $this->getTickets = $tickets = Ticket::Where([['user_id', 'LIKE', $this->inputUser], ['status_id', 'LIKE', $this->inputStatus]])
            ->whereDate('created_at', '>=', $this->inputDateStart.' 00:00:00')    
            ->paginate($this->perPage);
        }
        if(!is_null($this->inputDateEnd)){
            $this->getTickets = $tickets = Ticket::Where([['user_id', 'LIKE', $this->inputUser], ['status_id', 'LIKE', $this->inputStatus]])
            ->whereDate('created_at', '<=', $this->inputDateEnd.' 00:00:00')    
            ->paginate($this->perPage);
        }
        if(!is_null($this->inputDateStart) && !is_null($this->inputDateEnd)){
            $this->getTickets = $tickets = Ticket::Where([['user_id', 'LIKE', $this->inputUser], ['status_id', 'LIKE', $this->inputStatus]])
            ->whereBetween('created_at', [ $this->inputDateStart.' 00:00:00',  $this->inputDateEnd.' 00:00:00']) 
            ->paginate($this->perPage);
        }
        $tickets = $this->getTickets;
        //->whereDate('created_at', '<=', date('Y-m-d').' 00:00:00')->paginate($this->perPage)
        




        
        return view('livewire.admin.export.ticket.pdf-export', compact('users', 'getStatus', 'tickets'));
    }
    
}
