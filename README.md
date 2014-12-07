# Nomo Spaco

Finds available Fully Qualified ClassNames (fqcn) in a project.

> **Caution**: this is a prototype, the work is still in progress.

> **Note**: a Fully Qualified ClassName (fqcn) is a classname with its complete
> namespace (e.g. `Symfony\Component\HttpFoundation\Request`).

## Installation

Use [Composer](https://getcomposer.org) to install this library in your projects:

    composer require "gnugat/nomo-spaco:~0.4"

## Features

### Find in path

In order to find all available fully qualified classnames of a PHP project,
you need to provide the path to its root:

```php
<?php

require __DIR__.'/vendor/autoload.php';

$fqcnRepository = \test\Gnugat\NomoSpaco\make_fqcn_repository();
$allFqcns = $fqcnRepository->findIn(__DIR__);
```

> **Caution**: the `make_fqcn_repository` function is only available for
> demonstration purpose. Please use a proper Dependency Injection Container.

### Find in path for classname

In order to find all possible fully qualified classnames for a given class,
you need to provide the path to the project's root and the classname:

```php
<?php

require __DIR__.'/vendor/autoload.php';

$fqcnRepository = \test\Gnugat\NomoSpaco\make_fqcn_repository();
$possibleFqcns = $fqcnRepository->findInFor(__DIR__, 'Classname');
```

## How does this work?

Nowdays PHP projects are powered by [Composer](https://getcomposer.org), a
package manager that installs an autoloads them. This breaks native functions
like [get_declared_classes](http://php.net/get_declared_classes).

**Nomo Spaco** tries to fix this issue in an old fashion way:

* find all PHP files in a project
* for each file, find the namespace using PHP tokens
* for each file, find class names using PHP tokens

## Demonstration

You can display the list of all fully qualified classnames of a project using:

    php ./test/findAll.php <projectRoot>

You can display the list of all fully qualified classnames of a project's class
using:

    php ./test/findOne.php <projectRoot> <classname>
