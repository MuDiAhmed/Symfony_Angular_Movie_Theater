<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 28/09/16
 * Time: 08:11 م
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="tickets")
 */
class Tickets
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="HallMovieShow", inversedBy="tickets")
     */
    public $hallMovieShow;

    /**
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="tickets")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $chair_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $row_number;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set chairNumber
     *
     * @param integer $chairNumber
     *
     * @return Tickets
     */
    public function setChairNumber($chairNumber)
    {
        $this->chair_number = $chairNumber;

        return $this;
    }

    /**
     * Get chairNumber
     *
     * @return integer
     */
    public function getChairNumber()
    {
        return $this->chair_number;
    }

    /**
     * Set hallMovieShowId
     *
     * @param \AppBundle\Entity\HallMovieShow $hallMovieShowId
     *
     * @return Tickets
     */
    public function setHallMovieShowId(\AppBundle\Entity\HallMovieShow $hallMovieShowId = null)
    {
        $this->hallMovieShow = $hallMovieShowId;

        return $this;
    }

    /**
     * Get hallMovieShowId
     *
     * @return \AppBundle\Entity\HallMovieShow
     */
    public function getHallMovieShowId()
    {
        return $this->hallMovieShow;
    }

    /**
     * Set userId
     *
     * @param \AppBundle\Entity\users $userId
     *
     * @return Tickets
     */
    public function setUserId(\AppBundle\Entity\Users $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\users
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set hallMovieShow
     *
     * @param \AppBundle\Entity\HallMovieShow $hallMovieShow
     *
     * @return Tickets
     */
    public function setHallMovieShow(\AppBundle\Entity\HallMovieShow $hallMovieShow = null)
    {
        $this->hallMovieShow = $hallMovieShow;

        return $this;
    }

    /**
     * Get hallMovieShow
     *
     * @return \AppBundle\Entity\HallMovieShow
     */
    public function getHallMovieShow()
    {
        return $this->hallMovieShow;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return Tickets
     */
    public function setUser(\AppBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set rowNumber
     *
     * @param integer $rowNumber
     *
     * @return Tickets
     */
    public function setRowNumber($rowNumber)
    {
        $this->row_number = $rowNumber;

        return $this;
    }

    /**
     * Get rowNumber
     *
     * @return integer
     */
    public function getRowNumber()
    {
        return $this->row_number;
    }
}
