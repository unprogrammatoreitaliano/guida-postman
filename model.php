<?php

    /**
     * Dichiarazione costanti da comparare
     */
        function USERNAME()   { return "user"; }
        function PASSWORD()   { return "user"; }
        function USER_ID()    { return 1; }
        function TEMP_TOKEN() { return base64_encode(date("dd/mm/YY")); }
        function TOKEN()      { return md5(date("dd/mm/YY")); }

    /**
     * Comparazione username e password per il rilascio di un token temporaneo
     */
    function login($username, $password){

        $tempToken = TEMP_TOKEN();

        if($username === USERNAME() && $password === PASSWORD()){
            return "{\"userId\": 1, \"tempToken\": \"$tempToken\", \"esito\": true}";
        }else{
            return "{\"userId\": 0, \"tempToken\": \"\", \"esito\": false}";
        }

    }

    /**
     * Comparazione token rilasciato al login per rilascio del secondo token
     */
    function getToken($userId, $tempToken){

        $token = TOKEN();

        if($userId ===  USER_ID() && $tempToken === TEMP_TOKEN()){
            return "{\"token\": \"$token\", \"esito\": true}";
        }else{
            return "{\"token\": \"\", \"esito\": false}";
        }
    }

    /**
     * Verifica del token rilasciato da "getToken" 
     */
    function checkToken($token){

        if($token === TOKEN()){
            return "{\"esito\": true}";
        }else{
            return "{\"esito\": false}";
        }
    }

    function getConstants(){

        $username  = USERNAME();
        $password  = PASSWORD();
        $userId    = USER_ID();
        $tempToken = TEMP_TOKEN();
        $token     = TOKEN();

        return "{\"username\": \"$username\", \"password\": \"$password\", \"userId\": \"$userId\", \"tempToken\": \"$tempToken\", \"token\": \"$token\"}";
        
    }
?>