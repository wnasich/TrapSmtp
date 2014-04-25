trapemail
=========

Extend Network/Email/CakeEmail allowing override original recipients

Install
-------

Copy content of Lib folder into your app/Lib.

Usage
-----
Whenever you need to send email, ensure this class is loaded:
```php
App::uses('TrapEmail', 'Lib/Network/Email');
```

add to your config array a new element 'realRecipients': 
```php
$config['realRecipients'] = array('trap@domain.com');
```
use $config to create a new TrapEmail object:
```php
$email = new TrapEmail($config);
```

after ```$email->send()``` you will get an email in trap@domain.com with original recipients in the header as below:
* X-intended-to
* X-intended-cc
* X-intended-bcc
