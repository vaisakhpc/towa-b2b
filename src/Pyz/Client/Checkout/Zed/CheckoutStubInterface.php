<?php

namespace Pyz\Client\Checkout\Zed;

use Generated\Shared\Transfer\QuoteTransfer;

interface CheckoutStubInterface
{
    /**
     * Interface for save order name method
     * @param QuoteTransfer $quoteTransfer
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    public function saveOrderName(QuoteTransfer $quoteTransfer);
}