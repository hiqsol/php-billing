<?php
/**
 * PHP Billing Library
 *
 * @link      https://github.com/hiqdev/php-billing
 * @package   php-billing
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\billing\sale;

use DateTime;
use hiqdev\php\billing\customer\CustomerInterface;
use hiqdev\php\billing\plan\PlanInterface;
use hiqdev\php\billing\target\TargetInterface;

/**
 * Sale interface.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
interface SaleInterface
{
    public function getTarget();

    public function getCustomer();

    public function getPlan();

    public function getTime();
}