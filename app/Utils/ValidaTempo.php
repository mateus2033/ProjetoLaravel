<?php

namespace App\Utils;

use DateTime;
use Exception;

class ValidaTempo {


    /**
     * Informa o parametro referente a data para validacao.
     * @param string $data
     * @return Exception|true
     */
    public static function validaData(string $data)
    {

        $format   = 'd-m-Y';
        $response = DateTime::createFromFormat($format, $data);
        $result   = $response && $response->format($format) == $data;
        
        if(!$result)
        {   
            throw new Exception("Erro, informe a data em Y-m-d.",406);
            
        }

        return $result;
            
    }

    /**
     * Passe o valor referente ao tempo em horas para validacao.
     * @param string $hora
     * @return Exception|true
     */
    public static function validaHora(string $hora)
    {

        $format     = 'H:i';
        $response   = DateTime::createFromFormat('!'. $format, $hora);
        $result     = $response && $response->format($format) === $hora;

        if(!$result)
        {
            throw new Exception("Erro, informe o tempo em H:i.");
        }

        return $result;

        
    }


}