<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Checkout\Business;

use Generated\Shared\Transfer\QuoteTransfer;

/**
 * @method \Pyz\Zed\Checkout\Business\CheckoutBusinessFactory getFactory()
 */
interface CheckoutFacadeInterface
{
    /**
     * Specification:
     * - Runs checkout pre-condition CheckoutPreConditionPluginInterface plugins.
     * - Returns response with boolean isSuccess and an array of errors.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    public function saveOrderName(QuoteTransfer $quoteTransfer);
}
