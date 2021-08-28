<?php


namespace App\Entity\Traits;


use Doctrine\ORM\Mapping as ORM;

/**
 * Trait EntityTrait
 * @package App\Entity\Traits
 * @ORM\HasLifecycleCallbacks
 */
trait EntityTrait
{
    /**
     * @var \DateTime $created
     *
     * @ORM\Column(type="datetime")
     */
    private \DateTime $created;

    /**
     * @var \DateTime $updated
     *
     * @ORM\Column(type="datetime")
     */
    private \DateTime $updated;

    /**
     * @ORM\PrePersist()
     */
    public function onPrePersist()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
    }

    /**
     * @ORM\PreUpdate()
     */
    public function onPreUpdate()
    {
        $this->updated = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }

}