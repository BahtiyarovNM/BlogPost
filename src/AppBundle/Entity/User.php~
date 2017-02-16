<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\OneToMany(targetEntity="BlogPost", mappedBy="user")
     */
    private $blogPost;
    /**
     * @ORM\OneToMany(targetEntity="PaymentHistory", mappedBy="user")
     */
    private $paymentHistory;

    /**
     * @ORM\ManyToMany(targetEntity="BlogPost", inversedBy="customer")
     */
    private $bougthPost;
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    /**
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     *
     * @var ArrayCollection $userRoles
     */
    protected $userRoles;

    public function __construct()
    {
        $this->blogPost=new ArrayCollection();
        $this->bougthPost=new ArrayCollection();
        $this->userRoles = new ArrayCollection();
        $this->paymentHistory=new ArrayCollection();
    }


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\Length(
     *      min = 4,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     *@Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your name cannot contain a number"
     * )
     */
    private $username;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $email;
    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=255)
     * @Assert\Length(
     *      min = 4,
     *      max = 50,
     *      minMessage = "Your pass must be at least {{ limit }} characters long",
     *      maxMessage = "Your pass cannot be longer than {{ limit }} characters"
     * )
     */
    private $password;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;




    /**
     * @var int
     *
     * @ORM\Column(name="cash", type="integer")
     */
    private $cash=0;


    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     * 
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set pass
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    /**
     * Геттер для ролей пользователя.
     *
     * @return ArrayCollection A Doctrine ArrayCollection
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }


    /**
     * Get pass
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
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
     * Add blogPost
     *
     * @param \AppBundle\Entity\BlogPost $blogPost
     *
     * @return User
     */
    public function addBlogPost(\AppBundle\Entity\BlogPost $blogPost)
    {
        $this->blogPost[] = $blogPost;

        return $this;
    }

    /**
     * Remove blogPost
     *
     * @param \AppBundle\Entity\BlogPost $blogPost
     */
    public function removeBlogPost(\AppBundle\Entity\BlogPost $blogPost)
    {
        $this->blogPost->removeElement($blogPost);
    }

    /**
     * Get blogPost
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlogPost()
    {
        return $this->blogPost;
    }
    public function __toString()
    {
        return $this->username;
    }

    /**
     * Set cash
     *
     * @param integer $cash
     *
     * @return User
     */
    public function setCash($cash)
    {
        $this->cash += $cash;

        return $this;
    }

    /**
     * Get cash
     *
     * @return integer
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * Add bougthPost
     *
     * @param \AppBundle\Entity\BlogPost $bougthPost
     *
     * @return User
     */
    public function addBougthPost(\AppBundle\Entity\BlogPost $bougthPost)
    {
        $this->bougthPost[] = $bougthPost;

        return $this;
    }

    /**
     * Remove bougthPost
     *
     * @param \AppBundle\Entity\BlogPost $bougthPost
     */
    public function removeBougthPost(\AppBundle\Entity\BlogPost $bougthPost)
    {
        $this->bougthPost->removeElement($bougthPost);
    }

    /**
     * Get bougthPost
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBougthPost()
    {
        return $this->bougthPost;
    }
    public function getSalt()
    {
        // The bcrypt algorithm doesn't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }
    /**
     * Геттер для массива ролей.
     *
     * @return array An array of Role objects
     */
    public function getRoles()
    {

        return $this->getUserRoles()->toArray();
    }
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * Сравнивает пользователя с другим пользователем и определяет
     * один и тот же ли это человек.
     *
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user)
    {
        return md5($this->getUsername()) == md5($user->getUsername());
    }


    /**
     * Add userRole
     *
     * @param \AppBundle\Entity\Role $userRole
     *
     * @return User
     */
    public function addUserRole(\AppBundle\Entity\Role $userRole)
    {
        $this->userRoles[] = $userRole;

        return $this;
    }

    /**
     * Remove userRole
     *
     * @param \AppBundle\Entity\Role $userRole
     */
    public function removeUserRole(\AppBundle\Entity\Role $userRole)
    {
        $this->userRoles->removeElement($userRole);
    }
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add paymentHistory
     *
     * @param \AppBundle\Entity\PaymentHistory $paymentHistory
     *
     * @return User
     */
    public function addPaymentHistory(\AppBundle\Entity\PaymentHistory $paymentHistory)
    {
        $this->paymentHistory[] = $paymentHistory;

        return $this;
    }

    /**
     * Remove paymentHistory
     *
     * @param \AppBundle\Entity\PaymentHistory $paymentHistory
     */
    public function removePaymentHistory(\AppBundle\Entity\PaymentHistory $paymentHistory)
    {
        $this->paymentHistory->removeElement($paymentHistory);
    }

    /**
     * Get paymentHistory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaymentHistory()
    {
        return $this->paymentHistory;
    }
}
