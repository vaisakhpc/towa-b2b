<?php

namespace Pyz\Yves\CheckoutPage\Form;

use Pyz\Yves\CheckoutPage\Form\Steps\OrderNameForm;
use SprykerShop\Yves\CheckoutPage\Form\FormFactory as SprykerShopFormFactory;

class FormFactory extends SprykerShopFormFactory
{
/**
	 * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
	 */
	public function createOrderNameFormCollection()
	{
		return $this->createFormCollection($this->getOrderNameFormTypes());
	}

	/**
	 * @return string[]
	 */
	public function getOrderNameFormTypes()
	{
		return [
			$this->getOrderNameForm(),
		];
	}

    /**
	 * @return string
	 */
	public function getOrderNameForm()
	{
		return OrderNameForm::class;
	}
}