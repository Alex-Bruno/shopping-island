<?php


namespace App\Service;


use App\Entity\ExceptionHistory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class ExceptionHistoryService
{
    /**
     * @var ManagerRegistry
     */
    protected ManagerRegistry $manager;

    /**
     * ExceptionHistoryService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(ManagerRegistry $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param \Exception $exception
     * @param EntityManagerInterface $entityManager
     */
    public function save(\Exception $exception)
    {
        $this->manager->getManager()->clear();

        $entity = new ExceptionHistory();

        $entity
            ->setStatus($exception->getCode())
            ->setFile($exception->getFile())
            ->setLine($exception->getLine())
            ->setMessage($exception->getMessage())
            ->setTrace($exception->getTraceAsString());

        if (!$this->manager->getManager()->isOpen()) {
            $this->manager->resetManager();
        }

        $this->manager->getManager()->persist($entity);
        $this->manager->getManager()->flush();
    }
}