<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 28/09/16
 * Time: 05:35 م
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="shows")
 */
class Shows
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $start_time;

    /**
     * @ORM\Column(type="time")
     */
    private $end_time;

    /**
     * @ORM\OneToMany(targetEntity="HallMovieShow", mappedBy="show")
     */
    public $hallMovieShow;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hallMovieShow = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return Shows
     */
    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     *
     * @return Shows
     */
    public function setEndTime($endTime)
    {
        $this->end_time = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * Add hallMovieShow
     *
     * @param \AppBundle\Entity\HallMovieShow $hallMovieShow
     *
     * @return Shows
     */
    public function addHallMovieShow(\AppBundle\Entity\HallMovieShow $hallMovieShow)
    {
        $this->hallMovieShow[] = $hallMovieShow;

        return $this;
    }

    /**
     * Remove hallMovieShow
     *
     * @param \AppBundle\Entity\HallMovieShow $hallMovieShow
     */
    public function removeHallMovieShow(\AppBundle\Entity\HallMovieShow $hallMovieShow)
    {
        $this->hallMovieShow->removeElement($hallMovieShow);
    }

    /**
     * Get hallMovieShow
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHallMovieShow()
    {
        return $this->hallMovieShow;
    }
}
