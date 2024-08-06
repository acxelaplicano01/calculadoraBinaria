<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calculator extends Component
{
    public $display = '';
    public $currentBase = 'bin'; // Base inicial

    public function render()
    {
        return view('livewire.calculator');
    }

    public function buttonClick($value)
    {
        $allowedChars = [
            'bin' => '/^[01+\-*/.]*$/',
            'oct' => '/^[0-7+\-*/.]*$/',
            'dec' => '/^[0-9+\-*/.]*$/',
            'hex' => '/^[0-9A-Fa-f+\-*/.]*$/'
        ];

        if (preg_match($allowedChars[$this->currentBase], $this->display . $value)) {
            $this->display .= $value;
        }
    }

    public function handleBaseChange($base)
    {
        $this->currentBase = $base;
    }

    public function calculate()
    {
        if ($this->display !== '') {
            try {
                $result = eval('return ' . str_replace('%', '/100', $this->display) . ';');
                if ($this->currentBase === 'bin') {
                    $this->display = base_convert($result, 10, 2);
                } elseif ($this->currentBase === 'oct') {
                    $this->display = base_convert($result, 10, 8);
                } elseif ($this->currentBase === 'hex') {
                    $this->display = base_convert($result, 10, 16);
                } else {
                    $this->display = $result;
                }
            } catch (\Exception $e) {
                $this->display = 'Error';
            }
        }
    }

    public function clear()
    {
        $this->display = '';
    }

    public function delete()
    {
        $this->display = substr($this->display, 0, -1);
    }
}
