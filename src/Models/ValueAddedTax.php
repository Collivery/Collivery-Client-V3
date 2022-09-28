<?php
namespace Mds\Collivery\Models;
use Carbon\Carbon;
use InvalidArgumentException;

trait ValueAddedTax
{
    /**
     * @param float|int|string $price
     */
    public function vatAmount($price, Carbon $date = null): float
    {
        if (!is_numeric($price)) {
            throw new InvalidArgumentException('Price must be numeric, '.gettype($price).' given.');
        }

        $vatRate = $this->vatRate($date);

        return round($vatRate * $price, 2);
    }

    /**
     * @param float|int|string $price
     */
    public function addVat($price, Carbon $date = null): float
    {
        return $price + $this->removeVat($price, $date);
    }

    /**
     * @param float|int|string $price
     */
    public function removeVat($price, Carbon $date = null): float
    {
        return $price / (1 + $this->vatRate($date));
    }

    public function vatRate(Carbon $date = null): float
    {
        return $this->vatPercentage($date) / 100;
    }

    public function vatPercentage(Carbon $date = null): int
    {
        $date = $date ?: now();
        $vatChangeMonth = Carbon::parse('2018-04-01');

        return $date->gte($vatChangeMonth) ? 15 : 14;
    }
}
