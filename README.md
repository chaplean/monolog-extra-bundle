# monolog-extra-bundle

[![Build Status](https://travis-ci.org/chaplean/monolog-extra-bundle.svg?branch=master)](https://travis-ci.org/chaplean/monolog-extra-bundle)
[![Coverage Status](https://coveralls.io/repos/github/chaplean/monolog-extra-bundle/badge.svg?branch=master)](https://coveralls.io/github/chaplean/monolog-extra-bundle?branch=master)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/chaplean/monolog-extra-bundle/issues)

This bundle adds support for extra fields for symfony/monolog-bundle (>= 3.0).

## Table of content

* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)
* [Versioning](#versioning)
* [Contributing](#contributing)
* [Hacking](#hacking)
* [License](#license)

## Installation

This bundle requires at least Symfony 3.0.

You can use [composer](https://getcomposer.org) to install monolog-extra-bundle:
```bash
composer require chaplean/monolog-extra-bundle
```

Then add to your AppKernel.php:

```php
new Chaplean\Bundle\MonologExtraBundle\ChapleanMonologExtraBundle(),
```

## Configuration

Optionally if you want to add global extra fields.

services.yml:
```yaml
services:
    your_service_name:
        class: Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor
        arguments:
            $globalExtraFields:
                key : 'value'
                key2 : 'value2'
        tags:
            - { name: monolog.processor, handler: your_handler }
```

## Usage

If you want to use logger and send extra field, you can use LoggerExtra which exposes same function than default logger.
Add a key 'extra' in the context containing the list of additional fields.

```php
$loggerExtra->error('message', ['extra' => ['key' => 'value']])
```

## Versioning

monolog-extra-bundle follows [semantic versioning](https://semver.org/). In short the scheme is MAJOR.MINOR.PATCH where
1. MAJOR is bumped when there is a breaking change,
2. MINOR is bumped when a new feature is added in a backward-compatible way,
3. PATCH is bumped when a bug is fixed in a backward-compatible way.

Versions bellow 1.0.0 are considered experimental and breaking changes may occur at any time.

## Contributing

Contributions are welcomed! There are many ways to contribute, and we appreciate all of them. Here are some of the major ones:

* [Bug Reports](https://git.chaplean.coop/open-source/bundle/monolog-extra-bundle/issues): While we strive for quality software, bugs can happen and we can't fix issues we're not aware of. So please report even if you're not sure about it or just want to ask a question. If anything the issue might indicate that the documentation can still be improved!
* [Feature Request](https://git.chaplean.coop/open-source/bundle/monolog-extra-bundle/issues): You have a use case not covered by the current api? Want to suggest a change or add something? We'd be glad to read about it and start a discussion to try to find the best possible solution.
* [Pull Request](https://git.chaplean.coop/open-source/bundle/monolog-extra-bundle/merge_requests): Want to contribute code or documentation? We'd love that! If you need help to get started, GitHub as [documentation](https://help.github.com/articles/about-pull-requests/) on pull requests. We use the ["fork and pull model"](https://help.github.com/articles/about-collaborative-development-models/) were contributors push changes to their personnal fork and then create pull requests to the main repository. Please make your pull requests against the `master` branch.

As a reminder, all contributors are expected to follow our [Code of Conduct](CODE_OF_CONDUCT.md).

## Hacking

You might find the following commands usefull when hacking on this project:

```bash
# Install dependencies
composer install

# Run tests
bin/phpunit
```

## License

monolog-extra-bundle is distributed under the terms of the MIT license.

See [LICENSE](LICENSE.md) for details.
