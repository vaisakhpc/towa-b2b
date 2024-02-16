<?php

namespace Pyz\Client\Checkout\Zed;

use Generated\Shared\Transfer\QuoteTransfer;

interface CheckoutStubInterface
{
    public function saveOrderName(QuoteTransfer $quoteTransfer);
}