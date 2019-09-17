<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use AppBundle\Entity\User;
use AppBundle\Form\BookingForm;
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
   * @Route("/admin/users", name="admin_users_list")
   */
  public function adminUserListAction(Request $request)
  {
    return $this->render('admin/user/index.html.twig',
      [
      ]);
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


  /**
   * @Route("/admin/bookings/{bookingId}/edit", name="admin_booking_edit")
   */
  public function adminBookingEditAction(Request $request, $bookingId)
  {
    $em = $this->getDoctrine()->getManager();
    $booking = $em->getRepository(Booking::class)->find($bookingId);

    $form = $this->createForm(BookingForm::class, $booking);
    $form->handleRequest( $request );

    if ( $form->isSubmitted() && $form->isValid()) {
      try {

        $updatedBooking = $form->getData();
        $updatedDate = $updatedBooking->getArriveDate();

        $updatedDate = \DateTime::createFromFormat('d/m/Y H:i', $updatedDate);
        $updatedBooking->setArriveDate($updatedDate);

        $em->persist($updatedBooking);
        $em->flush();

        // Flash bag

        $this->addFlash('success', 'Update Booking successfully!');
        return $this->redirectToRoute('admin_booking_list');

      } catch (\Exception $ex) {

        $this->addFlash('notice_blog_create_edit', 'Something went wrong. ' . $ex->getMessage());
        $this->container->get('logger')->error($ex->getMessage());
      }
    }

    return $this->render('admin/booking/edit.html.twig',
      [
        'bookingForm' => $form->createView()
      ]);
  }

  /**
   * @Route("/admin/bookings/{bookingId}/delete", name="admin_booking_delete")
   */
  public function adminBookingDeleteAction(Request $request, $bookingId)
  {
    dump($bookingId);die;

  }

}

