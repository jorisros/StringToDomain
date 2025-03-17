# Convert string to subdomain compatible string
Because I needed a library to convert company names to subdomain compatible strings
## Use the package
Add the library to your project
```
composer require jorisros/convert-string-to-domain
```
Use in your code as followed
```
<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use JorisRos\ConvertStringToDomain\ConvertStringToDomain;

$companyName = "Company Name";

$subdomain = ConvertStringToDomain::convert($companyName);

// Gives back "companyname"
vardump($subdomain);

```
## Checkout the project locally
```
git clone git@github.com:jorisros/StringToDomain.git string-to-domain && cd string-to-domain
```
Install the vendors
```
composer install
```
And run the tests
```
./vendor/bin/phpunit tests
```
Please commit your improvements 
