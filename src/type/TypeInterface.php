<?php
/**
 * PHP Billing Library
 *
 * @link      https://github.com/hiqdev/php-billing
 * @package   php-billing
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\billing\type;

/**
 * Type interface.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
interface TypeInterface extends \JsonSerializable
{
    /**
     * Returns type name.
     * @return string
     */
    public function getName();

    /**
     * @return bool
     */
    public function equals(TypeInterface $other);
}