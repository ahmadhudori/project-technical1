<?php

namespace App\Livewire;

use App\Models\DataTable;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardTable extends Component
{
	use WithPagination;

	protected $paginationTheme = 'tailwind';

	public $search = '';
	public $perPage;

	public function updateSearch()
	{
		$this->resetPage();
	}


    public function render()
    {
		$datas = DataTable::where(function ($q) {
                $q->where('code_b1_b2_edgetape', 'like', '%' . $this->search . '%')
                  ->orWhere('code_b2', 'like', '%' . $this->search . '%')
                  ->orWhere('direction', 'like', '%' . $this->search . '%');
            })
            // ->orderBy('id', 'desc')
            ->paginate($this->perPage ?? 10);
        return view('livewire.dashboard-table', compact('datas'));
    }
}

