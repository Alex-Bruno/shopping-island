<?php

namespace App\Controller;

use App\Entity\PaymentType;
use App\Form\PaymentTypeType;
use App\Service\PaymentTypeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/payment-type')]
class PaymentTypeController extends AbstractController
{
    #[Route('/', name: 'payment_type_index')]
    public function index(Request $request, PaymentTypeService $service): Response
    {
        return $this->render('payment_type/index.html.twig', [
            'controller_name' => 'PaymentTypeController',
            'payments' => $service->search()
        ]);
    }

    #[Route('/new', name: 'payment_type_new')]
    public function new(Request $request, PaymentTypeService $service): Response
    {
        $entity = new PaymentType();

        $form = $this->createForm(PaymentTypeType::class, $entity);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()) {

        }

        return $this->render('payment_type/new.html.twig', [
            'controller_name' => 'PaymentTypeController',
            'form' => $form->createView()
        ]);
    }
}
