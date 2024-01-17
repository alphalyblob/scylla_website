<?php

namespace App\Form;

use App\Entity\Evenements;
use App\Entity\ParticipantsEvenements;
use App\Entity\TypeEvenement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('descriptif')
            ->add('date')
            ->add('commentaire')
            ->add('typeEvenement', EntityType::class, [
                'class' => TypeEvenement::class,
'choice_label' => 'id',
            ])
            ->add('participantsEvenements', EntityType::class, [
                'class' => ParticipantsEvenements::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenements::class,
        ]);
    }
}
