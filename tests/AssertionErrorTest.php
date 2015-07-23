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

  /**
   * Tests turning assertion exceptions on doesn't turn assertions on in PHP 7.
   */
  public function testAssertException() {
    if (version_compare(PHP_VERSION, '7.0.0-dev') >= 0) {
      assert_options(ASSERT_ACTIVE, 0);
      assert_options(ASSERT_EXCEPTION, 0);
      // This line will be skipped.
      assert(false);
      assert_options(ASSERT_EXCEPTION, 1);
      // This line SHOULD be skipped.
      assert(false);
    }
    // If we reach this line, all is well.
    $this->assertTrue(TRUE);
  }
}
