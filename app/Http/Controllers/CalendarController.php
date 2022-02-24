<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CalendarRepository;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{

    protected $calendarDomain;

    public function __construct(CalendarRepository $calendarDomain)
    {
        $this->calendarDomain = $calendarDomain;
    }



    public function indexCalendar(Request $data)
    {

        $calendar = $this->calendarDomain->indexCalendar($data);
        return response($calendar, $calendar['code']);

    }


    public function calendarShow(Request $data)
    {
        
        $calendar = $this->calendarDomain->calendarShow($data->aula_id);
        return response($calendar, $calendar['code']);

    }



    public function calendarStore(Request $data)
    {
        
        $array[0] = [];
        empty($data->professor_id)   ? $professor = 0      : $professor = $data->professor_id;
        empty($data->calendar)       ? $calendar  = $array : $calendar  = $data->calendar;

        DB::beginTransaction();
        $response = $this->calendarDomain->calendarStore($professor, $calendar);
        if($response['code'] == 201)
        {
            DB::commit();
            return response($response, $response['code']);

        } else { 

            DB::rollback();
            return response($response, $response['code']);

        }

    }



    public function deleteCalendar(Request $data)
    {
        
        $array[0] = [];
        empty($data->professor_id)   ? $professor = 0      : $professor = $data->professor_id;
        empty($data->aulas)          ? $aulas     = $array : $aulas     = $data->aulas;


        DB::beginTransaction();
        $response = $this->calendarDomain->calendarDelete($professor, $aulas);
        if($response['code'] == 200)
        {
            DB::commit();
            return response($response, $response['code']);

        } else { 

            DB::rollback();
            return response($response, $response['code']);

        }

    





    }



  


}
