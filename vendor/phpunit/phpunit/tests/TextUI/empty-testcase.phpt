--TEST--
phpunit EmptyTestCaseTest ../_files/EmptyTestCaseTest.php
--FILE--
<?php
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'EmptyTestCaseTest';
$_SERVER['argv'][3] = dirname(dirname(__FILE__)) . '/_files/EmptyTestCaseTest.php';

require __DIR__ . '/../bootstrap.php';
PHPUnit_TextUI_Command::main();
?>
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

W                                                                   1 / 1 (100%)

Time: %s, Memory: %sMb

There was 1 warning:

1) Warning
No tests found in class "EmptyTestCaseTest".

WARNINGS!
Tests: 1, Assertions: 0, Warnings: 1.
