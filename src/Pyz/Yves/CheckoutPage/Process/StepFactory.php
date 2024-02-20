<?php

namespace Pyz\Yves\CheckoutPage\Process;

use Pyz\Yves\CheckoutPage\Plugin\Router\CheckoutPageRouteProviderPlugin;
use Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep;
use Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep\OrderNameStepExecutor;
use Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep\OrderNamePostCondition;
use SprykerShop\Yves\CheckoutPage\Process\StepFactory as SprykerShopStepFactory;
use SprykerShop\Yves\HomePage\Plugin\Router\HomePageRouteProviderPlugin;
use SprykerShop\Yves\CheckoutPage\Process\Steps\StepExecutorInterface;
use SprykerShop\Yves\CheckoutPage\Process\Steps\PostConditionCheckerInterface;
use Pyz\Client\Checkout\CheckoutClientInterface;
use Pyz\Yves\CheckoutPage\CheckoutPageDependencyProvider;
use Pyz\Yves\CheckoutPage\Plugin\CheckoutOrderNameStepEnterPreCheckPlugin;

/**
 * @method \SprykerShop\Yves\CheckoutPage\CheckoutPageConfig getConfig()
 */
class StepFactory extends SprykerShopStepFactory
{
	 /**
     * @return array<\Spryker\Yves\StepEngine\Dependency\Step\StepInterface>
     */
    public function getSteps(): array
    {
        return [
            $this->createEntryStep(),
            $this->createCustomerStep(),
            $this->createOrderNameStep(),
            $this->createAddressStep(),
            $this->createShipmentStep(),
            $this->createPaymentStep(),
            $this->createSummaryStep(),
            $this->createPlaceOrderStep(),
            $this->createSuccessStep(),
            $this->createErrorStep(),
        ];
    }

	/**
	 * @return \Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep
	 */
	public function createOrderNameStep()
	{
		return new OrderNameStep(
            $this->createOrderNameStepExecutor(),
            $this->createOrderNamePostCondition(),
			CheckoutPageRouteProviderPlugin::ROUTE_NAME_CHECKOUT_ORDER_NAME,
			HomePageRouteProviderPlugin::ROUTE_NAME_HOME,
            $this->getCheckoutAddressStepEnterPreCheckPlugins(),
            $this->getCheckoutOrderNameStepEnterPreCheckPlugins(),
		);
	}

    /**
	 * @return array<\Pyz\Yves\CheckoutPage\Plugin\CheckoutOrderNameStepEnterPreCheckPluginInterface>
	 */
    public function getCheckoutOrderNameStepEnterPreCheckPlugins()
    {
        return [
            new CheckoutOrderNameStepEnterPreCheckPlugin(),
        ];
    }

    public function createOrderNameStepExecutor(): StepExecutorInterface
    {
            return new OrderNameStepExecutor($this->getPyzCheckoutClient());
    }

    public function createOrderNamePostCondition(): PostConditionCheckerInterface
    {
        return new OrderNamePostCondition();
    }

    /**
     * @return \Pyz\Client\Checkout\CheckoutClientInterface
     */
    public function getPyzCheckoutClient(): CheckoutClientInterface
    {
        return $this->getProvidedDependency(CheckoutPageDependencyProvider::CLIENT_CHECKOUT_PYZ);
    }
}