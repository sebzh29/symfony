<?php

namespace App\Form;

use App\Entity\Actor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ActorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('photoFile' , VichImageType::class,[
            'required'=>false,
            'allow_delete' => false,
            'delete_label' => 'Delete ',
            'download_label' => 'Download',
            'download_uri' => false,
            'image_uri' => false,
            // 'imagine_pattern' => '...',
            'asset_helper' => true,
            'label' => "Photo de l'acteur"
        ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actor::class,
        ]);
    }
}
