# Kalória kalkulátor

## Használati útmutató
A program futtatásához a `XAMPP` applikáció `7.4.11` verziója szükséges!

A `XAMPP` applikációban a `MYSQL` elindítására szükségünk van.
Ezután a program megfelelő mükődéséhez létre kell hozni a `phpMyAdmin` felületén az adatbázist `kaloria_kalkulator` néven, `utf8_hungarian_ci` kódolással.
Ez a `phpMyAdmin`-ban elérhető a `XAMPP` applikációban az `Admin` fülre kattintva.

Majd a szükséges táblákat SQL script importálásával tudjuk létrehozni:
https://github.com/SzBarbi97/kaloria_kalkulator/blob/main/kaloria_kalkulator.sql

Az applikáció elindítása előtt a `XAMPP` mappáján belül a `htdocs` mappába szükséges másolni a project mappáját.

Az applikáció indításához szükséges még az `apache HTTP szerver` elindítása, ami szintén a `XAMPP` programban indítható el, ezt követően a weboldal a következő elérési útvonalon érhető el:
`http://localhost/kaloria_kalkulator/index.php`