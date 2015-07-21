<?php

/**
 * @file
 * Force PHP 5.x to behave as PHP 7 does as much as possible.
 *
 * PHP 7 can throw exceptions in many situations where PHP 5.x uses errors.
 * This can make writing tests that pass both versions something of a headache.
 * The situation can be eased some by using the callbacks provided by the PHP
 * engine. It cannot cover all of the possible use cases, but it should be
 * able to handle a majority by allowing unit test authors to use the same
 * expectedException annotation regardless of the version of PHP they run.
 * Unfortunately the error message string will likely be different between
 * versions.
 *
 * This first version of the package deals with the simplest use case -
 * AssertionErrors.
 *
 * @package aki-tendo/php7exception
 * @author Michael Lloyd Morris
 * @version 1.0
 */

if (version_compare(PHP_VERSION, '7.0.0-dev') === -1) {
  // Exception classes introduced in PHP 7.
  class AssertionError extends Exception {}

  // Assertions throws.
  assert_options(ASSERT_CALLBACK, function($file, $line, $code, $message = '') {
    if (empty($message)) {
      $message = "Assertion Failure in {$file} at {$line}. Failed asserting {$code}";
    }
    throw new AssertionError($message);
  });
}

