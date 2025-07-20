<?php
function calculateAge($birthDate, $referenceDate, $lang = 'fr')
{


    $interval = $referenceDate->diff($birthDate);
    $years = $interval->y;
    $months = $interval->m;
    $days = $interval->d;

    $lang_days = array('en' => 'days', 'fr' => 'jours', 'he' => 'ימים', 'pt' => 'dias');
    $lang_months = array('en' => 'months', 'fr' => 'mois', 'he' => 'חודשים', 'pt' => 'meses');
    $lang_years = array('en' => 'years', 'fr' => 'ans', 'he' => 'שנים', 'pt' => 'anos');
    $lang_conj = array('en' => 'and', 'fr' => 'et', 'he' => '|', 'pt' => 'e');

    $days_l = $lang_days[$lang];
    $months_l = $lang_months[$lang];
    $years_l = $lang_years[$lang];
    $conj = $lang_conj[$lang];


    if ($years > 0 && $months > 0 && $days > 0) {
        return "$years $years_l, $months $months_l $conj $days $days_l";
    } elseif ($years > 0 && $months > 0) {
        return "$years $years_l $conj $months $months_l";
    } elseif ($years > 0 && $days > 0) {
        return "$years $years_l $conj $days $days_l";
    } elseif ($months > 0 && $days > 0) {
        return "$months $months_l $conj $days $days_l";
    } elseif ($years > 0) {
        return "$years $years_l";
    } elseif ($months > 0) {
        return "$months $months_l";
    } else {
        return "$days $days_l";
    }
}

//get the date in the right format DD-MM-YYYY
function getTheDate($date)
{
    $date = explode("-", $date);
    $date = array_reverse($date);
    $date = implode("-", $date);
    $date = new DateTime($date);
    return $date;
}


function getDeathAge($fromDate = '13-03-1932', $toDate = '22-02-2025')
{
    $birthDate = getTheDate($fromDate);
    $deathDate = getTheDate($toDate);
    $agelive = $deathDate->diff($birthDate);
    $agelive = $agelive->format('%y');

    return $agelive;
}

function getDaysSinceDeath($fromDate = '22-02-2025')
{
    $deathDate = getTheDate($fromDate);
    $today = new DateTime();
    $daysMonthSinceDeath = $deathDate->diff($today);
    $daysMonthSinceDeath = $daysMonthSinceDeath->format('%d');
    return $daysMonthSinceDeath;
}


function getH2($birthDate, $deathDate, $lang = 'fr')
{
    $age = calculateAge($birthDate, $deathDate, $lang);
    if ($lang == 'fr') {
        return "<h2>Said Nafisspour (Shmouel ben Galine et Asher 13 mars 1932 - 22 février 2025 ($age)</h2>";
    } elseif ($lang == 'he') {
        return "<h2>סעיד נפיספור (שמואל בן גלינה ואשר 13 במרץ 1932 - 22 בפברואר 2025 ($age)</h2>";
    } elseif ($lang == 'pt') {
        return "<h2>Said Nafisspour (Shmouel ben Galine et Asher 13 de março de 1932 - 22 de fevereiro de 2025 ($age)</h2>";
    } elseif ($lang == 'en') {
        return "<h2>Said Nafisspour (Shmouel ben Galine et Asher 13 March 1932 - 22 February 2025 ($age)</h2>";
    } else {
        return "<h2>Said Nafisspour (Shmouel ben Galine et Asher 13 mars 1932 - 22 février 2025 ($age)</h2>";
    }
}

function getH1($lang = 'fr')
{
    if ($lang == 'fr') {
        return "<h1>Hommage à mon père</h1>";
    } elseif ($lang == 'he') {
        return "<h1>כבוד לאבא שלי</h1>";
    } elseif ($lang == 'pt') {
        return "<h1>Homenagem ao meu pai</h1>";
    } elseif ($lang == 'en') {
        return "<h1>Tribute to my father</h1>";
    } else {
        return "<h1>Hommage à mon père</h1>";
    }
}

function getH3($birthDate, $deathDate, $lang = 'fr')
{
    $age = calculateAge($birthDate, $deathDate, $lang);
    $heb=' ('.getHebrewDate().')';

    if ($lang == 'fr') {
        return "<h3> 13 mars 1932 - 22 février 2025 $heb ($age)</h3>";
    } elseif ($lang == 'he') {
        return "<h3> 13 במרץ 1932 - 22 בפברואר 2025 ($age)</h3>";
    } elseif ($lang == 'pt') {
        return "<h3> 13 de março de 1932 - 22 de fevereiro de 2025 $heb ($age)</h3>";
    } elseif ($lang == 'en') {
        return "<h3> 13 March 1932 - 22 February 2025 $heb ($age)</h3>";
    } else {
        return "<h3> 13 mars 1932 - 22 février 2025 $heb ($age)</h3>";
    }
}



function getH4($deathDate, $lang = 'fr')
{
    $today = new DateTime();
// convert $deathDate 22-02-25 dd-mm-yyyy    to datetime object
//    $deathDate = getTheDate($deathDate);


    $daysMonthSinceDeath = $deathDate->diff($today);
//    $daysMonthSinceDeath = $daysMonthSinceDeath->format('%d');
    $daysMonthSinceDeath = $daysMonthSinceDeath->format('%a');

    //how can you convert


    if ($lang == 'fr') {
        return "<h4>Il est décédé il y a $daysMonthSinceDeath jours</h4>";
    } elseif ($lang == 'he') {
        return "<h4>הוא מת לפני $daysMonthSinceDeath ימים</h4>";
    } elseif ($lang == 'pt') {
        return "<h4>Ele faleceu há $daysMonthSinceDeath dias</h4>";
    } elseif ($lang == 'en') {
        return "<h4>He passed away $daysMonthSinceDeath days ago</h4>";
    } else {
        return "<h4>Il est décédé il y a $daysMonthSinceDeath jours</h4>";
    }

}

function getHebrewDate()
{
return '24 shevat 5785';
}


$birthDate = getTheDate('13-03-1932');
$deathDate = getTheDate('22-02-2025');

$today = new DateTime();
$agelive = getDeathAge('13-03-1932', '22-02-2025');


$age = calculateAge($birthDate, $deathDate, $lang);


$h1 = getH1($lang);
$h2 = '';//getH2($birthDate, $deathDate, $lang);
$h3 = getH3($birthDate, $deathDate, $lang);
$h4 = getH4($deathDate, $lang);

$deathDateHebrew = $deathDate->format('d-m-Y');









