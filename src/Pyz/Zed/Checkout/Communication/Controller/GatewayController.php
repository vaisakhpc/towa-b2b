<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Checkout\Communication\Controller;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Checkout\Communication\Controller\GatewayController as SprykerGatewayController;

/**
 * @method \Pyz\Zed\Checkout\Business\CheckoutFacadeInterface getFacade()
 */
class GatewayController extends SprykerGatewayController
{
    /**
     * action method to save the order name in the persistence layer
     * 
     */
    public function saveOrderNameAction(QuoteTransfer $quoteTransfer)
    {
        $checkoutResponseTransfer = $this->getFacade()->saveOrderName($quoteTransfer);
        return $checkoutResponseTransfer;
    }
}