<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserRepository extends EntityRepository implements UserProviderInterface
{

  /**
   * Loads the user for the given username.
   *
   * This method must throw UsernameNotFoundException if the user is not
   * found.
   *
   * @param string $username The username
   *
   * @return UserInterface
   *
   * @throws UsernameNotFoundException if the user is not found
   */
  public function loadUserByUsername($username)
  {
    return $this->findOneBy(array('email' => $username));
  }

  /**
   * Refreshes the user.
   *
   * It is up to the implementation to decide if the user data should be
   * totally reloaded (e.g. from the database), or if the UserInterface
   * object can just be merged into some internal array of users / identity
   * map.
   *
   * @return UserInterface
   *
   * @throws UnsupportedUserException if the user is not supported
   */
  public function refreshUser(UserInterface $user)
  {
    return $this->loadUserByUsername($user->getUsername());
  }

  /**
   * Whether this provider supports the given user class.
   *
   * @param string $class
   *
   * @return bool
   */
  public function supportsClass($class)
  {
    return $class === 'AppBundle\Entity\User';
  }
}
