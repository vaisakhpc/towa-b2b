<?php

namespace Pyz\Yves\CheckoutPage\Form\Steps;

use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class OrderNameForm extends AbstractType
{
	const FIELD_ID_ORDER_NAME = 'order-name';
	const ORDER_NAME_PROPERTY_PATH = 'orderName';

	/**
	 * @return string
	 */
	public function getBlockPrefix()
	{
		return 'orderNameForm';
	}

	/**
	 * @param \Symfony\Component\Form\FormBuilderInterface $builder
	 * @param array $options
	 *
	 * @return $this
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add(self::FIELD_ID_ORDER_NAME, TextType::class, [
			'required' => true,
			'property_path' => static::ORDER_NAME_PROPERTY_PATH,
			'constraints' => [
				new NotBlank(),
			],
			'label' => 'checkout.step.order.details.name.label',
		]);

		return $this;
	}
}