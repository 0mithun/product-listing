<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotFound extends Component
{
    public $title, $subtitle,  $btnMessage, $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title = 'No results found', string $subtitle = "Try adjusting your search or filter to find what you're looking for.", string $btnMessage = 'Add your first user', $route = 'home')
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->btnMessage = $btnMessage;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.not-found');
    }
}
