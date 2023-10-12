<?php

namespace App\Form;

use App\Entity\Electeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElecteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Anarana'])
            ->add('firstname', TextType::class, ['label' => 'Fanampiny'])
            ->add('birth_place', TextType::class, ['label' => 'Toerana nahaterahana'])
            ->add('birthday', DateTimeType::class, ['label' => 'Daty nahaterahana', 'input' => 'datetime_immutable',
            ])
            ->add('sign', TextType::class, ['label' => 'Famantarana'])
            ->add('cin_number', TextType::class, ['label' => 'Laharana Karapanondro'])
            ->add('address', TextType::class, ['label' => 'Adiersy'])
            ->add('father_name', TextType::class, ['label' => "Anaran'ny ray"])
            ->add('mother_name', TextType::class, ['label' => "Anaran'ny reny"]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Electeur::class,
        ]);
    }
}
