<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Checkout\Process\Steps;

use Codeception\Test\Unit;
use Symfony\Component\HttpFoundation\Request;
use Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep;
use Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep\OrderNameStepExecutor;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep\OrderNamePostCondition;
use SprykerShop\Yves\CheckoutPageExtension\Dependency\Plugin\CheckoutAddressStepEnterPreCheckPluginInterface;
use Pyz\Yves\CheckoutPage\Plugin\CheckoutOrderNameStepEnterPreCheckPluginInterface;
use Pyz\Client\Checkout\CheckoutClientInterface;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Yves
 * @group Checkout
 * @group Process
 * @group Steps
 * @group OrderNameStepTest
 * Add your own group annotations below this line
 */
class OrderNameStepTest extends Unit
{
    /**
     * @return void
     */
    public function testOrderNameStepObjectInitialization(): void
    {
        $obj = $this->createOrderNameStep();
        $this->assertInstanceOf(OrderNameStep::class, $obj);
    }

    /**
     * @return void
     */
    public function testIfOrderNamePreConditionReturnsTrue()
    {
        $methodsToMock = [
            'isCartEmpty' => false,
        ];
        $obj = $this->createOrderNameStep(true, $methodsToMock);

        $this->assertTrue($obj->preCondition($this->getSampleTransfer()));
    }

    /**
     * @return void
     */
    public function testIfRequireInputReturnsTrue()
    {
        $obj = $this->createOrderNameStep();
        $this->assertTrue($obj->requireInput($this->getSampleTransfer()));
    }

    /**
     * @return void
     */
    public function testIfRequireInputReturnsFalse()
    {
        $obj = $this->createOrderNameStep(false, [], [false, true]);
        $this->assertFalse($obj->requireInput($this->getSampleTransfer()));
    }

    /**
     * @return void
     */
    public function testIfExecuteMethodRunsSuccessfullyWithoutErrors()
    {
        $obj = $this->createOrderNameStep();
        $this->assertNotEmpty($obj->execute($this->createRequest(), $this->getSampleTransfer()));
        $this->assertInstanceOf(QuoteTransfer::class, $obj->execute($this->createRequest(), $this->getSampleTransfer()));
    }

    /**
     * @return void
     */
    public function testIfExecuteMethodRunsWithErrors()
    {
        $obj = $this->createOrderNameStep(false, [], [false, true]);
        $this->assertNotEmpty($obj->execute($this->createRequest(), $this->getSampleTransfer()));
        $this->assertInstanceOf(QuoteTransfer::class, $obj->execute($this->createRequest(), $this->getSampleTransfer()));
    }

    /**
     * @return void
     */
    public function testIfExecuteMethodRunsWithErrorsBecauseOfFailureInOrderNameStepEnterPlugin()
    {
        $obj = $this->createOrderNameStep(false, [], [true, false]);
        $this->assertNotEmpty($obj->execute($this->createRequest(), $this->getSampleTransfer()));
        $this->assertInstanceOf(QuoteTransfer::class, $obj->execute($this->createRequest(), $this->getSampleTransfer()));
    }

    /**
     * @return void
     */
    public function testPostConditionReturnsTrue()
    {
        $obj = $this->createOrderNameStep();
        $this->assertTrue($obj->postCondition($this->getSampleTransfer()));
    }

    /**
     * @return void
     */
    public function testPostConditionReturnsFalse()
    {
        $obj = $this->createOrderNameStep();
        $this->assertFalse($obj->postCondition($this->getSampleTransfer(false)));
    }

    /**
     * @return void
     */
    public function testGetBreadcrumbItemTitleReturnsValidString()
    {
        $obj = $this->createOrderNameStep();
        $this->assertEquals('checkout.step.order.details', $obj->getBreadcrumbItemTitle());
    }

    /**
     * @return void
     */
    public function testIsBreadcrumbItemEnabledReturnsTrue()
    {
        $obj = $this->createOrderNameStep();
        $this->assertTrue($obj->isBreadcrumbItemEnabled($this->getSampleTransfer()));
    }

    /**
     * @return void
     */
    public function testIsBreadcrumbItemHiddenReturnsFalse()
    {
        $obj = $this->createOrderNameStep();
        $this->assertFalse($obj->isBreadcrumbItemHidden($this->getSampleTransfer()));
    }

    protected function getSampleTransfer(string $name = 'order-name')
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setOrderName($name);
        return $quoteTransfer;
    }

    protected function getMockedObject(string $class, $methods, $disableConstructor = true)
    {
        $mockObject = $this->getMockBuilder($class)->onlyMethods(array_keys($methods));
        if ($disableConstructor) {
            $mockObject = $mockObject->disableOriginalConstructor();
        }
        $mockObject = $mockObject->getMock();
        foreach ($methods as $key => $value) {
            $mockObject->method($key)->willReturn($value);
        }
        return $mockObject;
    }

    /**
     *
     * @return \Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep
     */
    protected function createOrderNameStep(bool $mocked = false, array $methods = [], array $pluginReturn = [true, true]): OrderNameStep
    {
        if ($mocked) {
            return $this->getMockedObject(OrderNameStep::class, $methods);
        }
        return new OrderNameStep(
            $this->stepExecutorObject(),
            $this->stepPostConditionCheckObject(),
            'checkout-order-name',
            'home',
            $this->getCheckoutAddressStepEnterPreCheckPluginObjects($pluginReturn[0]),
            $this->getCheckoutOrderNameStepEnterPreCheckPluginObjects($pluginReturn[1]),
        );
    }

    protected function stepExecutorObject()
    {
        $mockObject = $this->createMock(CheckoutClientInterface::class);
        $mockObject->method('saveOrderName')
            ->willReturnSelf();
        return new OrderNameStepExecutor($mockObject);
    }

    protected function stepPostConditionCheckObject()
    {
        return new OrderNamePostCondition();
    }

    protected function getCheckoutAddressStepEnterPreCheckPluginObjects($return = true): array
    {
        $mockObject = $this->createMock(CheckoutAddressStepEnterPreCheckPluginInterface::class);
        $mockObject->method('check')
            ->willReturn($return);
        return [
            $mockObject
        ];
    }

    protected function getCheckoutOrderNameStepEnterPreCheckPluginObjects($return = true): array
    {
        $mockObject = $this->createMock(CheckoutOrderNameStepEnterPreCheckPluginInterface::class);
        $mockObject->method('check')
            ->willReturn($return);
        return [
            $mockObject
        ];
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function createRequest(): Request
    {
        return Request::createFromGlobals();
    }
}
