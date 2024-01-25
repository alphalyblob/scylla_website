<?php

namespace App\Form;


use App\Entity\Adherent;
use App\Entity\InfosAdherent;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class InfosAdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'sc-form'
                ],
                'required' => false,
                'label' => 'NOM',
                'label_attr' => [
                    'class' => 'sc-form-label marge-top-1dem'
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'sc-form'
                ],
                'required' => false,
                'label' => 'PRENOM',
                'label_attr' => [
                    'class' => 'sc-form-label marge-top-1dem'
                ]
            ])
            ->add('telephone', TextType::class, [
                'attr' => [
                    'class' => 'sc-form'
                ],
                'required' => false,
                'label' => 'TELEPHONE',
                'label_attr' => [
                    'class' => 'sc-form-label marge-top-1dem'
                ]
            ])
            ->add('adresse', TextType::class, [
                'attr' => [
                    'class' => 'sc-form'
                ],
                'required' => false,
                'label' => 'ADRESSE',
                'label_attr' => [
                    'class' => 'sc-form-label marge-top-1dem'
                ]
            ])
            ->add('dateNaissance', BirthdayType::class, [
                'attr' => [
                    'class' => 'sc-form'
                ],
                'required' => false,
                'label' => 'DATE DE NAISSANCE',
                'label_attr' => [
                    'class' => 'sc-form-label marge-top-1dem'
                ]
            ])
            ->add('pratique', TextType::class, [
                'attr' => [
                    'class' => 'sc-form'
                ],
                'required' => false,
                'label' => 'PRATIQUE',
                'label_attr' => [
                    'class' => 'sc-form-label marge-top-1dem'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InfosAdherent::class,
        ]);
    }
}
