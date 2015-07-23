<?php

/**
 * @file
 * Unify some error handling between PHP 5 and 7 to simplify unit tests.
 *
 * @package aki-tendo/php7exception
 * @author Michael Lloyd Morris
 */

// PHP 5 - we must establish an AssertionError to throw and a assert callback
// handle to throw it.
if (version_compare(PHP_VERSION, '7.0.0-dev') === -1) {
  class AssertionError extends Exception {}

  // Assertions throws.
  assert_options(ASSERT_CALLBACK, function($file, $line, $code, $message = '') {
    if (empty($message)) {
      $message = "Assertion Failure in {$file} at {$line}. Failed asserting {$code}";
    }
    throw new AssertionError($message);
  });
}
// PHP 7 - simply turn on assertion exception throwing.
else {
  assert_options(ASSERT_EXCEPTION, 1);
}

