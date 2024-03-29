# Changes in PHPUnit 5.2

All notable changes of the PHPUnit 5.2 release series are documented in this file using the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## [5.2.7] - 2016-02-18

### Changed

* Improved the typography of the TestDox HTML report

## [5.2.6] - 2016-02-16

### Fixed

* `PHPUnit_Framework_InvalidCoversTargetException` is now properly handled and results in a warning 

## [5.2.5] - 2016-02-13

### Fixed

* Fixed [#2076](https://github.com/sebastianbergmann/phpunit/issues/2076): Code of custom comparators should not result in a test being marked as risky when PHPUnit is strict about @covers annotation usage

## [5.2.4] - 2016-02-11

### Fixed

* Fixed [#2072](https://github.com/sebastianbergmann/phpunit/issues/2072): Paths in XML configuration file were not handled correctly when they have whitespace around them

## [5.2.3] - 2016-02-08

### Removed

* Removed the implementation of [#1899](https://github.com/sebastianbergmann/phpunit/issues/1899) due to a [bug](https://github.com/sebastianbergmann/php-code-coverage/issues/420) in PHP_CodeCoverage

## [5.2.2] - 2016-02-07

### Removed

* Removed the implementation of [#1902](https://github.com/sebastianbergmann/phpunit/issues/1902) due to [#2042](https://github.com/sebastianbergmann/phpunit/issues/2042)

## [5.2.1] - 2016-02-05

### Fixed

* Fixed [#2060](https://github.com/sebastianbergmann/phpunit/issues/2060): Allow usage of `sebastian/version` in version 1

## [5.2.0] - 2016-02-05

### Added

* Implemented [#1899](https://github.com/sebastianbergmann/phpunit/issues/1899): Mark a test as risky that does not execute the code it wants to test
* Implemented [#1902](https://github.com/sebastianbergmann/phpunit/issues/1902): Mark a test as risky when it performs an assertion on a test double
* Implemented [#1905](https://github.com/sebastianbergmann/phpunit/issues/1905): Add `--fail-on-risky` and `--fail-on-warning` commandline options as well as `failOnRisky` and `failOnWarning` configuration options
* Implemented [#1912](https://github.com/sebastianbergmann/phpunit/issues/1912): Add support for specifying the extension version with the `@requires` annotation
* Implemented [#1977](https://github.com/sebastianbergmann/phpunit/issues/1977): Add support for disabling annotations that control the ignoring of code coverage
* Added `PHPUnit_Framework_TestCase::expectException()`, `PHPUnit_Framework_TestCase::expectExceptionCode()`, `PHPUnit_Framework_TestCase::expectExceptionMessage()`, and `PHPUnit_Framework_TestCase::expectExceptionMessageRegExp()` for programmatically setting expectations for exceptions

### Changed

* Deprecated `PHPUnit_Framework_TestCase::setExpectedException()`
* Deprecated the `checkForUnintentionallyCoveredCode` configuration setting (use `beStrictAboutCoversAnnotation` instead)

### Removed

* The `mapTestClassNameToCoveredClassName` configuration setting has been removed

[5.2.7]: https://github.com/sebastianbergmann/phpunit/compare/5.2.6...5.2.7
[5.2.6]: https://github.com/sebastianbergmann/phpunit/compare/5.2.5...5.2.6
[5.2.5]: https://github.com/sebastianbergmann/phpunit/compare/5.2.4...5.2.5
[5.2.4]: https://github.com/sebastianbergmann/phpunit/compare/5.2.3...5.2.4
[5.2.3]: https://github.com/sebastianbergmann/phpunit/compare/5.2.2...5.2.3
[5.2.2]: https://github.com/sebastianbergmann/phpunit/compare/5.2.1...5.2.2
[5.2.1]: https://github.com/sebastianbergmann/phpunit/compare/5.2.0...5.2.1
[5.2.0]: https://github.com/sebastianbergmann/phpunit/compare/5.1...5.2.0

