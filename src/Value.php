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
 * Interface Value.
 *
 * Abstract representation of a single value.
 *
 * @since   0.1.0
 *
 * @package BrightNucleus\Values
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
interface Value extends Validatable, Sanitizable, Escapable
{

    const CAN_BE_EMPTY = 1;

    /**
     * Get the raw value.
     *
     * @since 0.1.0
     *
     * @return mixed Current raw value.
     */
    public function getValue();

    /**
     * Set the raw value.
     *
     * @since 0.1.0
     *
     * @param mixed $value New raw value.
     *
     * @return Value Modified Value object. Can differ from the original one.
     */
    public function setValue($value);

    /**
     * Get the optional flags.
     *
     * @since 0.1.2
     *
     * @return mixed Current optional flags.
     */
    public function getFlags();

    /**
     * Set the optional flags.
     *
     * @since 0.1.2
     *
     * @param int $flags New set of flags.
     *
     * @return Value Modified Value object. Can differ from the original one.
     */
    public function setFlags(int $flags);

    /**
     * "Execute" the value which is a shortcut for retrieving its escaped value.
     *
     * This is an alternative way for accessing values to allow for more elegant syntax.
     *
     * @since 0.1.0
     *
     * @param string $target Optional. Escaping target to use. Defaults to HTML.
     *
     * @return mixed
     */
    public function __invoke(string $target = EscapeTarget::HTML);

    /**
     * Return a string representation of the value.
     *
     * @since 0.1.0
     *
     * @return string
     */
    public function __toString(): string;
}
