<?php
// src/Controller/WildController.php
namespace App\Controller;

use App\Entity\Category;
use App\Entity\Program;
use App\Entity\Season;
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

    /**
     * Getting a list of all seasons for a defined program
     *
     * @param string $programSlug
     * @Route("/program/{programSlug}", defaults={"program_seasons" = null}, name="show_program")
     * @return Response
     */
    public function showByProgram(string $programSlug):Response
    {
        if (!$programSlug) {
            throw $this
                ->createNotFoundException('No program has been sent to find a list in program\'s table.');
        }
        $programSlug = preg_replace(
            '/-/',
            ' ', ucwords(trim(strip_tags($programSlug)), "-")
        );
        $programId = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(['title' => mb_strtolower($programSlug)]);
        $showSeasons = $this->getDoctrine()
            ->getRepository(Season::class)
            ->findBy(
                ['program' => $programId]
            );
        if (!$showSeasons) {
            throw $this->createNotFoundException(
                'No seasons found for '.$programSlug.'.'
            );
        }
        return $this->render('wild/seasons-list.html.twig', [
            'program_seasons' => $showSeasons,
            'program_info' => $programId,
        ]);
    }

    /**
     * Getting a list of all episodes from a season of specified program
     *
     * @param int $id
     * @Route("/season/season-{id}", name="show_season")
     * @return Response
     */
    public function showBySeason(int $id):Response
    {
        if (!$id) {
            throw $this
                ->createNotFoundException('No season number has been sent to find a list in season\'s table.');
        }
        $seasonObj = $this->getDoctrine()
            ->getRepository(Season::class)
            ->find($id);

        $programs = $seasonObj->getProgram();
        $episodes = $seasonObj->getEpisodes();

        return $this->render('wild/episodes-list.html.twig', [
            'season' => $seasonObj,
            'program' => $programs,
            'episodes' => $episodes,
        ]);
    }

    /**
     * Getting a unique episode
     *
     * @param int $episode
     * @Route("episode/{id}", name="show_episode")
     * @return Response
     */
    public function showEpisode(Episode $episode):Response
    {
        return $this->render('episode.html.twig', ['episode'=>$episode]);
    }
}
