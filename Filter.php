<?php

/**
* @package Class Filter
* @author Hax0rlib | IRDeNial
* @version 0.1.2
*/

class Filter
{
    /* 
        XSSFilter($val)
        Variables:
            $val: A raw string possibly containing HTML that needs to be filtered.
        Return:
            A string containing valid HTML entities for any possible HTML code.
        Use:
            Filter::XSSFilter($val);
    */
    public static function XSSFilter($val)
    {
        return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
    }

    /* 
        EmailValidate($val)
        Variables:
            $val: A raw string possibly containing an email that needs to be validated.
        Return:
            True or false, depending on if input is a valid email address.
        Use:
            Filter::EmailValidate($val);
    */
    public static function EmailValidate($val)
    {
        return (bool)filter_var($val, FILTER_VALIDATE_EMAIL);
    }

    /* 
        IPValidate($val,$flags)
        Variables:
            $val: A raw string possibly containing an IP address that needs to be validated.
            $flags: An array used to check what type of validation needs to occur.
                Valid array indexes for flags:
                    'ipv4' => true/false
                    'ipv6' => true/false
                    'private' => true/false
                    'reserved' => true/false
        Return:
            True or false, depending on if input is a valid IP address.
        Use:
            Filter::IPValidate($val,$flags);
    */
    public static function IPValidate($val,$flags)
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
