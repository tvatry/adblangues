<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Locations;
use App\Repository\LocationsRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['onkeyup' => "this.value=this.value.replace('@','')"],
            ])
            ->add('first_name', TextType::class, [
                'attr' => ['onkeyup' => "this.value=this.value.replace('@','')"],
            ])
            ->add('mail',EmailType::class)
            ->add('location', EntityType::class, [
                'class' => Locations::class,
                'query_builder' => function (LocationsRepository $locations) {
                    return $locations->createQueryBuilder('location')
                        ->orderBy('location.name', 'ASC');
                },
                'choice_label' => 'name'
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
