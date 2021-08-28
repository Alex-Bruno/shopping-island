<?php

namespace App\Controller;

use App\Entity\PaymentType;
use App\Form\PaymentTypeType;
use App\Service\ExceptionHistoryService;
use App\Service\PaymentTypeService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/payment-type")
 */
class PaymentTypeController extends MyController
{
    /**
     * @param Request $request
     * @param PaymentTypeService $service
     * @return Response
     * @Route("/", name="payment_type_index")
     */
    public function index(Request $request, PaymentTypeService $service): Response
    {
        return $this->render('payment_type/index.html.twig', [
            'controller_name' => 'PaymentTypeController',
            'payments' => $service->search()
        ]);
    }

    /**
     * @param Request $request
     * @param PaymentTypeService $service
     * @return Response
     * @Route("/new", name="payment_type_new")
     */
    public function new(Request $request, PaymentTypeService $service): Response
    {
        $entity = new PaymentType();

        $form = $this->createForm(PaymentTypeType::class, $entity);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()) {

            try {
                $service->save($entity);
                $this->addSuccessMessage('paymentType.new.success');
            }catch (\Exception $exception) {
                $this->addErrorMessage('paymentType.new.error');
                $this->saveExceptionHistory($exception);
            }

            return $this->redirectToRoute('payment_type_index');
        }

        return $this->render('payment_type/new.html.twig', [
            'controller_name' => 'PaymentTypeController',
            'form' => $form->createView()
        ]);
    }
}
