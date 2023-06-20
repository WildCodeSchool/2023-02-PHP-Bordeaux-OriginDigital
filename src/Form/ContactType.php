<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Prenom', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
                'attr' => [
                    'placeholder' => 'Prenom',
                    'class' => 'ws-contact-fields'
                ],
            ])
            ->add('Nom', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'ws-contact-fields'
                ],
            ])
            ->add('Email', EmailType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'ws-contact-fields'
                ],
            ])
            ->add('Sujet', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
                'attr' => [
                    'placeholder' => 'Sujet',
                    'class' => 'ws-contact-fields'
                ],
            ])
            ->add('Contenu', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
                'attr' => [
                    'placeholder' => 'Contenu',
                    'class' => 'ws-contact-contenu-fields'
                ],
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => [
                    'class' => 'ws-contact-btn ws-yellow-btn ws-yellow-btn:hover'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
