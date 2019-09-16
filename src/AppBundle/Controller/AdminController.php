<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
  /**
 * @Route("/admin", name="admin_homepage")
 */
  public function indexAction(Request $request)
  {
    return $this->render('admin/index.html.twig');
  }

  /**
   * @Route("/admin/bookings", name="admin_booking_list")
   */
  public function adminBookingListAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();

    $itemPerPage = 5;
    $page = 1;

    $bookings = $em->getRepository(Booking::class)->findBy(
      [],
      ['id' => 'DESC'],
      $itemPerPage,
      $itemPerPage *  $page
    );

    return $this->render('admin/booking/index.html.twig',
      [
        "bookings" => $bookings,
        "message" => "hello"
      ]);
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
