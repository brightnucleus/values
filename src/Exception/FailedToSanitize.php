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

namespace BrightNucleus\Values\Exception;

use BrightNucleus\Exception\RuntimeException;
use BrightNucleus\Values\Value;

/**
 * Class FailedToSanitize.
 *
 * @since   0.1.1
 *
 * @package BrightNucleus\Values\Exception
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class FailedToSanitize extends RuntimeException implements ValueException
{

    /**
     * Create a new exception instance from a failing value.
     *
     * @since 0.1.1
     *
     * @param mixed $value  Value that failed sanitization.
     * @param string $class FCQN of the class that the value was sanitized against.
     *
     * @return FailedToSanitize
     */
    public static function fromValueForClass($value, string $class)
    {
        $message = sprintf(
            'Failed to sanitize value of type %1$s from Value object of type %2$s. (%3$s)',
            is_object($value) ? get_class($value) : gettype($value),
            $class,
            json_encode($value)
        );

        return new self($message);
    }
}
