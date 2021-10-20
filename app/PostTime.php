<?php

function PostTime($startParameter,$endParameter)
{
   $startDate = new DateTime($startParameter);
    $endDate = new DateTime($endParameter);
    $date = $startDate->diff($endDate);
    $time = "";

    //años
    if($date->y > 0)
    {
        $time .= $date->y;

        if($date->y == 1)
            $time .= " YEAR ";
        else
            $time .= " YEARS ";

            return $time;
    }

    //meses
    if($date->m > 0)
    {
        $time .= $date->m;

        if($date->m == 1)
            $time .= " MONTH ";
        else
            $time .= " MONTHS ";

            return $time;
    }

    //dias
    if($date->d > 0)
    {
        $time .= $date->d;

        if($date->d == 1)
            $time .= " DAY ";
        else
            $time .= " DAYS ";

            return $time;
    }

    //horas
    if($date->h > 0)
    {
        $time .= $date->h;

        if($date->h == 1)
            $time .= " HOUR ";
        else
            $time .= " HOURS ";

            return $time;
    }

    //minutos
    if($date->i > 0)
    {
        $time .= $date->i;

        if($date->i == 1)
            $time .= " MINUTE ";
        else
            $time .= " MINUTES ";

            return $time;

    }
    else if($date->i == 0) //segundos
        $time .= $date->s." SECONDS ";

    return $time;

}
?>
