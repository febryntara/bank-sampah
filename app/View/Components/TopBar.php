<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopBar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function generate_breadcrumb($url): array
    {
        $url = parse_url($url)['path'] ?? '';
        $url = explode('/', $url);
        $segemnt = array_filter($url, function ($value) {
            return $value !== null && $value !== "";
        });

        return $segemnt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.top-bar');
    }
}
