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
use BrightNucleus\Values\Value;

/**
 * Class FailedToValidate.
 *
 * @since   0.1.1
 *
 * @package BrightNucleus\Values\Exception
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class FailedToValidate extends DomainException implements ValueException
{

    /**
     * Create a new exception instance from a failing value.
     *
     * @since 0.1.1
     *
     * @param mixed $value       Value that failed validation.
     * @param Value $valueObject Value object that the value was validated against.
     *
     * @return FailedToValidate
     */
    public static function fromValue($value, Value $valueObject)
    {
        $message = sprintf(
            'Failed to validate value of type %1$s to fit into Value object of type %2$s. (%3$s)',
            is_object($value) ? get_class($value) : gettype($value),
            get_class($valueObject),
            json_encode($value)
        );

        return new self($message);
    }
}
