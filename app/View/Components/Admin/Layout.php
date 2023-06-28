<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * The component title.
     *
     * @var string
     */
    public $title;

    /**
     * The component header.
     *
     * @var string
     */
    public $header;

    /**
     * Create a new component instance.
     *
     * @param string $title
     */
    public function __construct($title = '', $header = '')
    {
        $this->title  = $title;
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.admin.index');
    }
}
