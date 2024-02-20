<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Checkout\Business;

use Spryker\Zed\Checkout\Business\CheckoutFacade as SprykerCheckoutFacade;
use Generated\Shared\Transfer\QuoteTransfer;

/**
 * @method \Pyz\Zed\Checkout\Business\CheckoutBusinessFactory getFactory()
 */
class CheckoutFacade extends SprykerCheckoutFacade implements CheckoutFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @throws \Exception
     *
     * @return \Generated\Shared\Transfer\QuoteResponseTransfer
     */
    public function saveOrderName(QuoteTransfer $quoteTransfer)
    {
        return $this
            ->getFactory()
            ->getQuoteFacade()
            ->updateQuote($quoteTransfer);
    }
}