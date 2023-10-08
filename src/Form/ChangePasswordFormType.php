<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\PasswordStrength;

class ChangePasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPasswordCurrent', PasswordType::class,[
                'mapped' => false,
                'label' => 'Mot de passe actuel',
                'required' => false,
                'constraints' => new UserPassword([
                    'message' => 'Mot de passe actuel incorrect',
                ]),
                'attr' => [
                    'placeholder' => 'Mot de passe actuel'
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'options' => [
                    'attr' => [
                        'autocomplete' => 'new-password',
                    ],
                ],
                'first_options' => [
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Saisissez un mot de passe',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Votre mot de passe doit contenir au minimum {{ limit }} caractères',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                        new PasswordStrength([
                            'minScore' => PasswordStrength::STRENGTH_WEAK,
                            'message' => 'Mot de passe trop simple',
                        ])
                    ],
                    'label' => 'Nouveau mot de passe',
                    'attr' => [
                        'placeholder' => 'Nouveau mot de passe',
                    ],
                    'row_attr' => [
                        'class' => 'form-floating',
                    ],
                ],
                'second_options' => [
                    'label' => 'Répétez le mot de passe',
                    'attr' => [
                        'placeholder' => 'Nouveau mot de passe',
                    ],
                    'row_attr' => [
                        'class' => 'form-floating',
                    ],
                ],
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
                // Instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
