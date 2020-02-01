<?php

    /**
     * Dichiarazione costanti da comparare
     */
    class Constants
    {
        function USERNAME()   { return "user"; }
        function PASSWORD()   { return "user"; }
        function USER_ID()    { return 1; }
        function TEMP_TOKEN() { return base64_encode(date("dd/mm/YY")); }
        function TOKEN()      { return md5(date("dd/mm/YY")); }
    }

    /**
     * Comparazione username e password per il rilascio di un token temporaneo
     */
    function login($username, $password){

        $const = new Constants();

        $tempToken = $const->TEMP_TOKEN();

        if($username === $const->USERNAME() && $password === $const->PASSWORD()){
            return "{\"userId\": 1, \"tempToken\": \"$tempToken\", \"esito\": true}";
        }else{
            return "{\"userId\": 0, \"tempToken\": \"\", \"esito\": false}";
        }

    }

    /**
     * Comparazione token rilasciato al login per rilascio del secondo token
     */
    function getToken($userId, $tempToken){

        $const = new Constants();

        $token = $const->TOKEN();

        if($userId ===  $const->USER_ID() && $tempToken === $const->TEMP_TOKEN()){
            return "{\"token\": \"$token\", \"esito\": true}";
        }else{
            return "{\"token\": \"\", \"esito\": false}";
        }
    }

    /**
     * Verifica del token rilasciato da "getToken" 
     */
    function checkToken($token){

        $const = new Constants();

        if($token === $const->TOKEN()){
            return "{\"esito\": true}";
        }else{
            return "{\"esito\": false}";
        }
    }

    function getConstants(){

        $const     = new Constants();
        $username  = $const->USERNAME();
        $password  = $const->PASSWORD();
        $userId    = $const->USER_ID();
        $tempToken = $const->TEMP_TOKEN();
        $token     = $const->TOKEN();

        return "{\"username\": \"$username\", \"password\": \"$password\", \"userId\": \"$userId\", \"tempToken\": \"$tempToken\", \"token\": \"$token\"}";
        
    }
?>