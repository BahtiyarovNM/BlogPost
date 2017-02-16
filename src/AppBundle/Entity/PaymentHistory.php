<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 08.02.17
 * Time: 16:36
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentHistory
 *
 * @ORM\Table(name="payment_history")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaymentHistoryRepository")
 *
 *
 */
class PaymentHistory
{
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="paymentHistory")
     */
    private $user;


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     *@ORM\Column(name="date", type="datetime")
     */

    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="summ", type="integer")
     */
    private $summ;

    public function __construct()
    {
        $this->date=new \DateTime('now');

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return PaymentHistory
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
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
     * Set summ
     *
     * @param integer $summ
     *
     * @return PaymentHistory
     */
    public function setSumm($summ)
    {
        $this->summ = $summ;

        return $this;
    }

    /**
     * Get summ
     *
     * @return integer
     */
    public function getSumm()
    {
        return $this->summ;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return PaymentHistory
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
}
