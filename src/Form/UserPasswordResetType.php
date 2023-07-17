<?php

namespace App\Form;

use Symfony\Component\DomCrawler\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class UserPasswordResetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'attr' => [
                        'class' => 'ws-contact-fields'
                    ],
                    'label' => 'Mot de passe',
                    'label_attr' => [
                        'class' => ' mt-4'
                    ]
                ],
                'second_options' => [
                    'attr' => [
                        'class' => 'ws-contact-fields'
                    ],
                    'label' => 'Confirmation du mot de passe',
                    'label_attr' => [
                        'class' => '  mt-4'
                    ]
                ],
                'invalid_message' => 'Les mots de passe ne correspondent pas.'
            ])

            ->add('newPassword', PasswordType::class, [
                'attr' => [
                    'class' => 'ws-contact-fields'
                ],
                'label' => 'Nouveau mot de passe',
                'label_attr' => [
                    'class' => 'mt-4'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Le champ doit contenir au moins 6 caractères.',
                    ]),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'ws-blue-btn mt-5 ws-btn-password'
                ],
                'label' => 'Changer le mot de passe.'
            ]);
    }
}
