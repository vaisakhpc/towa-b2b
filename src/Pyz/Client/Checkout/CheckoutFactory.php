<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\Checkout;

use Spryker\Client\Checkout\Quote\QuoteProceedCheckoutChecker;
use Spryker\Client\Checkout\Quote\QuoteProceedCheckoutCheckerInterface;
use Pyz\Client\Checkout\Zed\CheckoutStub;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Checkout\CheckoutFactory as SprykerCheckoutFactory;

class CheckoutFactory extends SprykerCheckoutFactory
{
    /**
     * @return \Pyz\Client\Checkout\Zed\CheckoutStubInterface
     */
    public function createZedStub()
    {
        return new CheckoutStub($this->getProvidedDependency(CheckoutDependencyProvider::SERVICE_ZED));
    }
}