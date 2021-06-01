<?php
namespace TDD;

class Receipt {
    public function total( array $items = [], $coupon) {
        $sum = array_sum($items);

        if(!is_null($coupon)) {
            $sum = $sum * (1-$coupon);
        }
        return $sum;
    }

    public function tax($amount, $taxrate) {
        return $amount * $taxrate;
    }
}