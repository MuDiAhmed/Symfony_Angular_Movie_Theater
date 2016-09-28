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
 * @ORM\Table(name="halls")
 */
class Halls
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $row_chairs;

    /**
     * @ORM\Column(type="integer")
     */
    private $row_total;

    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="HallMovieShow", mappedBy="halls")
     */
    public $hall_movie_show;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hall_movie_show = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set rowChairs
     *
     * @param integer $rowChairs
     *
     * @return Halls
     */
    public function setRowChairs($rowChairs)
    {
        $this->row_chairs = $rowChairs;

        return $this;
    }

    /**
     * Get rowChairs
     *
     * @return integer
     */
    public function getRowChairs()
    {
        return $this->row_chairs;
    }

    /**
     * Set rowTotal
     *
     * @param integer $rowTotal
     *
     * @return Halls
     */
    public function setRowTotal($rowTotal)
    {
        $this->row_total = $rowTotal;

        return $this;
    }

    /**
     * Get rowTotal
     *
     * @return integer
     */
    public function getRowTotal()
    {
        return $this->row_total;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Halls
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add hallMovieShow
     *
     * @param \AppBundle\Entity\HallMovieShow $hallMovieShow
     *
     * @return Halls
     */
    public function addHallMovieShow(\AppBundle\Entity\HallMovieShow $hallMovieShow)
    {
        $this->hall_movie_show[] = $hallMovieShow;

        return $this;
    }

    /**
     * Remove hallMovieShow
     *
     * @param \AppBundle\Entity\HallMovieShow $hallMovieShow
     */
    public function removeHallMovieShow(\AppBundle\Entity\HallMovieShow $hallMovieShow)
    {
        $this->hall_movie_show->removeElement($hallMovieShow);
    }

    /**
     * Get hallMovieShow
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHallMovieShow()
    {
        return $this->hall_movie_show;
    }
}
