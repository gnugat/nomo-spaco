# Nomo Spaco

Proof of Concept that use Composer and PSR-4 to:

* list the available fully qualified classnames of a project
* list the possible fully qualified classnames of a classname

> **Note**: a Fully Qualified ClassName (fcqn) is a classname with its complete
> namespace.

## Features

### Find All

In order to find all the available fully qualified classnames of a PHP project,
you can use a combination of the following native functions:

* get_declared_classes
* get_declared_interfaces

However, it only works for **loaded** classes, so if you're using an autoloader
you'll miss a lot of classes.

Enter Nomo Spaco:

```php
<?php

require __DIR__.'/vendor/autoload.php';

use Gnugat\NomoSpaco\FcqnRepository;

$fcqnRepository = new FcqnRepository();
$allFcqns = $fcqnRepository->findAll(__DIR__);
```

### Find One

In order to find a class's fully qualified classnames you can use
`ClassReflection`, or since 5.5 the `::class` keyword.

However, what if you want to list the possible fully qualified classnames (in
case a classname is used in two or more different namespaces), you can use Nomo
Spaco:

```php
<?php

require __DIR__.'/vendor/autoload.php';

use Gnugat\NomoSpaco\FcqnRepository;

$fcqnRepository = new FcqnRepository();
$possibleFcqns = $fcqnRepository->findOne(__DIR__, 'Classname');
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
