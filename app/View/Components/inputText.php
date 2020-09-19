<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Str;

class inputText extends Component
{
    public $name, $value, $placeholder , $type, $key;

    public function __construct($name, $value = null, $placeholder = "" , $type = 'text')
    {
        $this->name        = $name;
        $this->key          = Str::replaceFirst(']', '', Str::replaceFirst('[', '.', $name));
        $this->value       = $value ?? old($this->key);
        $this->placeholder = $placeholder;
        $this->type        = $type;
    }

    public function render()
    {
        return view('components.input-text');
    }
}
