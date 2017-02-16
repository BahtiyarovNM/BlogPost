<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * BlogPost
 *
 * @ORM\Table(name="blog_post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BlogPostRepository")
 */
class BlogPost
{
    /**
     *  @ORM\ManyToOne(targetEntity="User", inversedBy="blogPost")
     */
    private $user;


    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="blogPosts")
     */
    private $category;


    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="bougthPost")
     */

    private $customer;


    /**
     *  @ORM\ManyToOne(targetEntity="Character", inversedBy="blogPosts")
     */
    private $type;

    /**
     *
     *
     * @ORM\Column(name="date", type="datetime")
     */

    private $date;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->date = new \DateTime("now");
        $this->customer=new ArrayCollection();
    }



    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }





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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var bool
     *
     * @ORM\Column(name="draft", type="boolean")
     */
    private $draft = false;



    /**
     * Get id
     *
     * @return int
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
     * @return BlogPost
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
     * Set body
     *
     * @param string $body
     *
     * @return BlogPost
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set draft
     *
     * @param boolean $draft
     *
     * @return BlogPost
     */
    public function setDraft($draft)
    {
        $this->draft = $draft;

        return $this;
    }

    /**
     * Get draft
     *
     * @return bool
     */
    public function getDraft()
    {
        return $this->draft;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return BlogPost
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }




    /**
     * Add category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return BlogPost
     */
    public function addCategory(\AppBundle\Entity\Category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\Category $category
     */
    public function removeCategory(\AppBundle\Entity\Category $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return BlogPost
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add customer
     *
     * @param \AppBundle\Entity\User $customer
     *
     * @return BlogPost
     */
    public function addCustomer(\AppBundle\Entity\User $customer)
    {
        $this->customer[] = $customer;

        return $this;
    }

    /**
     * Remove customer
     *
     * @param \AppBundle\Entity\User $customer
     */
    public function removeCustomer(\AppBundle\Entity\User $customer)
    {
        $this->customer->removeElement($customer);
    }

    /**
     * Get customer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomer()
    {
        return $this->customer;
    }




    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Get date
     *
     * @return string
     */
    public function getStringDate(){
        return $this->date->format('d.m.Y H-i');
    }
    /**
     * Set type
     *
     * @param \AppBundle\Entity\Character $type
     *
     * @return BlogPost
     */
    public function setType(\AppBundle\Entity\Character $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\Character
     */
    public function getType()
    {
        return $this->type;
    }
}
