# xFilter

Filter to validate input to applications.

## Methods

** XSSFilter **
```
Variables:
    $val: A raw string possibly containing HTML that needs to be filtered.
Return:
    A string containing valid HTML entities for any possible HTML code.
Use:
    Filter::XSSFilter($val);
```

** EmailValidate **
```
Variables:
    $val: A raw string possibly containing an email that needs to be validated.
Return:
    True or false, depending on if input is a valid email address.
Use:
    Filter::EmailValidate($val);
```

** IPValidate **
```
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
```

## Implementation

** XSSFilter **
```
<?php 
    require_once("Filter.php");

    var_dump(Filter::XSSFilter('This is "a"<br>Test'));
    echo(Filter::XSSFilter('This is "a"<br>Test'));
?>
```
The above example will output:
```
string 'This is &quot;a&quot;&lt;br&gt;Test' (length=35)
This is "a"<br>Test
```

** EmailValidate **
```
<?php 
    require_once("Filter.php");

    $emailAddress = array(
        'example@example.com', // A valid email
        'badexample@example' // An invalid email
    );
    foreach($emailAddress as $email) {
        var_dump(Filter::EmailValidate($email));
    }
?>
```
The above example will output:
```
boolean true
boolean false
```

** IPValidate **
```
<?php 
    require_once("Filter.php");

    $ipAddresses = array(
        $_SERVER['REMOTE_ADDR'], // A valid IP
        '123.asdf.qq.12' // An invalid IP
    );
    $options = array(
        'ipv4' => true,
        'ipv6' => true,
        'private' => true,
        'reserved' => true,
    );
    foreach($ipAddresses as $ip) {
        var_dump(Filter::IPValidate($ip,$options));
    }
?>
```
The above example will output:
```
boolean true
boolean false
```

## Changelog
** 0.1.1 **
* Initial version

** 0.1.2 **
* Fix bugs
* Standardized return types according to function implementation
* Added documentation

## Contributors

[hax0rlib](https://github.com/hax0rlib), [IRDeNial](https://github.com/IRDeNial)

Documentation written by [IRDeNial](https://github.com/IRDeNial).