<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\CheckoutPage\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;

interface CheckoutOrderNameStepEnterPreCheckPluginInterface
{
    /**
     * Specification:
     * - Decides whether to disable checkout step or not.
     * - Checkout shipment step will be disabled if at least one plugin returns false.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function check(QuoteTransfer $quoteTransfer): bool;
}
