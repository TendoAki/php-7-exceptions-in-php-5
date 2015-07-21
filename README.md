# php-7-exceptions-in-php-5

PHP 7 can throw exceptions in many situations where PHP 5.x uses errors.
This can make writing unit tests that pass both versions something of a
headache. The goal of this package is to alleviate this headache.

This is version 1.0 and only addresses assert() statement failures by using
the assert callback to throw an AssertionError when such a statement fails.
This allows a PHPUnit test to use the annotation "@expectedException
AssertionError" to check the assertion and not worry about whether the test
is running under PHP 5.x or 7.

Subsequent versions of this package will deal with other error types, starting
with the various errors in group E_RECOVERABLE_ERROR.
