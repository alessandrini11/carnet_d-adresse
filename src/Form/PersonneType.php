<?php

namespace App\Form;

use App\Entity\Personne;
use App\Entity\Sexe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                'label' => false
            ])
            ->add('prenom',TextType::class,[
                'label' => false
            ])
            ->add('dateNaissance',DateType::class,[
                'widget' => 'single_text',
                'label' => false
            ])
            ->add('email',EmailType::class,[
                'label' => false
            ])
            ->add('numeroFixe',IntegerType::class,[
                'label' => false
            ])
            ->add('numeroPortable',IntegerType::class,[
                'label' => false
            ])
            ->add('sexe',EntityType::class,[
                'class' => Sexe::class,
                'choice_label' => 'nom',
                'expanded' => true,
                'label' => false

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
