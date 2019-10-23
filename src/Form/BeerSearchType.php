<?php

namespace App\Form;

use app\Entity\BeerSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BeerSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('type', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'bières blanches' => 'bières blanches',
                    'bières blondes' => 'bières blondes',
                    'bières ambrées' => 'bières ambrées',
                    'bières brunes' => 'bières brunes',
                ]
            ])
            ->add('brewery')
            ->add('city')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BeerSearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
