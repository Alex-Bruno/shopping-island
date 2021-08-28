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

    /**
     * @param Request $request
     * @param PaymentTypeService $service
     * @return Response
     * @Route("/{id}/edit", name="payment_type_edit")
     */
    public function edit(Request $request, PaymentType $entity, PaymentTypeService $service): Response
    {
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

        return $this->render('payment_type/edit.html.twig', [
            'controller_name' => 'PaymentTypeController',
            'form' => $form->createView(),
            'entity' => $entity
        ]);
    }

    /**
     * @param Request $request
     * @param PaymentTypeService $service
     * @return Response
     * @Route("/{id}/delete", name="payment_type_delete")
     */
    public function delete(Request $request, PaymentType $entity, PaymentTypeService $service): Response
    {
        $form = $this->createDeleteForm($entity);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()) {

            try {
                $service->delete($entity);
                $this->addSuccessMessage('paymentType.delete.success');
            }catch (\Exception $exception) {
                $this->addErrorMessage('paymentType.delete.error');
                $this->saveExceptionHistory($exception);
            }

            return $this->redirectToRoute('payment_type_index');
        }

        return $this->render('payment_type/delete.html.twig', [
            'controller_name' => 'PaymentTypeController',
            'form' => $form->createView(),
            'entity' => $entity
        ]);
    }

    /**
     * @param PaymentType $entity
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(PaymentType $entity) {
        return $this->createFormBuilder($entity)
            ->setAction('payment_type_delete')
            ->setMethod('DELETE')
            ->getForm();
    }
}
