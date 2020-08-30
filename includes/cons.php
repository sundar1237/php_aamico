<?php
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include 'funcs/db/db.php';

define("MAIN_TITLE", "A'amico Pizza");
define("MAIN_LOGO_IMG", "logo.png");

define("SMTP_SERVER", "lx16.hoststar.hosting");
define("SMTP_PORT", "587");
define("FROM_ADDRESS", "info@saransolutions.ch");


function isItOpenHelper($targetDay,$openHour, $openMinute, $closeHour, $closeMinute){
    $day = date('d-m-Y');
    $dayString = date("D",strtotime($day));
    $isOk=false;
    if(($dayString==$targetDay)){
        //print "day ".$dayString." hour ".$hour." minute ".$minute."\n";
        $hour = intval(date('H'));
        $minute = intval(date('i'));
        if( (($hour >= $openHour  && $hour <= $closeHour))){
            //print "i m here \n";
            if (($hour == $openHour && $minute >= $openMinute)){
                $isOk=true;
            }else if ($hour == $closeHour && $minute <= $closeMinute){
                $isOk=true;
            }else if ($hour> $openHour && $hour < $closeHour){
                $isOk=true;
            }
        }
    }
    return $isOk;
}


#order hours:
function isItOpen(){
    $isOk=isItOpenHelper("Wed",11,0,23,30);
    if (!$isOk){
        $isOk=isItOpenHelper("Thu",19,13,23,30);
        if(!$isOk){
            $isOk=isItOpenHelper("Fri",11,30,24,0);
        }
    }
    //return $isOk;
    return true;
}