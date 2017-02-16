<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 03.02.17
 * Time: 23:16
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * PostType
 *
 * @ORM\Table(name="type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostTypeRepository")
 * @UniqueEntity(fields="name", message="This name already taken")
 *
 */
class Character
{
    /**
     * @ORM\OneToMany(targetEntity="BlogPost", mappedBy="type")
     */
    private $blogPosts;


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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="cost", type="integer")
     */
    private $cost;




    /**
     * @var int
     *
     * @ORM\Column(name="royalties", type="integer")
     */

    private $royalties;
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
     * Set name
     *
     * @param string $name
     *
     * @return Character
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    function __toString()
    {
        return $this->name;
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
     * Set cost
     *
     * @param integer $cost
     *
     * @return Character
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return integer
     */
    public function getCost()
    {
        return $this->cost;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blogPosts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add blogPost
     *
     * @param \AppBundle\Entity\BlogPost $blogPost
     *
     * @return Character
     */
    public function addBlogPosts(\AppBundle\Entity\BlogPost $blogPost)
    {
        $this->blogPosts[] = $blogPost;

        return $this;
    }

    /**
     * Remove blogPost
     *
     * @param \AppBundle\Entity\BlogPost $blogPost
     */
    public function removeBlogPosts(\AppBundle\Entity\BlogPost $blogPost)
    {
        $this->blogPosts->removeElement($blogPost);
    }

    /**
     * Get blogPost
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlogPosts()
    {
        return $this->blogPosts;
    }

    /**
     * Add blogPost
     *
     * @param \AppBundle\Entity\BlogPost $blogPost
     *
     * @return Character
     */
    public function addBlogPost(\AppBundle\Entity\BlogPost $blogPost)
    {
        $this->blogPosts[] = $blogPost;

        return $this;
    }

    /**
     * Remove blogPost
     *
     * @param \AppBundle\Entity\BlogPost $blogPost
     */
    public function removeBlogPost(\AppBundle\Entity\BlogPost $blogPost)
    {
        $this->blogPosts->removeElement($blogPost);
    }

    /**
     * Set royalties
     *
     * @param integer $royalties
     *
     * @return Character
     */
    public function setRoyalties($royalties)
    {
        $this->royalties = $royalties;

        return $this;
    }

    /**
     * Get royalties
     *
     * @return integer
     */
    public function getRoyalties()
    {
        return $this->royalties;
    }
}
