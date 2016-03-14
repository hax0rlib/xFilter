<?php

/**
 * @package Class Filter
 * @author Hax0rlib
 * @version 0.1.1
 */

class Filter
{

    /**
     * @var messages all messages of function EmailFilter
     */
    private static $messages = array();


    public static function XSSFilter()
    {

        if (is_string($value)) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

        }

        return $value;
    }

    public static function EmailFilter($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $messages[0] = "Email Valido!";
            print($this->$messages[0]);

        }else {
           $messages[1] = "Email Invalido";
           print($this->$messages[1]);

        }
        return;

    }

    public static function IPFilter($var)
    {

        $ipFilterOptions = array(
          'ipv4' => true,
          'ipv6' => true,
          'private' => true,
          'reserved' => true,
          );

        $flags = 0;
        switch ($ipFilterOptions) {
          case $ipFilterOptions['ipv4']:
            $flags |= FILTER_FLAG_IPV4;
            break;

          case $ipFilterOptions['ipv6']:
            $flags |= FILTER_FLAG_IPV6;
            break;

          case $ipFilterOptions['private']:
            $flags |= FILTER_FLAG_NO_PRIV_RANGE;
            break;

          case $ipFilterOptions['reserved']:
            $flags |= FILTER_FLAG_NO_RES_RANGE;
            break;

          return filter_var($var, FILTER_VALIDATE_IP, $flags);
        }

    }
}
