## phpEmailValidator
Complete email validation, can run as PHP library or HTTP services

### How it works

The validation run on following steps, if one step fail, the next step will not be checked so it will be faster:
 1. Syntax check
 2. DNS (MX record) lookup 
 3. SMTP account check

### Requirement
 * PHP 5.3 or later
 * Composer

### Installation
Add to your composer.json:
```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/back2arie/phpEmailValidator"
        }
    ],
    "require": {
        "back2arie/phpemailvalidator": "dev-master"
    }
}
````
Run ```composer install``` 

### Usage (as PHP library)
```php
<?php
use phpEmailValidator\phpEmailValidator as phpEmailValidator;

$phpEmailValidator = new phpEmailValidator;
$email = 'example@domain.com';

if($phpEmailValidator->validate($email)) {
    echo 'Valid';
} else {
    echo 'Not Valid';
}
```

### Usage (as HTTP Service)
Visit URL:

```
http://url/phpemailvalidator/example@domain.com
```

Or:

```
http://url/phpemailvalidator/index.php?q=example@domain.com
```

Will display:
```
{
    "address": "example@domain.com",
    "is_valid": false,
    "reason": "Cannot find SMTP account for example@domain.com"
}
```

### Online demo
http://azhari.harahap.us/phpemailvalidator/demo
