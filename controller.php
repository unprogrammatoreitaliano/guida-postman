<?php

//messaggio di default da restituire in caso di metodo non trovato
$output = '{ "esito": false, "descrizione": "metodo non presente"}';

//test di visibilità
$output = isset($_GET['testvisibilita']) ? $_GET['messaggio']                              : $output;

//metodo login
$output = isset($_GET['login'])          ? login($_POST['username'], $_POST['password'])   : $output;

//metodo gettoken
$output = isset($_GET['gettoken'])       ? getToken($_POST['userId'], $_POST['tempToken']) : $output;

//metodo getconstants
$output = isset($_GET['getconstants'])   ? getConstants()                                  : $output;

//metodo checktoken
$output = isset($_GET['checktoken'])     ? checkToken($_POST['token'])                     : $output;

//output
echo $output;

?>