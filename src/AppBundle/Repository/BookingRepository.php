<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BookingRepository extends EntityRepository
{
  public function countAll() {
    return intval($this->createQueryBuilder('booking')
      ->select('COUNT(booking)')
      ->getQuery()->getSingleScalarResult());
  }
}
