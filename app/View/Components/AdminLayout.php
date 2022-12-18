<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    public $metaname;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($metaname = '',)
    {
        $this->metaname = $metaname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.admin.main');
    }
}
