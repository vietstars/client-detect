ClientDetect
=====

Installation
------------

Install using composer:

```bash
composer require vietstars/client-detect
```

Laravel (optional)
------------------

Add the service provider in `config/app.php`:

```php
Vietstars\ClientDetect\ClientServiceProvider::class,
```

And add the Client alias to `config/app.php`:

```php
'client' => Vietstars\ClientDetect\Facades\Client::class,
```

Basic Usage
-----------

Start by creating an `Client` instance (or use the `Client` Facade if you are using Laravel):

```php
use Vietstars\ClientDetect\Client;

$client = new Client();
```

If you want to parse user agents other than the current request in CLI scripts for example, you can use the `setUserAgent` and `setHttpHeaders` methods:

```php
$client->setUserAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.13+ (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2');
$client->setHttpHeaders($headers);
```

All of the original [Mobile Detect](https://github.com/serbanghita/Mobile-Detect) methods are still available, check out some original examples at https://github.com/serbanghita/Mobile-Detect/wiki/Code-examples

### Is?

Check for a certain property in the user agent.

```php
$client->is('Windows');
$client->is('Firefox');
$client->is('iPhone');
$client->is('OS X');
```

### Magic is-method

Magic method that does the same as the previous `is()` method:

```php
$client->isAndroidOS();
$client->isNexus();
$client->isSafari();
```

### Mobile detection

Check for mobile device:

```php
$client->isMobile();
$client->isTablet();
```

### Match user agent

Search the user agent with a regular expression:

```php
$client->match('regexp');
```

Additional Functionality
------------------------

### Accept languages

Get the browser's accept languages. Example:

```php
$languages = $client->languages();
// ['nl-nl', 'nl', 'en-us', 'en']
```

### Device name

Get the device name, if mobile. (iPhone, Nexus, AsusTablet, ...)

```php
$device = $client->device();
```

### Operating system name

Get the operating system. (Ubuntu, Windows, OS X, ...)

```php
$platform = $client->platform();
```

### Browser name

Get the browser name. (Chrome, IE, Safari, Firefox, ...)

```php
$browser = $client->browser();
```

### Desktop detection

Check if the user is using a desktop device.

```php
$client->isDesktop();
```

*This checks if a user is not a mobile device, tablet or robot.*

### Phone detection

Check if the user is using a phone device.

```php
$client->isPhone();
```

### Robot detection

Check if the user is a robot. This uses [jaybizzle/crawler-detect](https://github.com/JayBizzle/Crawler-Detect) to do the actual robot detection.

```php
$client->isRobot();
```

### Robot name

Get the robot name.

```php
$robot = $client->robot();
```

### Browser/platform version

MobileDetect recently added a `version` method that can get the version number for components. To get the browser or platform version you can use:

```php
$browser = $client->browser();
$version = $client->version($browser);

$platform = $client->platform();
$version = $client->version($platform);
```

*Note, the version method is still in beta, so it might not return the correct result.*
