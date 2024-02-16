<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\Checkout\Zed;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\ZedRequest\ZedRequestClient;
use Spryker\Client\Checkout\Zed\CheckoutStub as SprykerCheckoutStub;

class CheckoutStub extends SprykerCheckoutStub implements CheckoutStubInterface
{
 /**
     * @uses \Pyz\Zed\Checkout\Communication\Controller\GatewayController::saveOrderAction()
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    public function saveOrderName(QuoteTransfer $quoteTransfer)
    {
        /** @var \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponseTransfer */
        $checkoutResponseTransfer = $this->zedStub->call('/checkout/gateway/save-order-name', $quoteTransfer);

        return $checkoutResponseTransfer;
    }
}