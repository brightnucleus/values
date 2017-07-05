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
use BrightNucleus\Validation\Exception\ValidationException;
use BrightNucleus\Values\Exception\FailedToValidate;

/**
 * Class EmailAddressValue.
 *
 * @since   0.1.1
 *
 * @package BrightNucleus\Values
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class EmailAddressValue extends AbstractValue
{
    protected $validated;

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
        $value = filter_var($value, FILTER_VALIDATE_EMAIL);
        if (false === $value) {
            throw FailedToValidate::fromValueForClass($value, static::class);
        }
        return $value;
    }

    /**
     * Get a sanitized version of the value.
     *
     * @since 0.1.1
     *
     * @return mixed Sanitized version of the value.
     */
    public function sanitize()
    {
        $value = filter_var($this->value, FILTER_SANITIZE_EMAIL, FILTER_NULL_ON_FAILURE);

        if (null === $value) {
            throw FailedToSanitize::fromValueForClass($this->value, $this);
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
        return false !== filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
