<?php

namespace App\Form;

use App\Entity\ActivosTecnos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActivosTecnosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('urlweb')
            ->add('plan')
            ->add('expirationAt')
            ->add('type')
            ->add('usedProvider')
            ->add('responsable')
            ->add('dataServe')
            ->add('isPublicView')
            ->add('needTo')
            ->add('activosTecnos')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ActivosTecnos::class,
        ]);
    }
}
