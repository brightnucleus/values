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

/**
 * Interface Validatable.
 *
 * @since   0.1.0
 *
 * @package BrightNucleus\Values
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
interface Validatable
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
    public function validate($value);

    /**
     * Check whether a value is valid according to the attached validation rules.
     *
     * @since 0.1.0
     *
     * @param mixed $value Value to check for validity.
     *
     * @return bool Whether the value is valid.
     */
    public function isValid($value): bool;
}
