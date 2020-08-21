<?php
/*
 *     Plik shuffle.php jest częścią projektu Killer System - Prostego narzędzia do prowadzenia gry w killera
 *     Kod źródłowy: https://bitbucket.org/fedox8/boom-killer/src
 *     Copyright (C) 21/08/2020, 12:03  Mikołaj Bogucki, Jeremiasz Mazur, Anna Basiura
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

include "Backup.php";

$ENTRY_CODE = "SecretCode";
if ($ENTRY_CODE !== $_GET["SecretCode"]) {
    http_response_code("403");
} else {
    backup("shuffle");
    $json = file_get_contents("data.json");
    $json_data = json_decode($json, true);
    $alive_players = [];
    $other_players = [];
    foreach ($json_data as $player) {
        if ($player["isDead"] == true || $player["code"] == $player["killCode"]) {
            $other_players[$player["code"]] = $player;
            continue;
        }
        $alive_players[$player["code"]] = $player;
    }
    shuffle($alive_players);
    for ($i = 0; $i < sizeof($alive_players); $i++) {
        if ($i === sizeof($alive_players) - 1) {
            $alive_players[$i]["kill"] = $alive_players[0]["name"];
            $alive_players[$i]["killCode"] = $alive_players[1]["code"];
        } else {
            $alive_players[$i]["kill"] = $alive_players[$i + 1]["name"];
            $alive_players[$i]["killCode"] = $alive_players[$i + 1]["code"];
        }
    }
    $tmp_array = array_merge($alive_players, $other_players);
    $result_array = [];
    foreach ($tmp_array as $player){
        $result_array[$player["code"]] = $player;
    }
    file_put_contents("data.json", json_encode($result_array));

}


