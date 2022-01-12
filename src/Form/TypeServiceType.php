<?php

namespace App\Form;

use App\Entity\TypeService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'name.generic',
                'help' =>'help.name.typeService'
            ])
            ->add('description', TextType::class,[
                'label'=>'label.description',
                'help' =>'help.description.typeService'
            ])
            ->add('activosTecnos')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypeService::class,
        ]);
    }
}
