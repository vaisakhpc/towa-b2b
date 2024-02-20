<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Checkout\Plugin\Steps;

use Codeception\Test\Unit;
use Pyz\Yves\CheckoutPage\Plugin\CheckoutOrderNameStepEnterPreCheckPlugin;
use Generated\Shared\Transfer\QuoteTransfer;

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
class CheckoutOrderNameStepEnterPreCheckPluginTest extends Unit
{
    public function testCheckMethodReturnsTrue()
    {
        $obj = new CheckoutOrderNameStepEnterPreCheckPlugin();
        $this->assertTrue($obj->check($this->getSampleTransfer()));
    }
    public function testCheckMethodReturnsFalse()
    {
        $obj = new CheckoutOrderNameStepEnterPreCheckPlugin();
        $this->assertFalse($obj->check($this->getSampleTransfer('!inValid0')));
    }

    protected function getSampleTransfer(string $name = 'name')
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setOrderName($name);
        return $quoteTransfer;
    }
}