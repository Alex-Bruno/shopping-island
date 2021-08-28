<?php

namespace App\Form;

use App\Entity\PaymentType as PaymentTypeEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentTypeType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'paymentType.form.name',
                'trim' => true,
                'attr' => array('placeholder' => 'paymentType.form.placeholder.name', 'maxLength' => '30'),
                'required' => true
            ))
            ->add('discount', NumberType::class, array(
                'label' => 'paymentType.form.discount',
                'attr' => array('placeholder' => 'paymentType.form.placeholder.discount', 'class' => 'float-mask', 'maxLength' => '100'),
                'required' => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PaymentTypeEntity::class,
        ]);
    }
}
