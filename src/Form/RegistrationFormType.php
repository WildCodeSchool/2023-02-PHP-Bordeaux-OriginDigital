<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control col-6 rounded-0 mb-3',
                    'placeholder' => 'Veuillez entrer votre E-mail',
                ],
                'label' => 'E-mail',
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'form-control col-6 rounded-0 mb-3',
                    'placeholder' => 'Veuillez entrer votre Prénom',
                ],
                'label' => 'Prénom',

            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'form-control col-6 rounded-0 mb-3',
                    'placeholder' => 'Veuillez entrer votre Nom',
                ],
                'label' => 'Nom',

            ])
            ->add('date_of_birth', DateType::class, [
                'attr' => [
                    'class' => 'form-control col-6 rounded-0 mb-3 datepicker',
                    'data-provide' => 'datepicker'
                ],
                'widget' => 'single_text',
                'label' => 'Date de naissance',

            ])
            ->add('RGPDConsent', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les termes du contrat.',
                    ]),
                ],
                'label' => 'J\'accepte les Conditions Générales d\'Utilisation et reconnais avoir été informé que mes
                 données personnelles seront utilisées tel que décrit ci-dessous et détaillé dans la Politique de
                 protection des données personnelles * du site Wild Sports',
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'first_options' => [
                    'attr' => [
                        'class' => 'form-control col-6 rounded-0 mb-1',
                        'autocomplete' => 'new-password',
                        'placeholder' => 'Veuillez entrer un mot de passe',
                    ],
                    'label' => 'Mot de passe'
                ],
                'second_options' => [
                    'attr' => [
                        'class' => 'form-control col-6 rounded-0 mb-2',
                        'autocomplete' => 'new-password',
                        'placeholder' => 'Veuillez confirmer le mot de passe',
                    ],
                    'label' => 'Confirmation du mot de passe'
                ],
                'invalid_message' => 'Les champs du mot de passe doivent correspondre.',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez rentrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit avoir au minimum {{ limit }} caractères.',
                        'max' => 4096,
                    ]),
                ],
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
