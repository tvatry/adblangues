<?php

namespace App\Form;

use App\Entity\Step;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StepType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choicesStep31 = [
            'Pas important'=>'Pas important',
            'Important'=>'Important',
            'Très Important'=>'Très Important'
        ];
        $domains = [
            'Management' => 'Management',
            'Vente & Marketing' => 'Vente & Marketing',
            'Logistique Transport' => 'Logistique Transport',
            'Qualité' => 'Qualité',
            'Voyages' => 'Voyages',
            'Finances' => 'Finances',
            'Production' => 'Production',
            'Achats' => 'Achats',
            'Relations sociales' => 'Relations sociales',
            'Informatique' => 'Informatique',
            'Juridique' => 'Juridique',
            'Commerce' => 'Commerce',
            'Contexte économique' => 'Contexte économique',
            'Ressources humaines' => 'Ressources humaines',
            'Comptabilité' => 'Comptabilité',
            'Technique Industrialisation' => 'Technique Industrialisation',
            'Recherche et développement' => 'Recherche et développement',
            'Autre' => 'Autre',
        ];
        $basicChoices = [
            'Non'=>'Non',
            'Oui'=>'Oui',
        ];
        $builder
            ->add('langage', TextType::class,array(
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('first_name', TextType::class,array(
                'attr' => ['autocomplete' => 'off',
                    'maxlength' => '50',
                    'onkeyup' => "this.value=this.value.replace('@','')"],
            ))
            ->add('last_name', TextType::class,array(
                'attr' => ['autocomplete' => 'off',
                    'maxlength' => '50',
                    'onkeyup' => "this.value=this.value.replace('@','')"],
            ))
            ->add('job_demand',ChoiceType::class,array(
                'choices'  => $basicChoices,
            ))
            ->add('compagny', TextType::class,array(
                'attr' => ['autocomplete' => 'off',
                    'maxlength' => '50'],
            ))
            ->add('phone', TextType::class,array(
                'attr' => ['autocomplete' => 'off',
                    'maxlength' => '10'],
            ))
            ->add('mail', EmailType::class,array(
                'attr' => ['autocomplete' => 'off',
                    'maxlength' => '150'],
            ))
            ->add('service', TextType::class,array(
                'attr' => ['autocomplete' => 'off',
                    'maxlength' => '150'],
            ))
            ->add('place',ChoiceType::class,array(
                'choices'  => [
                    'Amiens' => 'Amiens',
                    'Beauvais' => 'Beauvais',
                    'Compiègne' => 'Compiègne',
                    'Friville' => 'Friville',
                    'Saint-Quentin' => 'Saint-Quentin',
                    'Senlis' => 'Senlis',
                    'Soissons' => 'Soissons',
                ],
                'multiple'  => true,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('cpf',ChoiceType::class,array(
                'choices'  => $basicChoices,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('function', TextType::class,array(
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('context', TextType::class,array(
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('matern',ChoiceType::class,array(
                'choices'  => [
                    'Anglaise' => 'Anglaise',
                    'Américaine' => 'Américaine',
                    'Allemande' => 'Allemande',
                    'Espagnole' => 'Espagnole',
                    'Autre' => 'Autre',
                ],
                'multiple'  => false,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('matern_precise', TextType::class,array(
                'attr' => ['autocomplete' => 'off',
                    'maxlength' => '50'],
            ))
            ->add('visitors',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('visitors_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete' => 'off'],
            ))
            ->add('reseign_tel',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('reseign_tel_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete' => 'off'],
            ))
            ->add('conv_tel',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('conv_tel_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete'=>'off'],
            ))
            ->add('visio',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('visio_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete' => 'off'],
            ))
            ->add('reunion_trav',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('reunion_trav_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete' => 'off'],
            ))
            ->add('cond_reunion_trav',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('cond_reunion_trav_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete' => 'off'],
            ))
            ->add('reunion_trav_client',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('reunion_trav_client_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete' => 'off'],
            ))
            ->add('presentation',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('presentation_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete' => 'off'],
            ))
            ->add('negoc',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('negoc_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete' => 'off'],
            ))
            ->add('train_action',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('train_action_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete' => 'off'],
            ))
            ->add('depl_pro',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('depl_pro_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete'=>'off'],
            ))
            ->add('cont_soc',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('cont_soc_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete'=>'off'],
            ))
            ->add('exp_oral_autre',ChoiceType::class,array(
                'choices'  => [
                    'Pas important'=>'Pas important',
                    'Important'=>'Important',
                    'Très Important'=>'Très Important'
                ],
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('exp_oral_autre_prec',TextType::class, array(
                'required' => false,
                'empty_data' => ' ',
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('exp_oral_autre_prec_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete'=>'off'],
            ))
            ->add('comp_ecr_mail',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('comp_ecr_mail_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete'=>'off'],
            ))
            ->add('courriers',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('courriers_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete'=>'off'],
            ))
            ->add('comptes_rendus',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('comptes_rendus_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete'=>'off'],
            ))
            ->add('comptes_rendus_ext',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('comptes_rendus_ext_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete'=>'off'],
            ))
            ->add('doc_spe',ChoiceType::class,array(
                'choices'  => $choicesStep31,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('doc_spe_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete'=>'off'],
            ))
            ->add('exp_ecr_autre',ChoiceType::class,array(
                'choices'  => [
                    'Pas important'=>'Pas important',
                    'Important'=>'Important',
                    'Très Important'=>'Très Important'
                ],
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('exp_ecr_autre_prec',TextType::class, array(
                'required' => false,
                'empty_data' => ' ',
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('exp_ecr_autre_prec_prio',CheckboxType::class, array(
                'required' => false,
                'data' => false,
                'attr' => ['class' => 'checkbox-4-limit', 'autocomplete'=>'off'],
            ))
            ->add('domain',ChoiceType::class,array(
                'choices'  => $domains,
                'multiple'  => true,
                'attr' => ['autocomplete' => 'off'],
            ))
            ->add('domain_prec', TextType::class, array(
                'required' => false,
                'empty_data' => ' ',
                'attr' => ['autocomplete' => 'off',
                    'maxlength' => '100'],
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Step::class,
        ]);
    }
}
