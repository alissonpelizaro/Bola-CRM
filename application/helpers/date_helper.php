<?php

class Date{

    public static function literalDate($date){
        $dateEx = explode(" ", $date);
        
        if(count($dateEx) == 1){
            # 0000-00-00
            $dateEx = explode("-", $dateEx[0]);
            return $dateEx[2]."/".$dateEx[1]."/".$dateEx[0];
        } else if (count($dateEx) == 2){
            # 0000-00-00 00:00:00
            $date = explode("-", $dateEx[0]);
            $date = $date[2]."/".$date[1]."/".$date[0];
            $timeEx = explode(":", $dateEx[1]);
            return $date." às ". $timeEx[0]."h".$timeEx[1];
        }
        return "";
    }
    
    public static function dateHtmlToSql($date){
        $dateEx = explode(" ", $date);
        if(count($dateEx) == 1){
            # 00/00/0000
            $dateEx = explode("/", $dateEx[0]);
            return $dateEx[2]."-".$dateEx[1]."-".$dateEx[0];
        } else if (count($dateEx) == 2){
            # 00/00/0000 00:00
            $date = explode("/", $dateEx[0]);
            $date = $date[2]."-".$date[1]."-".$date[0];
            $timeEx = explode(":", $dateEx[1]);
            return $date." ". $dateEx[1];
        }
        return "";
    }

}