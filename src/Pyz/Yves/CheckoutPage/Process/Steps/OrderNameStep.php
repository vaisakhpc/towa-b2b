<?php

namespace Pyz\Yves\CheckoutPage\Process\Steps;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Step\StepWithBreadcrumbInterface;
use SprykerShop\Yves\CheckoutPage\Process\Steps\AbstractBaseStep;
use Symfony\Component\HttpFoundation\Request;
use SprykerShop\Yves\CheckoutPage\Process\Steps\StepExecutorInterface;
use SprykerShop\Yves\CheckoutPage\Process\Steps\PostConditionCheckerInterface;

class OrderNameStep extends AbstractBaseStep implements StepWithBreadcrumbInterface
{
    /**
     * @var \SprykerShop\Yves\CheckoutPage\Process\Steps\StepExecutorInterface
     */
    protected $stepExecutor;

     /**
     * @var array<\SprykerShop\Yves\CheckoutPageExtension\Dependency\Plugin\CheckoutAddressStepEnterPreCheckPluginInterface>
     */
    protected $checkoutAddressStepEnterPreCheckPlugins;

     /**
     * @var array<\Pyz\Yves\CheckoutPage\Plugin\CheckoutOrderNameStepEnterPreCheckPluginInterface>
     */
    protected $checkoutOrderNameStepEnterPreCheckPlugins;
    
      /**
     * @var \SprykerShop\Yves\CheckoutPage\Process\Steps\PostConditionCheckerInterface
     */
    protected $postConditionChecker;

    /**
     * @param \SprykerShop\Yves\CheckoutPage\Process\Steps\StepExecutorInterface $stepExecutor
     * @param \SprykerShop\Yves\CheckoutPage\Process\Steps\PostConditionCheckerInterface $postConditionChecker
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param array $checkoutAddressStepEnterPreCheckPlugins
     * @param array $checkoutOrderNameStepEnterPreCheckPlugins
     */
    public function __construct(
        StepExecutorInterface $stepExecutor,
        PostConditionCheckerInterface $postConditionChecker,
        $stepRoute,
        $escapeRoute,
        array $checkoutAddressStepEnterPreCheckPlugins,
        array $checkoutOrderNameStepEnterPreCheckPlugins,
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->stepExecutor = $stepExecutor;
        $this->postConditionChecker = $postConditionChecker;
        $this->checkoutAddressStepEnterPreCheckPlugins = $checkoutAddressStepEnterPreCheckPlugins;
        $this->checkoutOrderNameStepEnterPreCheckPlugins = $checkoutOrderNameStepEnterPreCheckPlugins;
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(AbstractTransfer $quoteTransfer)
    {
        return parent::preCondition($quoteTransfer);
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $quoteTransfer)
    {
        return $this->executeCheckoutAddressStepEnterPreCheckPlugins($quoteTransfer);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer|\Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer)
    {
        if (!$this->executeCheckoutAddressStepEnterPreCheckPlugins($quoteTransfer) || !$this->executeCheckoutOrderNameStepEnterPreCheckPlugins($quoteTransfer)) {
            return $quoteTransfer;
        }
        $quoteTransfer = $this->stepExecutor->execute($request, $quoteTransfer);
        return $quoteTransfer;
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer)
    {
        return $this->postConditionChecker->check($quoteTransfer);
    }

    /**
     * @return string
     */
    public function getBreadcrumbItemTitle()
    {
        return 'checkout.step.order.details';
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function isBreadcrumbItemEnabled(AbstractTransfer $dataTransfer)
    {
        return $this->postCondition($dataTransfer);
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function isBreadcrumbItemHidden(AbstractTransfer $dataTransfer)
    {
        return !$this->requireInput($dataTransfer);
    }

    /**
     * method to check the initial validation which was used previously for address step
     * @param AbstractTransfer $quoteTransfer
     * @return bool
     */
    protected function executeCheckoutAddressStepEnterPreCheckPlugins(AbstractTransfer $quoteTransfer): bool
    {
        foreach ($this->checkoutAddressStepEnterPreCheckPlugins as $checkoutAddressStepEnterPreCheckPlugin) {
            if (!$checkoutAddressStepEnterPreCheckPlugin->check($quoteTransfer)) {
                return false;
            }
        }

        return true;
    }

    /**
     * method to check the order name field validation
     * @param AbstractTransfer $quoteTransfer
     * @return bool
     */
    protected function executeCheckoutOrderNameStepEnterPreCheckPlugins(AbstractTransfer $quoteTransfer): bool
    {
        foreach ($this->checkoutOrderNameStepEnterPreCheckPlugins as $checkoutOrderNameStepEnterPreCheckPlugin) {
            if (!$checkoutOrderNameStepEnterPreCheckPlugin->check($quoteTransfer)) {
                return false;
            }
        }

        return true;
    }
}
