TrapSmtp
========

Extend Network/Email/SmtpTransport allowing override original recipients.

Install
-------

Copy content of Lib folder into your app/Lib.
Or add it into your project as a git submodule.

Usage
-----
Add to your email config array on app/Config/email.php a new element 'realRecipients', and spec 'TrapSmpt' for 'transport'.
```php
public $default = array(
		'transport' => 'TrapSmtp',  // For plugin install use 'TrapSmtp.TrapSmtp'
		...
		'realRecipients' => 'trap@domain.com',
	);
```

After ```$email->send()``` you will get an email in trap@domain.com with original recipients in the header as below:
* X-intended-to
* X-intended-cc
* X-intended-bcc
