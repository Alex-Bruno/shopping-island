<?php


namespace App\Service;


use App\Entity\PaymentType;
use App\Interfaces\ServiceInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class PaymentTypeService
 * @package App\Service
 */
class PaymentTypeService implements ServiceInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return PaymentType[]
     */
    public function search()
    {
        return $this->entityManager->getRepository('App:PaymentType')->findAll();
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

}