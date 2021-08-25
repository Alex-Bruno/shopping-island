<?php

namespace App\Entity;

use App\Interfaces\EntityInterface;
use App\Repository\PaymentTypeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PaymentTypeRepository::class)
 */
class PaymentType implements EntityInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     * @Assert\Type("float")
     */
    private $discount;

    public function __toString()
    {
        return 'Tipo de pagamento';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): self
    {
        $this->discount = $discount;

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
