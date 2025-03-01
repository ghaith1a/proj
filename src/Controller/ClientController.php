<?php

namespace App\Controller;
use App\Entity\Cours;

use App\Entity\Devoir;
use App\Entity\Ratings;
use App\Repository\CoursRepository;
use App\Repository\DevoirRepository;
use App\Repository\RatingsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client')]
final class ClientController extends AbstractController
{
    #[Route(name: 'app_client')]
    public function index(): Response
    {
        return $this->render('client/index.html.twig');
    }

    #[Route('/courses', name: 'app_courses')]
    public function courses(CoursRepository $coursRepository): Response
    {
        $user = $this->getUser();
        $courses = $coursRepository->findAll(); // Récupère tous les cours
    
        return $this->render('client/courses.html.twig', [
            'courses' => $courses,
            'user' => $user,
        ]);
    }

    #[Route('/course/{id}', name: 'app_course_show')]
    public function show(Cours $cour, DevoirRepository $devoirRepository, CoursRepository $coursRepository): Response
    {
        // Get the assignments related to the course
        $devoirs = $devoirRepository->findBy(['cours' => $cour]);

        // Get related courses (e.g., same subject)
        $relatedCourses = $coursRepository->findBy(
            ['matiereC' => $cour->getMatiereC()],
            null,
            3
        );

        return $this->render('client/showcourse.html.twig', [
            'cour' => $cour,
            'devoirs' => $devoirs,
            'relatedCourses' => $relatedCourses,
        ]);
    }

    #[Route('/devoir/{id}', name: 'app_devoir2_show')]
    public function showDevoir(Devoir $devoir): Response
    {
        return $this->render('client/devoirs.html.twig', [
            'devoir' => $devoir,
        ]);
    }
    #[Route('/course/{id}/devoirs', name: 'app_devoirs_by_course')]
public function getDevoirsByCourse(Cours $cour, DevoirRepository $devoirRepository): Response
{
    $devoirs = $devoirRepository->findBy(['cours' => $cour]);

    return $this->render('client/devoirs.html.twig', [
        'cour' => $cour,
        'devoirs' => $devoirs,
    ]);
}
#[Route('/{id}', name: 'app_devoir_show11', methods: ['GET'])]
public function show1(Devoir $devoir): Response
{
    return $this->render('client/show.html.twig', [
        'devoir' => $devoir,
    ]);
}

    
}
