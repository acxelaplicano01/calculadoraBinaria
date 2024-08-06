<?php

namespace App\Livewire;

use Livewire\Component;

class Converter extends Component
{
 
    //funcion para convertir binario a decimal
    public function binarioDecimal($binario)
    {
        $decimal = 0;
        $binario = strrev($binario);
        for ($i = 0, $j = strlen($binario); $i < $j; $i++) {
            $decimal += ((int)$binario[$i] * (2 ** $i));
        }
        return $decimal;
    }

    //funcion para convertir binario a octal
    public function binarioOctal($binario)
    {
        $decimal = $this->binarioDecimal($binario);
        $octal = decoct($decimal);
        return $octal;
    }

    //funcion para convertir binario a hexadecimal
    public function binarioHexadecimal($binario)
    {
        $decimal = $this->binarioDecimal($binario);
        $hexadecimal = dechex($decimal);
        return $hexadecimal;
    }

    //funcion para convertir decimal a binario
    public function decimalBinario($decimal)
    {
        $binario = decbin($decimal);
        return $binario;
    }

    //funcion para convertir decimal a binario
    public function decimalOctal($decimal)
    {
        $octal = decoct($decimal);
        return $octal;
    }

    //funcion para convertir hexadecimal a binario
    public function hexadecimalBinario($hexadecimal)
    {
        $decimal = hexdec($hexadecimal);
        $binario = decbin($decimal);
        return $binario;
    }

    //funcion para convertir hexadecimal a decimal
    public function hexadecimalDecimal($hexadecimal)
    {
        $decimal = hexdec($hexadecimal);
        return $decimal;
    }

   
    public function render()
    {
        return view('livewire.converter');
    }
}
