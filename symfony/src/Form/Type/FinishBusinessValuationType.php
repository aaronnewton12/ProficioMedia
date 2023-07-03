<?php

namespace App\Form\Type;

use App\Entity\BusinessValuation;

use Client\AppBundle\Entity\Business;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FinishBusinessValuationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('business_sector')
            ->add('reason_for_valuation')
            ->add('tenure')
            ->add('annual_turnover')
            ->add('net_profit')
            ->add('assets_value')
            ->add('business_postcode')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BusinessValuation::class,
        ]);
    }
}
