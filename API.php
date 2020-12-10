<?php


class API
{

    function execute($url, $method, $data = null, $header = array()) {

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if ($data != null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //    curl_setopt($ch, CURLOPT_USERPWD, ONLINEFACT_USERNAME.":".ONLINEFACT_PASSWORD);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        $result = curl_exec($ch);

        if ($result === FALSE) {
            if($_SERVER["HTTP_X_FORWARDED_FOR"] == '77.166.166.109'){
                die(curl_error($ch));
            }
        }
        return json_decode($result, TRUE);
    }

}