<?php

namespace App\Form;

use App\Entity\Bicycle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BicycleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Maker')
            ->add('Specifications')
            ->add('Price')
            ->add('NumberOfGears')
            ->add('WheelDiameter')
            ->add('PedalRpm')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bicycle::class,
        ]);
    }
}
