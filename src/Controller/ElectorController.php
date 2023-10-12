<?php

namespace App\Controller;

use App\Entity\Electeur;
use App\Form\ElecteurType;
use App\Repository\ElecteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ElectorController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $em, private readonly PaginatorInterface $paginator, private readonly ElecteurRepository $repository)
    {
    }

    #[Route(path: 'electeur', name: 'electeur.index', methods: ['GET'])]
    public function show(Request $request):Response
    {
        $q = $request->get('q');
        $query = $this->repository->findLatest($q);
        $rows = $this->paginator->paginate(
            $query,
            $request->get('page', 1),
            10
        );
        return $this->render('admin/electeur/index.html.twig',
            [
                'rows' => $rows,
                'q' => $q]);
    }

    #[Route(path: 'electeur/edit/{id}', name: 'electeur.edit', methods: ['GET','POST'])]
    public function edit(Electeur $electeur, Request $request):Response
    {
        $form = $this->createForm(ElecteurType::class, $electeur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();

            return $this->redirectToRoute('electeur.index');
        }
        return $this->render('admin/electeur/edit.html.twig',
            [
                'form' => $form->createView()
        ]);
    }

    #[Route(path: 'electeur/remove/{id}', name: 'electeur.delete', methods: ['POST'])]
    public function delete(Electeur $electeur, Request $request):Response
    {
        if ($request->get('_method') === 'DELETE') {
            $this->em->remove($electeur);
            $this->em->flush();

        }
        $this->addFlash('success',"Mpifidy voafafa");

        return $this->redirectToRoute('electeur.index');
    }
}