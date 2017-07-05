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

use BrightNucleus\Values\Exception\FailedToSanitize;
use BrightNucleus\Values\Exception\FailedToValidate;
use BrightNucleus\Validation\Exception\ValidationException;

/**
 * Class StringValue.
 *
 * @since   0.1.0
 *
 * @package BrightNucleus\Values
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class StringValue extends AbstractValue
{

    /**
     * Return the validated form of the value.
     *
     * @since 0.1.1
     *
     * @param mixed $value Value to validate.
     *
     * @return mixed Validated value.
     * @throws ValidationException If the value could not be validated.
     */
    public function validate($value)
    {
        if (! static::isValid($value)) {
            throw FailedToValidate::fromValueForClass($value, static::class);
        }
        return (string)$value;
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
        $value = filter_var($this->value, FILTER_SANITIZE_STRING);

        if (false === $value) {
            throw FailedToSanitize::fromValueForClass($this->value, static::class);
        }

        return $value;
    }

    /**
     * Check whether a value is valid according to the attached validation rules.
     *
     * @since 0.2.0
     *
     * @param mixed $value Value to check for validity.
     *
     * @return bool Whether the value is valid.
     */
    public static function isValid($value): bool
    {
        return is_string($value);
    }
}
