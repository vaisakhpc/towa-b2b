<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\Checkout;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Checkout\CheckoutClient as SprykerCheckoutClient;

/**
 * @method \Pyz\Client\Checkout\CheckoutFactory getFactory()
 */
class CheckoutClient extends SprykerCheckoutClient implements CheckoutClientInterface
{
    /**
     * Client method to save the order name in the database
     * @param QuoteTransfer $quoteTransfer
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    public function saveOrderName(QuoteTransfer $quoteTransfer)
    {
        return $this->getFactory()
            ->createZedStub()
            ->saveOrderName($quoteTransfer);
    }
}