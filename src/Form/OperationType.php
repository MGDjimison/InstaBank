<?php

namespace App\Form;

use App\Entity\Operation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OperationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('montant', NumberType::class, [
                'html5' => true,
                'scale' => 2
            ])
            ->add('compte')
            ->add('budget', EntityType::class, [

            ])
            ->add('type', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'Dépôt' => 'Dépôt',
                    'Retrait' => 'Retrait',
                    'Prélèvement' => 'Prélèvement',
                    'Virement interne' => 'Virement interne',
                    'Virement externe' => 'Virement externe'
                ],
                'expanded' => false,
                'multiple' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Operation::class,
        ]);
    }
}
