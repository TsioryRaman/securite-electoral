<?php

namespace App\DataFixtures;

use App\Entity\Candidate;
use App\Entity\Electeur;
use App\Entity\VotePlace;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;


class CandidateFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create();

        for($i = 0;$i<5;$i++)
        {
            $candidate = new \App\Entity\Candidate();
            $candidate->setNumberList($i);
            $candidate->setName($this->getReference(Electeur::class . $i)->getName());
            $candidate->setFirstname($this->getReference(Electeur::class . $i)->getFirstName());
            $candidate->setPoliticalParty($faker->company);
            $candidate->setElecteur($this->getReference(Electeur::class . $i));
            $manager->persist($candidate);

            $this->addReference(Candidate::class . $i,$candidate);
            $manager->persist($candidate);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ElecteurFixtures::class
        ];
    }
}
