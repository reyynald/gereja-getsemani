<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function render(): View
    {
        return view('layouts.app'); // Pastikan file resources/views/layouts/app.blade.php ada
    }
}