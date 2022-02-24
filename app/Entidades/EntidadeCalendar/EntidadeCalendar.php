<?php

namespace App\Entidades\EntidadeCalendar;

use App\Utils\ErrosEnum;
use App\Utils\ValidaTempo;

/**
 *@property string   $class_date
 *@property string   $duration
 *@property int      $aula_id
 *@property string[] $menssagem
 *@property bool     $valido
 */
class EntidadeCalendar {



    public string  $class_date;
    public string  $duration;
    public int     $usuario_id;
    public array   $menssagem;
    public bool    $valido;
    



    public static function fromJsonCalendar($data)
    {
   
        $self = new self();
        $self->validaCalendar($data);
        

        if ($self->valido) {

            $calendar = $self->montarCalendar($data);
            return $calendar;

        } else {

            return $self;
        }

    }


    /**
     * Monta o array $calendar validado
     * @param array $calendar
     */
    private function montarCalendar(array $calendar)
    {
       
        $array['class_date'] = implode('', array_reverse(explode('-', $calendar['class_date'])));
        $array['duration']   = $calendar['duration'];
        isset($calendar['aula_id']) ? $array['aula_id'] = $calendar['aula_id'] : $array['aula_id'] = null;

        return $array;

    }




    /**
     * Recebe um array $calendar e o valida.
     */
    public function validaCalendar(array $calendar)
    {

        $array = [];

        $array['class_date'] = $this->_class_date($calendar);
        $array['duration']   = $this->_duration($calendar);
        $array['aula_id']    = $this->_aula_id($calendar);


        $array = array_filter($array, function ($data) {
            return $data != null;
        });


        $calendar = !empty($array);
        if ($calendar) {
            $this->menssagem = $array;
            $this->valido    = false;
        } else {

            $this->menssagem = [];
            $this->valido    = true;
        }


    }




    /**
     *@param array $data
     *@return string|boolean
    */
    private function _class_date($calendar)
    {
        if(!isset($calendar['class_date']))
        {
            return ErrosEnum::$required;
        }

        if(ValidaTempo::validaData($calendar['class_date']))
        {
            return null;
        }

    }


    /**
     *@param array $data
     *@return string|boolean
    */
    private function _duration($calendar)
    {
        if(!isset($calendar['duration']))
        {
            return ErrosEnum::$required;
        }

        if(ValidaTempo::validaHora($calendar['duration']))
        {
            return null;
        }

    }


    /**
     *@param array $data
     *@return string|boolean
    */
    private function _aula_id($calendar)
    {

        if(isset($calendar['aula_id']))
        {
            return null;
        }

        if(is_integer($calendar['aula_id']))
        {
            return null;
        }

        return null;
        
    }









}