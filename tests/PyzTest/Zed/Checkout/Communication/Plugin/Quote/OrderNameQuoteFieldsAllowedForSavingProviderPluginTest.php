<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\Checkout\Communication\Plugin\Quote;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Zed\Checkout\Communication\Plugin\Quote\OrderNameQuoteFieldsAllowedForSavingProviderPlugin;
/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Yves
 * @group Checkout
 * @group Plugin
 * @group CheckoutOrderNameStepEnterPreCheckPluginTest
 * Add your own group annotations below this line
 */
class OrderNameQuoteFieldsAllowedForSavingProviderPluginTest extends Unit
{
    public function testCheckMethodReturnsValidArray()
    {
        $obj = new OrderNameQuoteFieldsAllowedForSavingProviderPlugin();
        $this->assertNotEmpty($obj->execute(new QuoteTransfer()));
    }
}