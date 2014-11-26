# Nomo Spaco

Finds the available Fully Qualified ClassNames (fqcn) in a project.

> **Caution**: this is a prototype, the work is still in progress.

> **Note**: a Fully Qualified ClassName (fqcn) is a classname with its complete
> namespace.

## Installation

Use [Composer](https://getcomposer.org) to install this library in your projects:

    composer require "gnugat/nomo-spaco"

## Features

### Find in path

In order to find all the available fully qualified classnames of a PHP project,
you need to provide the path to its root:

```php
<?php

require __DIR__.'/vendor/autoload.php';

$fqcnRepository = \test\Gnugat\NomoSpaco\make_fqcn_repository();
$allFqcns = $fqcnRepository->findIn(__DIR__);
```

> **Caution**: the `make_fqcn_repository` function is only available for
> demonstration purpose. Please use a proper Dependency Injection Container.

> **Note**: the core function `get_declared_classes()` isn't able to return classes
> which haven't been included (the usage of autoloaders breaks it).
> Nomo Spaco tries to address this issue.

### Find in path for classname

In order to find all the possible fully qualified classnames for a given class,
you need to provide the path to the project's root and the classname:

```php
<?php

require __DIR__.'/vendor/autoload.php';

$fqcnRepository = \test\Gnugat\NomoSpaco\make_fqcn_repository();
$possibleFqcns = $fqcnRepository->findInFor(__DIR__, 'Classname');
```

## How does this work?

Nowdays PHP projects are powered by [Composer](https://getcomposer.org), a
package manager that installs an autoloads them.

It can rely on PSR-0 and PSR-4 which ask developers to:

1. define only one class per file
2. name the file after the classname
3. place the file in directories that follows the namespace

By using Composer's class mapping, we are able to locate every class in the
project. From the filename and the namespace delcared inside each PHP files, we
can populate a collection of fully qualified classnames.

## Demonstration

You can display the list of all fully qualified classnames of a project using:

    php ./test/findAll.php <projectRoot>

You can display the list of all fully qualified classnames of a project's class
using:

    php ./test/findOne.php <projectRoot> <classname>
