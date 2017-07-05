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
use BrightNucleus\Values\Value\StringValue as Testee;

/**
 * Class StringValueTest.
 *
 * @since   0.2.0
 *
 * @package BrightNucleus\Values
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
final class StringValueTest extends TestCase
{

    const TEST_STRING = 'test string';
    const TEST_STRING_TO_ESCAPE = '<tag>random text</tag> "alert(\'Warning!\')';
    const TEST_HTML_ESCAPED_STRING = '&lt;tag&gt;random text&lt;/tag&gt; &quot;alert(&#039;Warning!&#039;)';
    const TEST_ATTRIBUTE_ESCAPED_STRING = 'random text &quot;alert(&#039;Warning!&#039;)';
    const TEST_JS_ESCAPED_STRING = '&lt;tag&gt;random text&lt;/tag&gt; &quot;alert(\\\'Warning!\\\')';

    /**
     * Test whether the testee can be instantiated.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_be_instantiated()
    {
        $this->assertInstanceOf(Testee::class, new Testee(self::TEST_STRING));
    }

    /**
     * Test whether the testee can fail to be instantiated when the value is invalid.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_fail_to_be_instantiated_when_invalid()
    {
        $this->expectException(FailedToValidate::class);
        new Testee([]);
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
        $this->assertTrue(Testee::isValid(self::TEST_STRING));
    }

    /**
     * Test whether the testee can identify invalid values.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_identify_invalid_values()
    {
        $this->assertFalse(Testee::isValid([]));
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
        $object = new Testee(self::TEST_STRING);
        $this->assertEquals(self::TEST_STRING, $object->validate(self::TEST_STRING));
    }

    /**
     * Test whether the testee can fail to validate when the value is invalid.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_fail_to_validate_when_invalid()
    {
        $object = new Testee(self::TEST_STRING);
        $this->expectException(FailedToValidate::class);
        $object->validate([]);
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
        $object = new Testee(self::TEST_STRING_TO_ESCAPE);
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
        $object = new Testee(self::TEST_STRING_TO_ESCAPE);
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
        $object = new Testee(self::TEST_STRING_TO_ESCAPE);
        $this->assertEquals(self::TEST_JS_ESCAPED_STRING, $object->escape(EscapeTarget::JS));
    }

    /**
     * Test whether the testee can return its value.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_return_its_value()
    {
        $object = new Testee(self::TEST_STRING);
        $this->assertEquals(self::TEST_STRING, $object->getValue());
    }

    /**
     * Test whether the testee will not escape the value it returns.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_does_not_escape_the_value_it_returns()
    {
        $object = new Testee(self::TEST_STRING_TO_ESCAPE);
        $this->assertEquals(self::TEST_STRING_TO_ESCAPE, $object->getValue());
    }

    /**
     * Test whether the testee can have its value changed.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_have_its_value_changed()
    {
        $object = new Testee(self::TEST_STRING_TO_ESCAPE);
        $this->assertEquals(self::TEST_STRING_TO_ESCAPE, $object->getValue());
        $object->setValue(self::TEST_STRING);
        $this->assertEquals(self::TEST_STRING, $object->getValue());
    }

    /**
     * Test whether the testee can fail have its value changed if the value is not valid.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_fail_to_have_its_value_changed_when_invalid()
    {
        $object = new Testee(self::TEST_STRING_TO_ESCAPE);
        $this->assertEquals(self::TEST_STRING_TO_ESCAPE, $object->getValue());
        $this->expectException(FailedToValidate::class);
        $object->setValue([]);
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
     * Test whether the testee can reject empty values through the constructor.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_reject_empty_values_through_constructor()
    {
        $this->expectException(FailedToValidate::class);
        new Testee('');
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
        $object = new Testee(self::TEST_STRING, Value::CAN_BE_EMPTY);
        $object->setValue('');
        $this->assertTrue($object->isEmpty());
    }

    /**
     * Test whether the testee can reject empty values through the setter.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_reject_empty_values_through_setter()
    {
        $object = new Testee(self::TEST_STRING);
        $this->expectException(FailedToValidate::class);
        $object->setValue('');
    }

    /**
     * Test whether the testee knows when it is empty.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_knows_when_it_is_empty()
    {
        $object = new Testee(self::TEST_STRING, Value::CAN_BE_EMPTY);
        $this->assertFalse($object->isEmpty());
        $object->setValue('');
        $this->assertTrue($object->isEmpty());
    }

    /**
     * Test whether the testee can return its flags.
     *
     * @since 0.2.0
     *
     * @test
     */
    public function it_can_return_its_flags()
    {
        $object1 = new Testee(self::TEST_STRING);
        $object2 = new Testee(self::TEST_STRING, Value::CAN_BE_EMPTY);
        $this->assertEquals(0, $object1->getFlags());
        $this->assertEquals(Value::CAN_BE_EMPTY, $object2->getFlags());
    }
}
