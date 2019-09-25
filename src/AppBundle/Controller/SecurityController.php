<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\User;
use AppBundle\Form\UserForm;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
  /**
   * @Route("/login", name="login")
   */
  public function loginAction(AuthenticationUtils $authenticationUtils)
  {
    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('security/login.html.twig', [
      'last_username' => $lastUsername,
      'error'         => $error,
    ]);
  }
  /**
   * @Route("/register", name="register")
   */
  public function registerAction(Request $request)
  {
    $user = new User();

    $form = $this->createForm(UserForm::class, $user);
    $form->handleRequest( $request );

    if ( $form->isSubmitted() && $form->isValid()) {
      try {

        $user = $form->getData();
        $user->setRole(4);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        // Flash bag

        $this->addFlash('success', 'Create User successfully!');
        return $this->redirectToRoute('homepage');

      } catch (\Exception $ex) {

        $this->addFlash('error', 'Something went wrong. ' . $ex->getMessage());
        $this->container->get('logger')->error($ex->getMessage());
      }
    }
    return $this->render('security/register.html.twig', [
      'userForm' => $form->createView()
    ]);
  }
}
