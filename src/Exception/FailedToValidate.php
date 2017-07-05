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

use BrightNucleus\Exception\DomainException;
use BrightNucleus\Validation\Exception\ValidationException;

/**
 * Class FailedToValidate.
 *
 * @since   0.1.1
 *
 * @package BrightNucleus\Values\Exception
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class FailedToValidate extends DomainException implements ValueException, ValidationException
{

    /**
     * Create a new exception instance from a failing value.
     *
     * @since 0.1.1
     *
     * @param mixed  $value Value that failed validation.
     * @param string $class FQCN of the class that the value was validated against.
     *
     * @return static
     */
    public static function fromValueForClass($value, string $class)
    {
        $message = sprintf(
            'Failed to validate value of type %1$s to fit into Value object of type %2$s. (%3$s)',
            is_object($value) ? get_class($value) : gettype($value),
            $class,
            json_encode($value)
        );

        return new static($message);
    }
}
