<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Entity\Electeur;
use App\Repository\CandidateRepository;
use App\Repository\ElecteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    public function __construct(private readonly ElecteurRepository $repository,private readonly CandidateRepository $candidateRepository,private readonly EntityManagerInterface $em)
    {
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
        ]);
    }

    #[Route('/vote', name: 'vote_candidat',methods: ['POST'])]
    public function ratePresident(Request $request): Response
    {
        $candidate = $this->candidateRepository->findOneBy(['number_list'=>$request->get('_president')]);
        $electeur = $this->repository->findOneBy(['id'=>$request->get('_electeur')]);

        $candidate->setElecteur($electeur);
        $this->em->flush();

        $this->addFlash('success',"Voaray ny safidinao");

        return $this->redirectToRoute('app_home');
    }

    #[Route('/login_electeur', name: 'login-electeur', methods: ['GET','POST'])]
    public function logElector(Request $request,CandidateRepository $repository): Response
    {

        $electeur = $this->repository->findOneBy(['name'=>$request->get('_username')]);
        $username = $request->get('_username');
        if($electeur)
        {

            if($electeur->getCinNumber() === $request->get('_cin') && $electeur->getCandidate() === null)
            {
                $candidates = $repository->findAll();
                return $this->render('home/index.candidate.html.twig',['electeur'=>$electeur,'candidates'=>$candidates]);

            }
        }

        return $this->render('electeur.html.twig',['username'=>$username]);
    }
}
