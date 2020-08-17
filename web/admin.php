<?php
/*
 *     Plik admin.php jest częścią projektu Killer System - Prostego narzędzia do prowadzenia gry w killera
 *     Kod źródłowy: https://bitbucket.org/fedox8/boom-killer/src
 *     Copyright (C) 17/08/2020, 17:12  Mikołaj Bogucki, Jeremiasz Mazur, Anna Basiura
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

$PASSWORD = "Twoje Pasło";
$IS_ACTIVE = true;
$entered_password = $_GET["password"];

$inData = $_POST["data"];

if (!$IS_ACTIVE) {
    http_response_code(404);
} else {
    if ($entered_password != $PASSWORD) {
        http_response_code(403);
    } else {
        if (empty($inData)) {
            $json = file_get_contents("data.json");
            $data = json_decode($json, true);
            echo json_encode($data);
        } else {
            $data = json_decode($inData);
            $jsonString = json_encode($data);
            file_put_contents("data.json", $jsonString);
            echo true;
        }
    }
}
