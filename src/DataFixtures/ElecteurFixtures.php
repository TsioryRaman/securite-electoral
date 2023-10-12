<?php

namespace App\DataFixtures;

use App\Entity\Electeur;
use App\Entity\VotePlace;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ElecteurFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create();
        $k = 0;
        for($i = 0; $i < 100 ; $i++)
        {
            $electeur = new Electeur();
            $electeur->setName($faker->name);
            $electeur->setFirstname($faker->firstName);
            $electeur->setAddress($faker->address);
            $electeur->setBirthday(new \DateTimeImmutable('-30 y'));
            $electeur->setCinNumber($faker->numberBetween(100000000000,999999999999));
            $electeur->setFatherName($faker->name . ' ' . $faker->firstName);
            $electeur->setMotherName($faker->name . ' ' . $faker->firstName);
            $electeur->setSign($faker->name . ' ' . $faker->firstName);
            $electeur->setBirthPlace($faker->country);
            $electeur->setDoneIn(new \DateTimeImmutable('-10 y'));
            $electeur->setCreatedAt(new \DateTimeImmutable('now'));
            $electeur->setUpdatedAt(new \DateTimeImmutable('now'));
            $k = $k <= 22 ? $k : 0;
            $electeur->setVotePlace($this->getReference(VotePlace::class . $k));
            $k++;
            $manager->persist($electeur);

            $this->addReference(Electeur::class . $i,$electeur);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            VoteFixtures::class
        ];
    }
}
