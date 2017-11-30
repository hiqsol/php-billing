<?php
/**
 * PHP Billing Library
 *
 * @link      https://github.com/hiqdev/php-billing
 * @package   php-billing
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\billing\charge;

/**
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
interface AggregatorInterface
{
    /**
     * Aggregates given charges to Bills.
     * @param Charge[] $charge array (can be nested) of charges
     * @return Bill[]
     */
    public function aggregateCharges(array $charges);
}