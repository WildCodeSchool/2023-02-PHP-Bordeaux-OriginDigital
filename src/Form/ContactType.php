<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
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
                'attr' => [
                    'class' => 'form-control col-6 rounded-0 mb-3',
                    'placeholder' => 'Veuillez entrer votre E-mail',
                ],
                'label' => 'E-mail',
                'constraints' => [
                    new NotBlank(['message' => 'L\'adresse e-mail est requise.']),
                    new Email(['message' => 'L\'adresse e-mail n\'est pas valide.']),
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
            ->add('Contenu', TextareaType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
                'attr' => [
                    'placeholder' => 'Votre message',
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
