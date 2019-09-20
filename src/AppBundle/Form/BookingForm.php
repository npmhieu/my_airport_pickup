<?php

namespace AppBundle\Form;


use AppBundle\Entity\Booking;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BookingForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $date = new \DateTime();
    if ( $options['data']->getArriveDate() ) {
      $date = $options['data']->getArriveDate();
    }

    $builder
      ->add(
        'fromAirport',
        TextType::class,
        array(
          'label' => 'From Airport:',
          'attr' => array('class' => 'col-md-10 form-control'),
          'label_attr' => array('class' => 'col-md-2 col-form-label'),
        )
      )
      ->add(
        'toDestination',
        TextType::class,
        array(
          'label' => "To Destination:",
          'attr' => array('class' => 'col-md-10 form-control'),
          'label_attr' => array('class' => 'col-md-2 col-form-label'),
          'required' => true,
        )
      )
      ->add(
        'arriveDate',
        TextType::class,
        array(
          'data' => $date->format('d/m/Y'),
          'label' => "Arrive Date:",
          'attr' => array('class' => 'col-md-10 form-control arrive-date'),
          'label_attr' => array('class' => 'col-md-2 col-form-label'),
          'required' => true,
        )
      )

      ->add(
        'numberPassengers',
        TextType::class,
        array(
          'label' => "Number Passengers:",
          'attr' => array('class' => 'col-md-10 form-control'),
          'label_attr' => array('class' => 'col-md-2 col-form-label'),
          'required' => true,
        )
      )

      ->add(
        'numberLuggages',
        TextType::class,
        array(
          'label' => "Number Luggages:",
          'attr' => array('class' => 'col-md-10 form-control'),
          'label_attr' => array('class' => 'col-md-2 col-form-label'),
          'required' => true,
        )
      )

      ->add(
        'numberSeats',
        TextType::class,
        array(
          'label' => "Number Seats:",
          'attr' => array('class' => 'col-md-10 form-control'),
          'label_attr' => array('class' => 'col-md-2 col-form-label'),
          'required' => true,
        )
      )

      ->add(
        'price',
        NumberType::class,
        array(
          'label' => "Price:",
          'attr' => array('class' => 'col-md-10 form-control', 'min' => 1),
          'label_attr' => array('class' => 'col-md-2 col-form-label'),
          'required' => true,
        )
      )


      ->add(
        'save',
        SubmitType::class,
        array(
          'label' => 'Save',
          'attr' => array('class' => 'col-md-1 btn btn-primary mt-3'),
        )
      );
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(
      array(
        'data-class' => Booking::class,
      )
    );
  }

  public function getName()
  {
    return 'create_booking';
  }
}
