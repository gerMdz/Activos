<?php

namespace App\Form;

use App\Entity\ServerData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServerDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'label'=>'name.generic',
                'help'=>'help.name.server-data'
            ])
            ->add('summary', TextareaType::class, [
                'label'=>'label.summary',
                'help'=>'help.summary.server-data'
            ])
            ->add('datauser', TextType::class,[
                'label'=>'label.datauser',
                'help'=>'help.datauser.server-data'
            ])
            ->add('datapass', PasswordType::class, [
                'label'=>'label.datapass',
                'help' => 'help.datapass.server-data',
                'attr'=>[
                    'class'=>'hide-pass'
                ]
            ])
//            ->add('toggle-pass', CheckboxType::class, [
//                'mapped'=>false,
//                'attr'=>[
//                    'onclick'=>'TogglePass()'
//                ]
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ServerData::class,
        ]);
    }
}
