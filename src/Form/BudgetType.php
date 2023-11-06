<?php

namespace App\Form;

use App\Entity\Budget;
use App\Entity\Libelle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BudgetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', EntityType::class, [
                'class' => Libelle::class,
                'choice_label' => function(Libelle $libelle) {
                    return $libelle->getLibelle();
                }
            ])
            ->add('montant', NumberType::class, [
                'html5' => true,
                'scale' => 2
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Budget::class,
        ]);
    }
}
