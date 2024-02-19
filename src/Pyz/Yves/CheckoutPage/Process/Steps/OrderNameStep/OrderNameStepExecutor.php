<?php

namespace Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep;

use SprykerShop\Yves\CheckoutPage\Process\Steps\StepExecutorInterface;
use Generated\Shared\Transfer\QuoteTransfer;
use Symfony\Component\HttpFoundation\Request;
use Pyz\Client\Checkout\CheckoutClientInterface;

class OrderNameStepExecutor implements StepExecutorInterface
{
    /**
     * @var \Pyz\Client\Checkout\CheckoutClientInterface
     */
    protected $checkoutClient;
    
    public function __construct(CheckoutClientInterface $checkoutClient)
    {
        $this->checkoutClient = $checkoutClient;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer): QuoteTransfer
    {
        if ($quoteTransfer->isPropertyModified(QuoteTransfer::ORDER_NAME)) {
            $this->checkoutClient->saveOrderName($quoteTransfer);
        }
        return $quoteTransfer;
    }
}