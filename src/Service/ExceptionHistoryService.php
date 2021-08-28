<?php


namespace App\Service;


use App\Entity\ExceptionHistory;
use Doctrine\ORM\EntityManagerInterface;

class ExceptionHistoryService
{
    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $entityManager;

    /**
     * ExceptionHistoryService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param \Exception $exception
     * @param EntityManagerInterface $entityManager
     */
    public function save(\Exception $exception)
    {
        $entity = new ExceptionHistory();

        $entity
            ->setStatus($exception->getCode())
            ->setFile($exception->getFile())
            ->setLine($exception->getLine())
            ->setMessage($exception->getMessage())
            ->setTrace($exception->getTraceAsString());

        if (!$this->entityManager->isOpen()) {
            $this->entityManager = $this->resetEntityManager();
        }

        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    /**
     * @return mixed
     */
    private function resetEntityManager()
    {
        return $this->entityManager->create(
            $this->entityManager->getConnection(),
            $this->entityManager->getConfiguration()
        );
    }
}