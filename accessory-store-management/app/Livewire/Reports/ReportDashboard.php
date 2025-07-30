<?php

namespace App\Livewire\Reports;

use Livewire\Component;

class ReportDashboard extends Component
{
    public function render()
    {
        return view('livewire.reports.report-dashboard')->layout('components.layouts.app', [
            'title' => __('app.reports')
        ]);
    }
}
