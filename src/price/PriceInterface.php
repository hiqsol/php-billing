<?php
/**
 * PHP Billing Library
 *
 * @link      https://github.com/hiqdev/php-billing
 * @package   php-billing
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\billing\price;

use hiqdev\php\billing\action\ActionInterface;
use hiqdev\php\billing\target\TargetInterface;
use hiqdev\php\billing\type\TypeInterface;
use hiqdev\php\units\QuantityInterface;
use Money\Money;

/**
 * Price Interface.
 * Tariff consists of prices.
 *
 * Knows how to calculate usage, price and sum for given quantity.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
interface PriceInterface
{
    /**
     * Calculate sum for given quantity.
     *
     * @param QuantityInterface $quantity
     * @return Money|null null when must not be charged
     */
    public function calculateSum(QuantityInterface $quantity): ?Money;

    /**
     * Calculate usage for given quantity.
     *
     * @param QuantityInterface $quantity
     * @return QuantityInterface|null null when must not be charged
     */
    public function calculateUsage(QuantityInterface $quantity): ?QuantityInterface;

    /**
     * Calculate price for given quantity.
     *
     * @param QuantityInterface $quantity
     * @return Money|null null when must not be charged
     */
    public function calculatePrice(QuantityInterface $quantity): ?Money;

    /**
     * @param ActionInterface $action
     * @return bool
     */
    public function isApplicable(ActionInterface $action): bool;

    /**
     * Get target.
     *
     * @return TargetInterface
     */
    public function getTarget();

    /**
     * Get type.
     *
     * @return TypeInterface
     */
    public function getType();
}
