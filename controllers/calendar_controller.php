<?php

require_once("../classes/calendar_class.php");

   //method to insert appointment
    function insertAppointment($appo,$cid, $sid){
        $calendar_instance = new Calendar();
        return $calendar_instance->addAppointment($appo, $cid, $sid);
    }

?>