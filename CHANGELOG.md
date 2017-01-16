# Changes

## 0.4.2: Magic Constant

* handled `::class` magic constant case

## 0.4.1: PHP 7

* now compatible with PHP 7

## 0.4.0: PHP tokens and iterators

* added new constructor argument to FqcnRepository
* added dependency on token_get_all
* added dependency on RegexIterator
* added dependency on RecursiveIteratorIterator
* added dependency on RecursiveDirectoryIterator
* removed dependency on symfony2 Finder

## 0.3.0: no loaded

* removed dependency on get_declared_classes

## 0.2.0: no composer

> **Caution**: Backward Compatibility breaks.

* renamed findOne to findInFor from FqcnRepository (BC break)
* renamed findAll to findIn from FqcnRepository (BC break)
* added dependency on get_declared_classes
* removed dependency on composer class maps

## 0.1.0: use composer class mapping

* added dependency on composer class maps
* added dependency on symfony2 Finder
* added findOne to FqcnRepository
* added findAll to FqcnRepository
* created FqcnRepository
