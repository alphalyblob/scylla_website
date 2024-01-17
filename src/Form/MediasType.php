<?php

namespace App\Form;

use App\Entity\Cours;
use App\Entity\Evenements;
use App\Entity\Medias;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('chemin')
            ->add('taille')
            ->add('mediaFormat')
            ->add('dateCreation')
            ->add('cours', EntityType::class, [
                'class' => Cours::class,
'choice_label' => 'id',
            ])
            ->add('evenement', EntityType::class, [
                'class' => Evenements::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medias::class,
        ]);
    }
}
