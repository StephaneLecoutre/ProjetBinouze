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
            ->add('name', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Anosteke blonde' => 'Anosteke blonde',
                    'Bellus de printemps' => 'Bellus de printemps',
                    'Bellus d’Oût' => 'Bellus d’Oût',
                    'Bracine amber ale' => 'Bracine amber ale',
                    'Bracine Pale ale' => 'Bracine Pale ale',
                    'Bracine tripel' => 'Bracine tripel',
                    'Enfer du Nord' => 'Enfer du Nord',
                    'Jade Blonde tradition' => 'Jade Blonde tradition',
                    'La Bellotte Blonde' => 'La Bellotte Blonde',
                    'La Blonde d’antan' => 'La Blonde d’antan',
                    'La Choulette ambrée' => 'La Choulette ambrée',
                    'La Choulette Brune' => 'La Choulette Brune',
                    'La G de Goudale Rhum finish' => 'La G de Goudale Rhum finish',
                    'La Goudale blonde' => 'La Goudale blonde',
                    'La Linselloise blonde' => 'La Linselloise blonde',
                    'Lyderic' => 'Lyderic',
                    'Léonce d’Armentières ambrée' => 'Léonce d’Armentières ambrée',
                    'Léonce d’Armentières blanche' => 'Léonce d’Armentières blanche',
                    'Moulins d’Ascq ambrée' => 'Moulins d’Ascq ambrée',
                    'Moulins d’Ascq blonde' => 'Moulins d’Ascq blonde',
                    'Moulins d’Ascq Printemps' => 'Moulins d’Ascq Printemps',
                    'Moulins d’Ascq triple' => 'Moulins d’Ascq triple',
                    'PVL Solstice' => 'PVL Solstice',
                    'Triplus' => 'Triplus',
                    'Val des cygnes' => 'Val des cygnes',

                ]
            ])
            ->add('type', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'bières blanches' => 'bières blanches',
                    'bières blondes' => 'bières blondes',
                    'bières ambrées' => 'bières ambrées',
                    'bières brunes' => 'bières brunes',
                ]
            ])
            ->add('brewery', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Brasserie du Pays Flamand' => 'Brasserie du Pays Flamand',
                    'Ferme brasserie de Beaumont' => 'Ferme brasserie de Beaumont',
                    'SARL Christophe Noyon Brasseur' => 'SARL Christophe Noyon Brasseur',
                    'Brasserie TERRE ET TRADITION sarl' => 'Brasserie TERRE ET TRADITION sarl',
                    'Brasserie Castelain' => 'Brasserie Castelain',
                    'EARL Ferme des peupliers' => 'EARL Ferme des peupliers',
                    'L\'Atelier des Brasseurs' => 'L\'Atelier des Brasseurs',
                    'Brasserie La Choulette' => 'Brasserie La Choulette',
                    'Brasserie Goudale' => 'Brasserie Goudale',
                    'Brasserie Lilloise' => 'Brasserie Lilloise',
                    'Brasserie Malécot' => 'Brasserie Malécot',
                    'Brasserie Moulins d\'Ascq' => 'Brasserie Moulins d\'Ascq',
                    'Brasserie du Pavé' => 'Brasserie du Pavé',
                ]
            ])
            ->add('city', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Blaringhem' => 'Blaringhem',
                    'Hordain' => 'Hordain',
                    'Arques' => 'Arques',
                    'Armentières' => 'Armentières',
                    'Villeneuve d\'Ascq' => 'Villeneuve d\'Ascq',
                    'Hénin Beaumont' => 'Hénin Beaumont',
                    'Tardinghen' => 'Tardinghen',
                    'Querenaing' => 'Querenaing',
                    'Bénifontaine' => 'Bénifontaine',
                    'Lacouture' => 'Lacouture',
                    'Linselles' => 'Linselles',
                    'Roncq' => 'Roncq',
                    'Ennevelin' => 'Ennevelin',
                    'Hordain' => 'Hordain',
                ]
            ])
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
