<?php
/**
 * @file
 * Contains \AssertionErrorTest.
 *
 * @package aki-tendo/php7exception
 * @author Michael Lloyd Morris
 */

require_once __DIR__ . '/../php7exceptions.php';
assert_options(ASSERT_ACTIVE, 1);

/**
 * Tests assertion error conversion to correct PHP 7 exception class.
 */
class AssertionErrorTest extends PHPUnit_Framework_TestCase {
  /**
   * @expectedException AssertionError
   */
  public function testAssertErrorThrow() {
    assert(false);
  }
}
