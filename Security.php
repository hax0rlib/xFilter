<?php

/**
 * @package Class\Security
 * @author Hax0rlib | IRDeNial
 * @version 0.1.5
 */

    class Security
    {

        /**
         * Função para filtrar ataques XSS.
         * 
         * @param string $val
         * @return string
         *
         **/
        public static function XSSFilter(&$val) : string
        {
            if (is_string($val)) {

                $val = htmlspecialchars($val, ENT_QUOTES);

            } elseif (is_array($val) || is_object($val)) {

                    foreach ($val as &$valueInValue) {

                        self::XSSFilter($valueInValue);
                    }
            }

            return $val;
        }

        /**
         * Função para validar Email.
         *
         * @param string $val
         * @return bool
         *
         **/
        public static function EmailValidate(string $val) : bool
        {
            return (bool)filter_var($val, FILTER_VALIDATE_EMAIL);
        }

        /**
         * Função para validar endereço IP.
         *
         * @param int $val
         * @param int $flags
         * @return bool
         *
         **/
        public static function IPValidate(int $val, int $flags) : bool
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

        /**
        * Função para setar permissões em diretórios
        *
        * @param string $pathName
        * @param int $perm
        *
        **/
        public static function setDirPerm(string $folder, int $perm)
        {
            return (!is_dir($folder) ? mkdir($folder, $perm) : rmdir($folder));
        }

        /**
        * A função escape acrescenta barra para evitar a execução de comandos
        * 
        * @param string $val
        *
        **/
        public static function CMDEscape(string $val)
        {
            return escapeshellcmd($val);
        }

}
