<?php

namespace App\Entity;

use App\Entity\Traits\EnabledTrait;
use App\Entity\Traits\EntityTrait;
use App\Interfaces\EntityInterface;
use App\Repository\PaymentTypeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PaymentTypeRepository::class)
 */
class PaymentType implements EntityInterface
{
    use EntityTrait, EnabledTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", unique=true, length=100)
     * @Assert\NotBlank()
     * @Assert\Unique(message="payment_tyme.unique.name")
     */
    private ?string $name;

    /**
     * @ORM\Column(type="float", precision=2)
     * @Assert\Type("float")
     */
    private ?float $discount;

    /**
     * PaymentType constructor.
     */
    public function __construct()
    {
        $this->created = new \DateTime('now');
        $this->updated = new \DateTime('now');
        $this->discount = 0;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'Tipo de pagamento';
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param ?float $discount
     * @return $this
     */
    public function setDiscount(?float $discount): self
    {
        $this->discount = (float) $discount;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'name' => $this->name,
            'discount' => $this->discount,
        );
    }
}
