<?php
/**
 *     Plik kill.php jest częścią projektu Killer System - Prostego narzędzia do prowadzenia gry w killera
 *     Kod źródłowy: https://bitbucket.org/fedox8/boom-killer/src
 *     Copyright (C) 15/08/2019, 21:31  Mikołaj Bogucki, Jeremiasz Mazur, Anna Basiura
 *
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with this file.  If not, see https://www.gnu.org/licenses/.
 */

$code = $_GET["code"];
$target = $_GET["target"];

$json = file_get_contents("data.json");
$json_data = json_decode($json,true);

$player = $json_data[$code];
if($player == null){
    echo "{\"name\":false}";
}else if($player["killCode"] == $target){
    $target_player = $json_data[$target];
    $player["killCode"] = $target_player["killCode"];
    $player["kill"] = $target_player["kill"];
    ++$player["killCount"];
    $target_player["kill"] = false;
    $target_player["killCode"] = false;
    $target_player["code"] = false;
    $target_player["killCount"] = 0;
    $target_player["isDead"] = false;
    $target_player["killer"] = $player["name"];
    $json_data[$target] = $target_player;
    $json_data[$code] = $player;
    $jsonString = json_encode($json_data);
    file_put_contents("data.json", $jsonString);
    $json = file_get_contents("killed.json");
    $json_data = json_decode($json,true);
    $json_data[] = $target_player;
    $jsonString = json_encode($json_data);
    file_put_contents("killed.json", $jsonString);
    echo "{\"name\":true}";

}else{
    echo "{\"name\":false}";
}
