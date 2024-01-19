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
            'options' => ['attr' => ['class' => '']],
            'required' => true,
            'first_options'  => [
                'label' => 'Nouveau mot de passe',
                'attr' => ['class' => 'form-field mdp-field'],
            ],
            'second_options' => [
                'label' => 'Répéter le mot de passe',
                'attr' => ['class' => 'form-field mdp-field'],
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
