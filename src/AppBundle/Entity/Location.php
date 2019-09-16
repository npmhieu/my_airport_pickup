<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Location
 *
 * @ORM\Table(name="tblLocation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocationRepository")
 */
class Location
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var string
   *
   * @ORM\Column(type="string", length=255)
   */
  private $fromAirport;

  /**
   * @var string
   *
   * @ORM\Column(type="string", length=256)
   */
  private $toDestination;

  /**
   * @var string
   *
   * @ORM\Column(type="datetime")
   */
  private $arriveDate;

  /**
   * @var int
   *
   * @ORM\Column(type="integer")
   */
  private $numberPassengers;

  /**
   * @var int
   *
   * @ORM\Column(type="integer")
   */
  private $numberLuggages;

  /**
   * @var int
   *
   * @ORM\Column(type="integer")
   */
  private $numberSeats;

  /**
   * @var float
   *
   * @ORM\Column(type="float")
   */
  private $price;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="created_date", type="datetime")
   */
  private $createdDate;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="updated_date", type="datetime")
   */
  private $updatedDate;




  /**
   * Poll constructor.
   *
   * @param $anwsers
   */
  public function __construct()
  {
  }

  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getFromAirport()
  {
    return $this->fromAirport;
  }

  /**
   * @param string $fromAirport
   */
  public function setFromAirport($fromAirport)
  {
    $this->fromAirport = $fromAirport;
  }

  /**
   * @return string
   */
  public function getToDestination()
  {
    return $this->toDestination;
  }

  /**
   * @param string $toDestination
   */
  public function setToDestination($toDestination)
  {
    $this->toDestination = $toDestination;
  }

  /**
   * @return string
   */
  public function getArriveDate()
  {
    return $this->arriveDate;
  }

  /**
   * @param string $arriveDate
   */
  public function setArriveDate($arriveDate)
  {
    $this->arriveDate = $arriveDate;
  }

  /**
   * @return int
   */
  public function getNumberPassengers()
  {
    return $this->numberPassengers;
  }

  /**
   * @param int $numberPassengers
   */
  public function setNumberPassengers($numberPassengers)
  {
    $this->numberPassengers = $numberPassengers;
  }

  /**
   * @return int
   */
  public function getNumberLuggages()
  {
    return $this->numberLuggages;
  }

  /**
   * @param int $numberLuggages
   */
  public function setNumberLuggages($numberLuggages)
  {
    $this->numberLuggages = $numberLuggages;
  }

  /**
   * @return int
   */
  public function getNumberSeats()
  {
    return $this->numberSeats;
  }

  /**
   * @param int $numberSeats
   */
  public function setNumberSeats($numberSeats)
  {
    $this->numberSeats = $numberSeats;
  }

  /**
   * @return \DateTime
   */
  public function getCreatedDate()
  {
    return $this->createdDate;
  }

  /**
   * @param \DateTime $createdDate
   */
  public function setCreatedDate($createdDate)
  {
    $this->createdDate = $createdDate;
  }

  /**
   * @return \DateTime
   */
  public function getUpdatedDate()
  {
    return $this->updatedDate;
  }

  /**
   * @param \DateTime $updatedDate
   */
  public function setUpdatedDate($updatedDate)
  {
    $this->updatedDate = $updatedDate;
  }

  /**
   * @return float
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * @param float $price
   */
  public function setPrice($price)
  {
    $this->price = $price;
  }



}
