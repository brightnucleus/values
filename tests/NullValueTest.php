<?php
/**
 * Bright Nucleus Values.
 *
 * Manipulate sanitizable and validatable values.
 *
 * @package   BrightNucleus\Values
 * @author    Alain Schlesser <alain.schlesser@gmail.com>
 * @license   MIT
 * @link      https://www.brightnucleus.com/
 * @copyright 2017 Alain Schlesser, Bright Nucleus
 */

namespace BrightNucleus\Values;

use BrightNucleus\Values\Exception\FailedToValidate;
use PHPUnit\Framework\TestCase;
use BrightNucleus\Values\Value\NullValue as Testee;

/**
 * Class NullValueTest.
 *
 * @since   0.2.0
 *
 * @package BrightNucleus\Values
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
final class NullValueTest extends TestCase
{

    const TEST_NULL_VALUE = 'random string';
    const TEST_NULL_VALUE_TO_ESCAPE = 'random string';
    const TEST_HTML_ESCAPED_STRING = '';
    const TEST_ATTRIBUTE_ESCAPED_STRING = '';
    const TEST_JS_ESCAPED_STRING = '';

    /**
     * Test whether the testee can be instantiated.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_be_instantiated()
    {
        $this->assertInstanceOf(Testee::class, new Testee(self::TEST_NULL_VALUE));
    }

    /**
     * Test whether the testee can identify valid values.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_identify_valid_values()
    {
        $this->assertTrue(Testee::isValid(self::TEST_NULL_VALUE));
    }

    /**
     * Test whether the testee can validate.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_validate()
    {
        $object = new Testee(self::TEST_NULL_VALUE);
        $this->assertEquals(self::TEST_NULL_VALUE, $object->validate(self::TEST_NULL_VALUE));
    }

    /**
     * Test whether the testee can be sanitized.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_be_sanitized()
    {
        $this->markTestSkipped('Sanitization is not implemented yet.');
    }

    /**
     * Test whether the testee can be escaped for HTML output.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_be_escaped_for_html()
    {
        $object = new Testee(self::TEST_NULL_VALUE_TO_ESCAPE);
        $this->assertEquals(self::TEST_HTML_ESCAPED_STRING, $object->escape(EscapeTarget::HTML));
    }

    /**
     * Test whether the testee can be escaped for attribute output.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_be_escaped_for_attribute()
    {
        $object = new Testee(self::TEST_NULL_VALUE_TO_ESCAPE);
        $this->assertEquals(self::TEST_ATTRIBUTE_ESCAPED_STRING, $object->escape(EscapeTarget::ATTRIBUTE));
    }

    /**
     * Test whether the testee can be escaped for JavaScript output.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_be_escaped_for_js()
    {
        $object = new Testee(self::TEST_NULL_VALUE_TO_ESCAPE);
        $this->assertEquals(self::TEST_JS_ESCAPED_STRING, $object->escape(EscapeTarget::JS));
    }

    /**
     * Test whether the testee always returns null.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_always_returns_null()
    {
        $object = new Testee(self::TEST_NULL_VALUE);
        $this->assertEquals(null, $object->getValue());
    }

    /**
     * Test whether the testee cannot have its value changed.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_cannot_have_its_value_changed()
    {
        $object = new Testee(self::TEST_NULL_VALUE_TO_ESCAPE);
        $this->assertEquals(null, $object->getValue());
        $object->setValue(self::TEST_NULL_VALUE);
        $this->assertEquals(null, $object->getValue());
    }

    /**
     * Test whether the testee can accept empty values through the constructor.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_allow_empty_values_through_constructor()
    {
        $object = new Testee('', Value::CAN_BE_EMPTY);
        $this->assertTrue($object->isEmpty());
    }

    /**
     * Test whether the testee cannot reject empty values through the constructor.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_cannot_reject_empty_values_through_constructor()
    {
        $object = new Testee('');
        $this->assertTrue($object->isEmpty());
    }

    /**
     * Test whether the testee can accept empty values through the setter.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_allow_empty_values_through_setter()
    {
        $object = new Testee(self::TEST_NULL_VALUE, Value::CAN_BE_EMPTY);
        $object->setValue('');
        $this->assertTrue($object->isEmpty());
    }

    /**
     * Test whether the testee cannot reject empty values through the setter.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_cannot_reject_empty_values_through_setter()
    {
        $object = new Testee(self::TEST_NULL_VALUE);
        $object->setValue('');
        $this->assertTrue($object->isEmpty());
    }

    /**
     * Test whether the testee is always empty.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_is_always_empty()
    {
        $object = new Testee(self::TEST_NULL_VALUE, Value::CAN_BE_EMPTY);
        $this->assertTrue($object->isEmpty());
        $object->setValue('');
        $this->assertTrue($object->isEmpty());
    }

    /**
     * Test whether the testee has no flags.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_has_no_flags()
    {
        $object1 = new Testee(self::TEST_NULL_VALUE);
        $object2 = new Testee(self::TEST_NULL_VALUE, Value::CAN_BE_EMPTY);
        $this->assertEquals(0, $object1->getFlags());
        $this->assertEquals(0, $object2->getFlags());
    }
}
