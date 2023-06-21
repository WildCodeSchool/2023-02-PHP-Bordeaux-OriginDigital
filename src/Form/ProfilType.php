<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Services\UserServices;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        /*->add('Gerer_mon_abonnement', SubmitType::class, [
                'attr' => [
                    'formaction' => '/subscription.html.twig',
                    ],
            ])*/
            ->add('Resilier_mon_abonnement', SubmitType::class, [
            ])
        ;

        $builder
            ->add('Email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Email',
                ],
            ]);

            $builder
            ->add('Supprimer_mon_compte', SubmitType::class, [
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
