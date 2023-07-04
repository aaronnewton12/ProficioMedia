<?php

namespace App\Form\Type;

use App\Entity\BusinessValuation;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FinishBusinessValuationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('phone_number')
            ->add('email_address')
            ->add('year_established')
            ->add('company_name')
            ->add('business_sector', ChoiceType::class, array(
                'choices' => BusinessValuation::getBusinessSectorChoices()
            ))
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
