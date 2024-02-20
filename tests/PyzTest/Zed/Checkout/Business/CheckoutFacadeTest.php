<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\Checkout\Business;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Zed\Checkout\Business\CheckoutFacade;
use Generated\Shared\Transfer\QuoteResponseTransfer;

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
class CheckoutFacadeTest extends Unit
{
    public function testIfSaveOrderNameRunsSuccessfully()
    {
        $obj = new CheckoutFacade();
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setOrderName('check');
        $result = $obj->saveOrderName($quoteTransfer);
        $this->assertInstanceOf(QuoteResponseTransfer::class, $result);
    }
}