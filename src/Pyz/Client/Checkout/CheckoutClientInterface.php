<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\Checkout;

use Generated\Shared\Transfer\QuoteTransfer;

interface CheckoutClientInterface
{
    /**
     * Interface for save order name method
     * @param QuoteTransfer $quoteTransfer
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    public function saveOrderName(QuoteTransfer $quoteTransfer);
}