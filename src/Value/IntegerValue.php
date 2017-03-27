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
 * Class IntegerValue.
 *
 * @since   0.1.0
 *
 * @package BrightNucleus\Values
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class IntegerValue extends AbstractValue
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
        return is_int($value)
            ? (int)$value
            : null;
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
        $value = filter_var($this->value, FILTER_SANITIZE_NUMBER_INT, FILTER_NULL_ON_FAILURE);

        if (null === $value) {
            throw FailedToSanitize::fromValue($this->value, $this);
        }

        return $value;
    }
}
