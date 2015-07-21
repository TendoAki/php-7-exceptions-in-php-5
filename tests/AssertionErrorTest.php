<?php
/**
 * @file
 * Contains \AssertionErrorTest.
 *
 * @package aki-tendo/php7exception
 * @author Michael Lloyd Morris
 * @version 1.0
 */

require_once '../php7exceptions.php';
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
