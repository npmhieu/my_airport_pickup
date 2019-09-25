<?php

namespace AppBundle\Form;


use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class UserForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {

    $builder
      ->add(
        'fullname',
        TextType::class,
        array(
          'label' => 'Full Name:',
          'attr' => array('class' => 'col-sm-8 form-control'),
          'label_attr' => array('class' => 'col-sm-4 col-form-label'),
        )
      )
      ->add(
        'email',
        TextType::class,
        array(
          'label' => "Email:",
          'attr' => array('class' => 'col-sm-8 form-control'),
          'label_attr' => array('class' => 'col-sm-4 col-form-label'),
          'required' => true,
        )
      )
      ->add(
        'phone',
        TextType::class,
        array(
          'label' => "Phone:",
          'attr' => array('class' => 'col-sm-8 form-control arrive-date'),
          'label_attr' => array('class' => 'col-sm-4 col-form-label'),
          'required' => true,
        )
      )

      ->add(
        'password',
        PasswordType::class,
        array(
          'label' => "Password:",
          'attr' => array('class' => 'col-sm-8 form-control'),
          'label_attr' => array('class' => 'col-sm-4 col-form-label'),
          'required' => true,
        )
      )

      ->add(
        'repeatPassword',
        PasswordType::class,
        array(
          'label' => "Repeat Password:",
          'attr' => array('class' => 'col-sm-8 form-control'),
          'label_attr' => array('class' => 'col-sm-4 col-form-label'),
          'required' => true,
        )
      )

      ->add(
        'register',
        SubmitType::class,
        array(
          'label' => 'Create Account',
          'attr' => array('class' => 'btn btn-primary mt-3'),
        )
      );
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(
      array(
        'data-class' => User::class,
      )
    );
  }

  public function getName()
  {
    return 'create_User';
  }
}
