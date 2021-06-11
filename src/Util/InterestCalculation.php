<?php

namespace RicardoKovalski\Interest\Console\Util;

use RicardoKovalski\InterestCalculation\Contracts\Interest;

/**
 * Class InterestCalculation
 *
 * @method static InterestCalculation Financial(float $interestValue)
 * @method static InterestCalculation Compound(float $interestValue)
 * @method static InterestCalculation Simple(float $interestValue)
 *
 * @package RicardoKovalski\Interest\Console\Util
 */
final class InterestCalculation
{
    /**
     * @var Interest $interest
     */
    private $interest;

    /**
     * InterestAdapter constructor.
     *
     * @param Interest $interest
     */
    public function __construct(Interest $interest)
    {
        $this->interest = $interest;
    }

    /**
     * @param $installmentNumber
     * @return mixed
     */
    public function getInterestByInstallmentNumber($installmentNumber)
    {
        return $this->interest->getValueCalculatedByInstallment($installmentNumber);
    }

    /**
     * @param $method
     * @param $arguments
     * @return InterestCalculation
     */
    public static function __callStatic($method, $arguments)
    {
        $concreteClassInterest = "RicardoKovalski\\InterestCalculation\\Types\\{$method}";

        return new self(new $concreteClassInterest(current($arguments)?:0.00));
    }
}
