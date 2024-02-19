<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Checkout\Business;

use Spryker\Zed\Checkout\Business\CheckoutBusinessFactory as SprykerCheckoutBusinessFactory;
use Pyz\Zed\Checkout\CheckoutDependencyProvider;

/**
 * @method \Spryker\Zed\Checkout\CheckoutConfig getConfig()
 */
class CheckoutBusinessFactory extends SprykerCheckoutBusinessFactory
{
    /**
     * method to receive the quote facade from the list of dependencies
     */
    public function getQuoteFacade()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::FACADE_QUOTE);
    }
}