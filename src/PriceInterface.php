<?php
/**
 * PHP Billing Library
 *
 * @link      https://github.com/hiqdev/php-billing
 * @package   php-billing
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\billing;

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
     * Calculate charge for given action.
     * @param ActionInterface $action
     * @return ChargeInterface
     */
    public function calculateCharge(ActionInterface $quantity);

    /**
     * Calculate sum for given quantity.
     * @param QuantityInterface $quantity
     * @return Money|null null when must not be charged
     */
    public function calculateSum(QuantityInterface $quantity);

    /**
     * Calculate usage for given quantity.
     * @param QuantityInterface $quantity
     * @return QuantityInterface|null null when must not be charged
     */
    public function calculateUsage(QuantityInterface $quantity);

    /**
     * Calculate price for given quantity.
     * @param QuantityInterface $quantity
     * @return Money|null null when must not be charged
     */
    public function calculatePrice(QuantityInterface $quantity);

    /**
     * Get target.
     * @return TargetInterface
     */
    public function getTarget();

    /**
     * Get type.
     * @return TypeInterface
     */
    public function getType();
}