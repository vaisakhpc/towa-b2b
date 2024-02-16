<?php

namespace Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep;

use SprykerShop\Yves\CheckoutPage\Process\Steps\PostConditionCheckerInterface;
use Generated\Shared\Transfer\QuoteTransfer;
use Symfony\Component\HttpFoundation\Request;

class OrderNamePostCondition implements PostConditionCheckerInterface
{
    public function check(QuoteTransfer $quoteTransfer): bool
    {
        if ($quoteTransfer->getOrderName()) {
            return true;
        }
        return false;
    }
}