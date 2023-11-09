<?php

namespace App\View\Components;

use App\Models\Slang;
use Illuminate\View\Component;

class SlangDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.slang-dropdown', [
            'slangs' => Slang::all(),
            'currentSlang' => Slang::firstWhere('name', request('slang'))
        ]);
    }
}
