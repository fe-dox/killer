/*
 *     Plik app.js jest częścią projektu Killer System - Prostego narzędzia do prowadzenia gry w killera
 *     Kod źródłowy: https://bitbucket.org/fedox8/boom-killer/src
 *     Copyright (C) 16/08/2019, 15:38  Mikołaj Bogucki, Jeremiasz Mazur, Anna Basiura
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

const fs = require('fs');
const csv = require('csv-parse/lib/sync');
const md5 = require('md5');

function shuffle(array) {
    let currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }
    return array;
}

const raw = fs.readFileSync('./killer.csv', 'UTF-8');
let tmp = csv(raw, {ltrim: true});
let players =[];
tmp.shift();
tmp.forEach(o=> players.push({name: o[0]}));
players = shuffle(players);
const htmlStream = fs.createWriteStream('./list.html');
const printStream = fs.createWriteStream('./print.html');
htmlStream.write('<html lang="pl"><head><meta charset="utf-8"></head><body><table><thead><tr><td>GRACZ</td><td>ZLECENIE</td></tr></thead>');
printStream.write('<html lang="pl"><head><meta charset="utf-8"></head><body><table><thead><tr><td>GRACZ</td><td>KOD</td></tr></thead>');
for (let i = 0; i < players.length; i++) {
    players[i] = {
        name: players[i].name,
        killCount: 0,
        kill: i === players.length - 1 ? players[0].name : players[i + 1].name,
        code: md5(Date.now() + Math.random()).slice(-8),
    };
    htmlStream.write(`<tr><td>${players[i].name}</td><td>${players[i].kill}</td></tr>`);
}
let explayers = {};
for (let i = 0; i < players.length; i++) {
    let player = players[i];
    player.killCode = i === players.length - 1 ? players[0].code : players[i + 1].code;
    explayers[player.code] = player;
}
console.log(explayers);

fs.writeFileSync('./data.json', JSON.stringify(explayers), {encoding: 'utf-8'});
shuffle(players);
for (let i = 0; i < players.length; i++) {
    printStream.write(`<tr><td>${players[i].name}</td><td>${players[i].code}</td></tr>`);
}
htmlStream.write('</table></body></html>');
printStream.write('</table></body></html>');
htmlStream.close();
printStream.close();

