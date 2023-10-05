<?php

namespace App\Controller;

use App\Form\LearnFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearnFormController extends AbstractController
{
    #[Route('/learnform', name: 'app_learn_form')]
    public function index(Request $request): Response
    {
        $phrase = '';
        $myForm = $this->createForm(LearnFormType::class);
        $myForm->handleRequest($request);

        if ($myForm->isSubmitted() && $myForm->isValid()){
            $data = $myForm->getData();
            if ($data['choice'] == true){
                $phrase = $data['nom'] . ' aime les formulaires';
            } else {
                $phrase = $data['nom'] . ' n\'aime pas les formulaires';
            }
        }

        return $this->render('learn_form/index.html.twig', [
            'myForm' => $myForm,
            'phrase' => $phrase,
        ]);
    }
}
