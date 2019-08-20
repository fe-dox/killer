<?php
/**
 *     Plik leaderboard.php jest częścią projektu Killer System - Prostego narzędzia do prowadzenia gry w killera
 *     Kod źródłowy: https://bitbucket.org/fedox8/boom-killer/src
 *     Copyright (C) 20/08/2019, 20:42  Mikołaj Bogucki, Jeremiasz Mazur, Anna Basiura
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

$json = file_get_contents("data.json");
$data = json_decode($json, true);
foreach ($data as $key => $player){
    $tmp["name"] = $player["name"];
    $tmp["killCount"] = $player["killCount"];
    $result[] = $tmp;
}
shuffle($result);
echo json_encode($result);
