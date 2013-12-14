laravel-mailgun
===============

This is just a wrapper for the class by [Mailgun](https://github.com/mailgun/mailgun-php) themselves for easy use in Laravel 4.1 (Yes this requires 4.1 to use). It provides a service provider and a Facade so you can do the following:

```php
Mailgun::sendMessage(Config::get('mailgun.domain'), $message);
```

Instead of the ugly way:

```php
$mailgun = new Mailgun(Config::get('mailgun.api_key'));
$mailgun->sendMessage(Config::get('mailgun.domain'), $message);
```

That doesn't follow the beauty of Laravel's static like classes, no way!

## Installation
First you need to add this to your `composer.json` file. `"killswitch/laravel-mailgun": "dev-master"` Then you need to `composer update` to bring it in... Once that's done, just add `Killswitch\LaravelMailgun\LaravelMailgunServiceProvider` to your `config/app.php` file under `providers`

After that you need to create a config file in `app/config` named `mailgun.php` with the following in it:

```php
return array(
	'api_key' => 'your-api-key-here',
	'domain' => 'mailgun-domain-to-send-from'
);
```