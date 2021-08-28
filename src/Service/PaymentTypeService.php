<?php


namespace App\Service;


use App\Entity\PaymentType;
use App\Interfaces\EntityInterface;
use App\Interfaces\ServiceInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class PaymentTypeService
 * @package App\Service
 */
class PaymentTypeService implements ServiceInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * PaymentTypeService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return PaymentType[]
     */
    public function search($filter = null): array
    {
        return $this->entityManager->getRepository('App:PaymentType')->findBy(['enabled' => true], ['name' => 'ASC']);
    }

    /**
     * @param \App\Interfaces\EntityInterface $entity
     */
    public function save(EntityInterface $entity)
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    /**
     * @param \App\Interfaces\EntityInterface $entity
     */
    public function delete(EntityInterface $entity)
    {
        $entity->setEnabled(false);
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

}