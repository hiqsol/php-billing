<?php
/**
 * PHP Billing Library
 *
 * @link      https://github.com/hiqdev/php-billing
 * @package   php-billing
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017-2018, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\billing\charge\modifiers;

use hiqdev\php\billing\action\ActionInterface;
use hiqdev\php\billing\charge\Charge;
use hiqdev\php\billing\charge\ChargeInterface;
use hiqdev\php\billing\charge\modifiers\addons\Period;
use hiqdev\php\billing\price\SinglePrice;
use hiqdev\php\billing\target\Target;
use hiqdev\php\billing\type\Type;
use hiqdev\php\units\Quantity;
use Money\Money;

/**
 * Leasing.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class Leasing extends Modifier
{
    const TERM = 'term';

    public function lasts($term): self
    {
        return $this->addAddon(self::TERM, Period::fromString($term));
    }

    public function getTerm(): Period
    {
        return $this->getAddon(self::TERM);
    }

    public function isAbsolute()
    {
        return $this->getAddon(self::VALUE)->isAbsolute();
    }

    public function isRelative()
    {
        return !$this->isAbsolute();
    }

    public function calculateSum(ChargeInterface $charge = null): Money
    {
        return $this->getValue($charge)->calculateSum($charge);
    }

    public function buildPrice(Money $sum)
    {
        $type = $this->getType();
        $target = $this->getTarget();
        $prepaid = Quantity::items(0);

        return new SinglePrice(null, $type, $target, null, $prepaid, $sum);
    }

    public function getType()
    {
        return new Type(Type::ANY, 'discount');
    }

    public function getTarget()
    {
        return new Target(Target::ANY, Target::ANY);
    }

    public function modifyCharge(?ChargeInterface $charge, ActionInterface $action): array
    {
        die('asdfds');
        if ($charge === null) {
            return [];
        }

        $month = $action->getTime()->modify('first day of this month midnight');
        if (!$this->checkPeriod($month)) {
            return [$charge];
        }

        $sum = $this->calculateSum($charge);
        $usage  = Quantity::items(1);
        $price = $this->buildPrice($sum);
        $discount = new Charge(null, $action, $price, $usage, $sum);
        $reason = $this->getReason();
        if ($reason) {
            $discount->setComment($reason->getValue());
        }

        return [$charge, $discount];
    }
}