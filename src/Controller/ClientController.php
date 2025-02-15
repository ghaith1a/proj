<?php

namespace App\Controller;
use App\Repository\CoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/client')]
final class ClientController extends AbstractController
{
    #[Route( name: 'app_client')]
    public function index(): Response
    {
        return $this->render('client/index.html.twig');
    }
    #[Route('/courses', name: 'app_courses')]
    public function courses(CoursRepository $coursRepository): Response
    {
        // Retrieve all courses from the database
        $courses = $coursRepository->findAll();

        // Pass the courses data to the template
        return $this->render('client/courses.html.twig', [
            'courses' => $courses,
        ]);
    }
}
