<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use App\Entity\Category;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/{name}', name: 'show')]
    public function show(Category $category, ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findBy(['category' => $category], null, 3, 0);

        if (count($programs) < 1) {
            throw $this->createNotFoundException();
            }

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'programs' =>$programs

        ]);
    }
}