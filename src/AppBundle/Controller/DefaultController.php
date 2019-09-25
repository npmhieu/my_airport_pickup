<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class DefaultController extends Controller
{
  /**
   * @Route("/", name="homepage")
   */
  public function indexAction(Security $security, Request $request)
  {
//    $user = $security->getUser();
//    $bookings = $user->getBookings()->getValues();
//    dump($bookings);die;

    return $this->render('default/index.html.twig');
  }

  /**
   * @Route("/submit_ajax_json", name="booking_submit_ajax_json", methods={"POST"})
   *
   */
  public function submitAjaxJsonAction(Security $security, Request $request)
  {
    $data = json_decode($request->getContent(), true);

    $booking = new Booking();

    $booking->setFromAirport($data['from_airport']);
    $booking->setToDestination($data['your_destination']);
    $arriveDate = new \DateTime();
    $booking->setArriveDate($arriveDate);
    $booking->setNumberPassengers($data['passengers']);
    $booking->setNumberLuggages($data['luggages']);
    $booking->setNumberSeats($data['seats']);

    $user = $security->getUser();
    $booking->setUser($user);

    $em = $this->getDoctrine()->getManager();
    $em->persist($booking); //$em is an instance of EntityManager
    $em->flush();

    //

    $result = array('status' => array('code' => 200, 'message' => 'success'));
    return new JsonResponse($result);
  }


  /**
   * @Route("/submit_ajax", name="booking_submit_ajax", methods={"POST"})
   *
   */
  public function submitAjaxAction(Security $security, Request $request)
  {

    $fromAirport = $request->get('from_airport');
    $yourDestination = $request->get('your_destination');
    $arriveDate = $request->get('arrive_date');
    $arriveTime = $request->get('arrive_time');
    $passengers = $request->get('passengers');
    $luggages = $request->get('luggages');
    $seats = $request->get('seats');

    // ORM

    $booking = new Booking();

    $booking->setFromAirport($fromAirport);
    $booking->setToDestination($yourDestination);
    $arriveDate = new \DateTime();
    $booking->setArriveDate($arriveDate);
    $booking->setNumberPassengers($passengers);
    $booking->setNumberLuggages($luggages);
    $booking->setNumberSeats($seats);

    $user = $security->getUser();
    $booking->setUser($user);

    $em = $this->getDoctrine()->getManager();
    $em->persist($booking); //$em is an instance of EntityManager
    $em->flush();

    $result = array('status' => array('code' => 200, 'message' => 'success'));

    return new JsonResponse($result);
  }

  /**
   * @Route("/submit", name="booking_submit")
   */
  public function submitAction(Request $request)
  {
    // Handle data here
    if ($request->isMethod('post')) {

      $fromAirport = $request->get('from_airport');
      $yourDestination = $request->get('your_destination');
      $arriveDate = $request->get('arrive_date');
      $arriveTime = $request->get('arrive_time');
      $passengers = $request->get('passengers');
      $luggages = $request->get('luggages');
      $seats = $request->get('seats');

      // ORM

      $booking = new Booking();

      $booking->setFromAirport($fromAirport);
      $booking->setToDestination($yourDestination);
      $arriveDate = new \DateTime();
      $booking->setArriveDate($arriveDate);
      $booking->setNumberPassengers($passengers);
      $booking->setNumberLuggages($luggages);
      $booking->setNumberSeats($seats);

      $em = $this->getDoctrine()->getManager();
      $em->persist($booking); //$em is an instance of EntityManager
      $em->flush();

      return $this->redirectToRoute('booking_thank_you');
    }
  }

  /**
   * @Route("/thank-you", name="booking_thank_you")
   */
  public function thankyouAction(Request $request)
  {
    // Handle data here
    return $this->render('default/thank_you.html.twig');
  }
}

/**
 * User
 * Role
 * 1. Administrator 1
 * 2. Sales Admin 2
 * 3. Driver 3
 *
 *
 *
 */
