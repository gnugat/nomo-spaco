# Changes

## 0.2.0: no composer

> **Caution**: Bacward Compatibility breaks.

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
