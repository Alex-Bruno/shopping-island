<?php


namespace App\Controller;


use App\Service\ExceptionHistoryService;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class MyController
 * @package App\Controller
 */
class MyController extends AbstractController
{
    /**
     * @param string $message
     */
    protected function addSuccessMessage(string $message)
    {
        $this->addFlash('success', $message);
    }

    /**
     * @param string $message
     */
    protected function addErrorMessage(string $message)
    {
        $this->addFlash('error', $message);
    }

    /**
     * @param string $message
     */
    protected function addAlertMessage(string $message)
    {
        $this->addFlash('alert', $message);
    }

    /**
     * @param \Exception $exception
     * @param ExceptionHistoryService $service
     */
    protected function saveExceptionHistory(\Exception $exception, ?ExceptionHistoryService $service)
    {
        $service->save($exception);
    }
}