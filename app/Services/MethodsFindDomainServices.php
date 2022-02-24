<?php

namespace App\Services;

use App\Repository\ProfessorRepository;
use App\Repository\AulasRepository;
use App\Repository\CalendarRepository;



class MethodsFindDomainServices
{

    protected $professorDomain;
    protected $aulasDomain;
    protected $calendarDomain;

    public function __construct(CalendarRepository $calendarDomain, AulasRepository $aulasDomain, ProfessorRepository $professorDomain)
    {
        $this->professorDomain = $professorDomain;
        $this->aulasDomain     = $aulasDomain;
        $this->calendarDomain  = $calendarDomain;

    }


    public function getProfessor($professor)
    {   
        return $this->professorDomain->getProfessor(['id'=>$professor]);
    }


    public function getOnlyProfessor($data)
    {
        return $this->professorDomain->getOnlyProfessor(['id'=>$data]);
    }

    public function getOnlyAulas($data)
    {  
        return $this->aulasDomain->getOnlyAulas($data);
    }
  

    public function getOnlyCalendar($data)
    {
        return $this->calendarDomain->getOnlyCalendar($data);
    }




}
