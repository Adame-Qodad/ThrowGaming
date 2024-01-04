<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegistrationFormType extends AbstractType
{
    private $tInput = "w-full p-1 rounded border border-slate-300";
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                "attr"=>[
                    "class"=>$this->tInput,
                ]
            ])
            ->add('prenom', TextType::class, [
                "attr"=>[
                    "class"=>$this->tInput,
                ]
            ])
            ->add('adresse', TextType::class, [
                "attr"=>[
                    "class"=>$this->tInput,
                ]
            ])
            ->add('ville', TextType::class, [
                "attr"=>[
                    "class"=>$this->tInput,
                ]
            ])
            ->add('cp', TextType::class, [
                "attr"=>[
                    "class"=>$this->tInput,
                ]
            ])
            ->add('tel', TextType::class, [
                "attr"=>[
                    "class"=>$this->tInput,
                ]
            ])
            ->add('email', TextType::class, [
                "attr"=>[
                    "class"=>$this->tInput,
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
