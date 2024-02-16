<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Checkout\Communication\Controller;

use Exception;
use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\ErrorHandler\ErrorLogger;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Spryker\Zed\Checkout\Communication\Controller\GatewayController as SprykerGatewayController;

/**
 * @method \Pyz\Zed\Checkout\Business\CheckoutFacadeInterface getFacade()
 */
class GatewayController extends SprykerGatewayController
{
    public function saveOrderNameAction(QuoteTransfer $quoteTransfer)
    {
        $checkoutResponseTransfer = $this->getFacade()->saveOrderName($quoteTransfer);

        return $checkoutResponseTransfer;
    }
}