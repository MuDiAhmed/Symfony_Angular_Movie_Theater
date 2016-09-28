<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 28/09/16
 * Time: 05:34 م
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="movies")
 */
class Movies
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="HallMovieShow", mappedBy="movies")
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
     * Set title
     *
     * @param string $title
     *
     * @return Movies
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add hallMovieShow
     *
     * @param \AppBundle\Entity\HallMovieShow $hallMovieShow
     *
     * @return Movies
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
