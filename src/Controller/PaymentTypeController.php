<?php

namespace App\Controller;

use App\Service\PaymentTypeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentTypeController extends AbstractController
{
    #[Route('/payment/type', name: 'payment_type')]
    public function index(Request $request, PaymentTypeService $service): Response
    {
        return $this->render('payment_type/index.html.twig', [
            'controller_name' => 'PaymentTypeController',
            'payments' => $service->search()
        ]);
    }
}
