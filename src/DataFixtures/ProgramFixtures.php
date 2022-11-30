<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $program = new Program();
        $program->setTitle('Breaking Bad');
        $program->setSynopsis('Walter White, 50 ans commence à faire du crystal meth');
        $program->setPoster('https://m.media-amazon.com/images/M/MV5BMTczMTY0MTMzOV5BMl5BanBnXkFtZTcwNDQxMTk4Nw@@._V1_.jpg');
        $program->setCategory($this->getReference('category_Drame'));
        $manager->persist($program);

        $program2 = new Program();
        $program2->setTitle('Black Mirror');
        $program2->setSynopsis('Sous un angle noir et souvent satirique, la série envisage un futur proche, voire immédiat.');
        $program2->setPoster('https://m.media-amazon.com/images/M/MV5BYTM3YWVhMDMtNjczMy00NGEyLWJhZDctYjNhMTRkNDE0ZTI1XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UX1000_.jpg');
        $program2->setCategory($this->getReference('category_Science-Fiction'));
        $manager->persist($program2);

        $program3 = new Program();
        $program3->setTitle('The Leftovers');
        $program3->setSynopsis('Du jour au lendemain, un 14 octobre en apparence ordinaire, 2% de la population disparaît mystérieusement de la surface de la terre.');
        $program3->setPoster('https://m.media-amazon.com/images/M/MV5BNTE3MDc1MjY4NV5BMl5BanBnXkFtZTgwMDg4MjQ4MTE@._V1_FMjpg_UX1000_.jpg');
        $program3->setCategory($this->getReference('category_Drame'));
        $manager->persist($program3);

        $program4 = new Program();
        $program4->setTitle('Fargo');
        $program4->setSynopsis('Fargo est une série d\'anthologie basée sur le film éponyme de 1996, écrit et réalisé par les frères Coen.');
        $program4->setPoster('https://m.media-amazon.com/images/M/MV5BNDJiZDgyZjctYmRjMS00ZjdkLTkwMTEtNGU1NDg3NDQ0Yzk1XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg');
        $program4->setCategory($this->getReference('category_Comedie'));
        $manager->persist($program4);

        $program5 = new Program();
        $program5->setTitle('The Boys');
        $program5->setSynopsis('Dans un monde fictif où les super-héros se sont laissés corrompre par la célébrité et la gloire et ont peu à peu révélé la part sombre de leur personnalité.');
        $program5->setPoster('https://m.media-amazon.com/images/M/MV5BOTEyNDJhMDAtY2U5ZS00OTMzLTkwODktMjU3MjFkZWVlMGYyXkEyXkFqcGdeQXVyMjkwOTAyMDU@._V1_FMjpg_UX1000_.jpg');
        $program5->setCategory($this->getReference('category_Action'));
        $manager->persist($program5);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
