<?php

namespace Pyz\Yves\CheckoutPage;

use Pyz\Yves\CheckoutPage\Form\FormFactory;
use Pyz\Yves\CheckoutPage\Process\StepFactory;
use SprykerShop\Yves\CheckoutPage\CheckoutPageFactory as SprykerShopCheckoutPageFactory;

/**
 * Extending the Spryker's core class with the Pyz version
 */
class CheckoutPageFactory extends SprykerShopCheckoutPageFactory
{
    /**
     * @return \Pyz\Yves\CheckoutPage\Process\StepFactory
     */
    public function createStepFactory()
    {
        return new StepFactory();
    }

    /**
     * @return \Pyz\Yves\CheckoutPage\Form\FormFactory
     */
    public function createCheckoutFormFactory()
    {
        return new FormFactory();
    }
}
