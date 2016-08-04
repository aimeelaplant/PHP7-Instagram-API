# PHP7-Instagram-API

This is an Instagram API for PHP 7. During the time this was being made, Instagram closed off their API, so, unfortunately, I have no plans of continuing this repo. But feel free to look around.

To install dependencies, run `composer install` (the only dependency is PHPUnit for testing).

Currently, the UserService is the only finished service class.

## Example

```
require_once 'vendor/autoload.php';

use laplant\Instagram\Clients\InstagramClient;
use laplant\Instagram\Services\UserService;
use laplant\Instagram\Config;

// initiate client
$client = new InstagramClient();
// set client id
$client->setClientId('client_id');
// set access token
$client->setAccessToken('access_token');

// inject the client through dependency injection
$userService = new UserService($client);
// get the user (returns a User model)
$user = $userService->getUser();

```

## Running Tests

In the CLI, run the following command: `vendor/bin/phpunit --configuration tests/phpunit.xml` (tests are obviously not complete either).
