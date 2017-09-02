<?php 
// forbindelse til mySQL serveren ved brug af mysqli metode
// 1. Variabler (konstanter) til forbindelsen
const HOSTNAME = 'carolineheideskov.dk.mysql'; // server
const MYSQLUSER = 'carolineheideskov_dk'; // superbruger
const MYSQLPASS = '3j3K8wSZ'; // password
const MYSQLDB = 'carolineheideskov_dk'; // database navn
// 2. Forbindelsen via mysqli metoden
$con = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
// at sikre sig, at alle utf8-tegn kan blive brugt under forbindelsen
$con->set_charset ('utf8');
// 3. Tjek
// hvis der er fejl i forbindelsen
if($con->connect_error){
	die($con->connect_error);
// hvis der er hul i gennem
}
// PHP slut tag kan undlades, hvis filen indeholder "rent" PHP