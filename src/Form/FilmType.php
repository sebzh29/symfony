<?php

namespace App\Form;

use App\Entity\Film;
use App\Entity\Actor;
use App\Entity\Directors;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            // ->add('affiche')
            ->add('actors' , EntityType::class , [
                'mapped' => true,
                'multiple' => true,
                'class' => Actor::class,
                'choice_label' => 'nom',
                'label' => 'Acteur' 
            ])
            ->add('directors' , EntityType::class , [
                'mapped' => true,
                'multiple' => true,
                'class' => Directors::class,
                'choice_label' => 'nom',
                'label' => 'Directeur' 
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
