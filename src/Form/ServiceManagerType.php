<?php

namespace App\Form;

use App\Entity\ServiceManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceManagerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'name.generic',
                'help' => 'help.name.serviceManager',

            ])
            ->add('email', EmailType::class, [
                'label' => 'email.generic',
                'help' => 'help.email.serviceManager',
            ])
            ->add('phone', NumberType::class, [
                'label' => 'phone.generic',
                'help' => 'help.phone.serviceManager',
            ])
            ->add('activosTecnos')
            ->add('usuario');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ServiceManager::class,
        ]);
    }
}
