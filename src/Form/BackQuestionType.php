<?php

namespace App\Form;

use App\Entity\Question;
use App\Entity\Test;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BackQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('wording', TextType::class, [
                'label' => 'Question'
            ])
            ->add('answer1', TextType::class, [
                'label' => 'Réponse 1'
            ])
            ->add('isConnected1', CheckboxType::class, [
                'label' => false,
                'required' => false
            ])
            ->add('answer2', TextType::class, [
                'label' => 'Réponse 2'
            ])
            ->add('isConnected2', CheckboxType::class, [
                'label' => false,
                'required' => false
            ])
            ->add('answer3', TextType::class, [
                'label' => 'Réponse 3',
                'required' => false
            ])
            ->add('isConnected3', CheckboxType::class, [
                'label' => false,
                'required' => false
            ])
            ->add('answer4', TextType::class, [
                'label' => 'Réponse 4',
                'required' => false
            ])
            ->add('isConnected4', CheckboxType::class, [
                'label' => false,
                'required' => false
            ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }
}
