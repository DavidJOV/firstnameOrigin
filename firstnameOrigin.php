<?php

function getData()
{
    $json = file_get_contents('./names/names.min.json', true, null, 0, 14000000);
    $json = json_decode($json, true);
    if (!$json) {

        return false;
    } else {
        return $json;
    }
}
function getName($firstname)
{
    $names = getData();
    if (!$names) {
        echo "ERROR LOADING JSON";
        return false;
    } else {
        foreach ($names as $key => $name) {
            if ($name['name'] === $firstname) {
                $temp = $name;
                break;
            }

        }
    }
    if (isset($name)) {
        return $name;
    } else {
        return false;
    }

}

function sortCountrys($countrys){
    foreach($countrys as $key => $country){
        $countrys[$key] = $country ." ".$key;
    }
    sort($countrys,SORT_STRING);
    foreach($countrys as $key => $country){
        if(substr($country,0,1)==" " || substr($country,0,1)=="$")
        {
            unset($countrys[$key]);
        }
    }
    var_dump($countrys);
    return $countrys;
}

function getMostCommonCountry($countrys){
$countrys = sortCountrys($countrys);
$mostCommon =substr($countrys[56],2);
$mostCommon = getCountryName($mostCommon);
return $mostCommon;

}
function getCountryName($int){
    $countryNames = ['Great Britain','Ireland','USA','Italy','Malta','Portugal','Spain','France','Belgium','Luxembourg','Netherlands','East Frisia','Germany','Austria','Swiss','Iceland','Denmark','Norway','Sweden','Finland','Estonia','Latvia','Lithuania','Poland','Czech Republic','Slovakia','Hungary','Romania','Bulgaria','Bosinia and Herzegovina','Croatia','Kosovo','Macedonia','Montenegro','Serbia','Slovenia','Albania','Greece','Russia','Belarus','Moldova','Ukraine','Armenia','Azerbaijan','Georgia','Kazakhstan/Uzbekistan','Turkey','Arabia','Israel','China','India/Sri Lanka','Japan,Korea','Vietnam','other countries','offset','END_OF_DATASET'];
    foreach($countryNames as $key => $name){
        if($key == $int){return $name;}
    }
    return false;
}
$name = getName("David");
$countrys = getMostCommonCountry($name['countrys']);//sortCountrys($name["countrys"]);
var_dump($countrys);
