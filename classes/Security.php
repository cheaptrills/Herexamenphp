<?php

    class Security{
        public static function hash($password){
            $options = [
                'cost' => 12
            ];
            $hash = password_hash($password, PASSWORD_BCRYPT, $options);
            return $hash;
        }
    }