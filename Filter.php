<?php

/**
 * @package Class Filter
 * @author Hax0rlib | IRDeNial
 * @version 0.1.3
 */

namespace Config;


    class Filter
    {

        /**
         * Função para validar ataques XSS.
         * 
         * @param $val
         * @return string
         */
        public static function XSSFilter($val)
        {
            return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
        }

        /**
         * Função para validar Email.
         *
         * @param $val
         * @return bool
         */
        public static function EmailValidate($val)
        {
            return (bool)filter_var($val, FILTER_VALIDATE_EMAIL);
        }

        /**
         * Função para validar endereço IP.
         *
         * @param $val
         * @param $flags
         * @return bool
         */
        public static function IPValidate($val, $flags)
        {
            $flgs = 0;
            switch ($flags) {
                case $flags['ipv4']:
                    $flgs |= FILTER_FLAG_IPV4;
                    break;
                case $flags['ipv6']:
                    $flgs |= FILTER_FLAG_IPV6;
                    break;
                case $flags['private']:
                    $flgs |= FILTER_FLAG_NO_PRIV_RANGE;
                    break;
                case $flags['reserved']:
                    $flgs |= FILTER_FLAG_NO_RES_RANGE;
                    break;
            }
            return (bool)filter_var($val, FILTER_VALIDATE_IP, $flgs);
        }

}
