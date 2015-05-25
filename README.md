#AccessLog (v0.0.*)
Log [PSR-7](http://www.php-fig.org/psr/psr-7/) http messages using a [PSR-3](http://www.php-fig.org/psr/psr-3/) logger instance following [apache2 access log](https://httpd.apache.org/docs/2.4/logs.html#accesslog) format.

[![Build Status](https://api.travis-ci.org/websoftwares/accessLog.png)](https://travis-ci.org/websoftwares/accessLog)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/websoftwares/accessLog/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/websoftwares/accessLog/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/websoftwares/accessLog/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/websoftwares/accessLog/?branch=master)

## Installing via Composer (recommended)

Install composer in your project:
```
curl -s http://getcomposer.org/installer | php
```

Create a composer.json file in your project root:
```php
{
    "require": {
		"websoftwares/access-log": ~0.0.1"
    }
}
```

Install via composer
```
php composer.phar install
```

## Usage
Basic usage of the `Websoftwares\AccessLog\Log` class.

```php
use Websoftwares\AccessLog\LogFormatFactory;
use Websoftwares\AccessLog\Log;

// $logger instance of Psr\Log\LoggerInterface;
$format = (new LogFormatFactory)->commonLog();
$accessLog = new Log($logger, $format);

// $request instance of Psr\Http\Message\ServerRequestInterface
// $response instance of Psr\Http\Message\ResponseInterface

$accessLog($request, $response);

```

## Changelog
- v0.0.1: Initial import

## Testing
In the tests folder u can find several tests.

## License
The [MIT](http://opensource.org/licenses/MIT "MIT") License (MIT).
