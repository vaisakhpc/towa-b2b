<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\CheckoutPage\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\CheckoutPage\CheckoutPageConfig;

class CheckoutOrderNameStepEnterPreCheckPlugin implements CheckoutOrderNameStepEnterPreCheckPluginInterface
{
    public function check(QuoteTransfer $quoteTransfer): bool
    {
        return preg_match(CheckoutPageConfig::CHECKOUT_ORDER_NAME_REGEX_PATTERN, $quoteTransfer->getOrderName());
    } 
}