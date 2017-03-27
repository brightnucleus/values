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
        return filter_var($value, FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE);
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
            throw FailedToSanitize::fromValue($this->value, $this);
        }

        return $value;
    }
}