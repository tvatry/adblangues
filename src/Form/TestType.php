<?php

namespace App\Form;

use App\Entity\Language;
use App\Entity\Test;
use App\Repository\LanguageRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('testName')
            ->add('isOn', CheckboxType::class, [
                'label' => 'Désactivé',
                'required' => false,
            ])
            ->add('language', EntityType::class, [
                'class' => Language::class,
                'query_builder' => function (LanguageRepository $language) {
                    return $language->createQueryBuilder('language')
                        ->orderBy('language.name', 'ASC');
                },
                'choice_label' => 'name'
            ])
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Test::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'task_item',
        ]);
    }
}
