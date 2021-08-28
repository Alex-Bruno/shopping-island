<?php


namespace App\Entity\Traits;


use Doctrine\ORM\Mapping as ORM;

trait EnabledTrait
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", options={"default": 1})
     */
    protected $enabled = true;

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

}