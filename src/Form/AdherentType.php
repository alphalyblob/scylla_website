<?php

namespace App\Form;

use App\Entity\Adherent;
use App\Entity\InfosAdherent;
use App\Entity\MembresEquipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class AdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'Erreur de répétition',
            'options' => [
                'attr' => [
                    'class' => 'sc-form'
                    ]
                ],
            'required' => true,
            'first_options'  => [
                'label' => 'Nouveau mot de passe',
                'label_attr' => [
                    'class' => 'sc-form-label marge-top-1dem'
                ],
                'attr' => [
                    'class' => 'sc-form',
                    'placeholder' => 'Nouveau mot de passe *'
                ],
                
            ],
            'second_options' => [
                'label' => 'Répéter le mot de passe',
                'label_attr' => [
                    'class' => 'sc-form-label marge-top-1dem'
                ],
                'attr' => [
                    'class' => 'sc-form',
                    'placeholder' => 'Répéter *'
                ],
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adherent::class,
        ]);
    }
}
