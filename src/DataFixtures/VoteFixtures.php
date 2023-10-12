<?php

namespace App\DataFixtures;

use App\Entity\VotePlace;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class VoteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create();
        for($i = 0;$i <= 22;$i++)
        {
            $vote = new VotePlace();
            $vote->setCommune($faker->country);
            $vote->setRegion($faker->city);
            $this->addReference(VotePlace::class . $i, $vote);
            $manager->persist($vote);
        }

        $manager->flush();
    }
}
