<?php

function isCalendarPast():bool{
    if (isset($_GET["type"]) && $_GET["type"] == "Past") {
        return true;
    } else {
        return false;
    }
}
