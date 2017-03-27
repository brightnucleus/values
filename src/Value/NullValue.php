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

namespace BrightNucleus\Values\Value;

use BrightNucleus\Values\EscapeTarget;
use BrightNucleus\Values\Value;

/**
 * Class NullValue.
 *
 * @since   0.1.1
 *
 * @package BrightNucleus\Values
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class NullValue implements Value
{

    /**
     * Get a sanitized version of the value.
     *
     * @since 0.1.0
     *
     * @param string $target Optional. Escaping target to use. Defaults to HTML.
     *
     * @return mixed Sanitized version of the value.
     */
    public function escape(string $target = EscapeTarget::HTML)
    {
        return '';
    }

    /**
     * Get a sanitized version of the value.
     *
     * @since 0.1.0
     *
     * @return mixed Sanitized version of the value.
     */
    public function sanitize()
    {
        return '';
    }

    /**
     * Return the validated form of the value.
     *
     * Returns null if the value could not be validated.
     *
     * @since 0.1.1
     *
     * @param mixed $value Value to validate.
     *
     * @return mixed|null Validated value. Null if validation failed.
     */
    public function validate($value)
    {
        return $value;
    }

    /**
     * Check whether a value is valid according to the attached validation
     * rules.
     *
     * @since 0.1.0
     *
     * @param mixed $value Value to check for validity.
     *
     * @return bool Whether the value is valid.
     */
    public function isValid($value): bool
    {
        return true;
    }

    /**
     * Get the raw value.
     *
     * @since 0.1.0
     *
     * @return mixed Current raw value.
     */
    public function getValue()
    {
        return '';
    }

    /**
     * Set the raw value.
     *
     * @since 0.1.0
     *
     * @param mixed $value New raw value.
     *
     * @return Value Modified Value object. Can differ from the original one.
     */
    public function setValue($value)
    {
        return $this;
    }

    /**
     * Get the optional flags.
     *
     * @since 0.1.2
     *
     * @return mixed Current optional flags.
     */
    public function getFlags()
    {
        return 0;
    }

    /**
     * Set the optional flags.
     *
     * @since 0.1.2
     *
     * @param int $flags New set of flags.
     *
     * @return Value Modified Value object. Can differ from the original one.
     */
    public function setFlags(int $flags)
    {
        return $this;
    }

    /**
     * "Execute" the value which is a shortcut for retrieving its escaped
     * value.
     *
     * This is an alternative way for accessing values to allow for more
     * elegant syntax.
     *
     * @since 0.1.0
     *
     * @param string $target Optional. Escaping target to use. Defaults to
     *                       HTML.
     *
     * @return mixed
     */
    public function __invoke(string $target = EscapeTarget::HTML)
    {
        return '';
    }

    /**
     * Return a string representation of the value.
     *
     * @since 0.1.0
     *
     * @return string
     */
    public function __toString(): string
    {
        return '';
    }

}
