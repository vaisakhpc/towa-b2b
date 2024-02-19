<?php

namespace Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep;

use SprykerShop\Yves\CheckoutPage\Process\Steps\PostConditionCheckerInterface;
use Generated\Shared\Transfer\QuoteTransfer;

class OrderNamePostCondition implements PostConditionCheckerInterface
{
    /**
     * @param QuoteTransfer $quoteTransfer
     * @return bool
     */
    public function check(QuoteTransfer $quoteTransfer): bool
    {
        if ($quoteTransfer->getOrderName()) {
            return true;
        }
        return false;
    }
}