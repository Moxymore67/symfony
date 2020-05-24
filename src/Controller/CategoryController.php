<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/add ", name="category_add")
     * @param Request $request
     * @return Response
     */
    public function add(Request $request): Response
    {
        // Crud form
        $category = new Category();
        $crudForm = $this->createForm(CategoryType::class, $category);
        $crudForm->handleRequest($request);
        if ($crudForm->isSubmitted() && $crudForm->isValid()) {
            $category = $crudForm->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();
            return $this->redirectToRoute('wild_index');
        }
        return $this->render('wild/category-add.html.twig',[
            'crud_form' => $crudForm->createView(),
        ]);
    }
}