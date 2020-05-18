<?php
// src/Controller/WildController.php
namespace App\Controller;

use App\Entity\Category;
use App\Entity\Program;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/wild")
 * @return Response
 */
class WildController extends AbstractController
{
    /**
     * @Route("/", name="wild_index")
     * @return Response
     */
    public function index(): Response
    {
        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll();

        if (!$programs) {
            throw $this->createNotFoundException(
                'No program found in program\'s table.'
            );
        }

        return $this->render(
            'wild/index.html.twig',
            ['programs' => $programs]
        );
    }

    /**
     * Getting a program with a formatted slug for title
     *
     * @param string $slug The slugger
     * @Route("/show/{slug<^[a-z0-9-]+$>}", defaults={"slug" = null}, name="wild_show")
     * @return Response
     */
    public function show(?string $slug):Response
    {
        if (!$slug) {
            throw $this
                ->createNotFoundException('No slug has been sent to find a program in program\'s table.');
        }
        $slug = preg_replace(
            '/-/',
            ' ', ucwords(trim(strip_tags($slug)), "-")
        );
        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(['title' => mb_strtolower($slug)]);
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with '.$slug.' title found in program\'s table.'
            );
        }

        return $this->render('wild/show.html.twig', [
            'program' => $program,
            'slug'  => $slug,
        ]);
    }

    /**
     * Getting a list of programs filtered by category (max 3)
     *
     * @param string $categoryName
     * @Route("/category/{categoryName}", defaults={"programs_by_cat" = null}, name="show_category")
     * @return Response
     */
    public function showByCategory(string $categoryName):Response
    {
        if (!$categoryName) {
            throw $this
                ->createNotFoundException('No category has been sent to find a list in program\'s table.');
        }
        $categoryName = preg_replace(
            '/-/',
            ' ', ucwords(trim(strip_tags($categoryName)), "-")
        );
        $catId = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneBy(['name' => mb_strtolower($categoryName)]);
        $programsByCat = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findBy(
                ['category' => $catId],
                ['id' => 'desc'],
                3
            );
        if (!$programsByCat) {
            throw $this->createNotFoundException(
                'No program with category '.$categoryName.' found in program\'s table.'
            );
        }
        return $this->render('wild/category.html.twig', [
            'programs_by_cat' => $programsByCat,
            'category'  => $categoryName,
        ]);
    }
}
