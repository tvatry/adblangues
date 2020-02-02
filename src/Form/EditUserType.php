<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [
                'disabled' => true,
                'label' => 'Nom d\'utilisateur',
            ])

            ->add('roles', ChoiceType::class, [
                'label' => 'Role',
                'choices' => array(
                    'Admin' => '["ROLE_ADMIN"]',
                    'Formateur' => '["ROLE_FORMATEUR"]',

                ),
                'mapped' => false
            ])
            ->add('MODIFIER', SubmitType::class, [
                'attr' => ['class' => 'btn waves-effect blue']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
