<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAMS = [
        ['Title' => 'Breaking Bad', 'Synopsis' => 'Walter White, 50 ans commence à faire du crystal meth', 'Poster' => 'https://m.media-amazon.com/images/M/MV5BMTczMTY0MTMzOV5BMl5BanBnXkFtZTcwNDQxMTk4Nw@@._V1_.jpg', 'Category' => 'Drame', 'Year' => 2008, 'Country' => 'États-Unis'],
        ['Title' => 'Black Mirror', 'Synopsis' => 'Sous un angle noir et souvent satirique, la série envisage un futur proche, voire immédiat.', 'Poster' => 'https://m.media-amazon.com/images/M/MV5BYTM3YWVhMDMtNjczMy00NGEyLWJhZDctYjNhMTRkNDE0ZTI1XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UX1000_.jpg', 'Category' => 'Science-Fiction', 'Year' => 2011, 'Country' => 'Grande-Bretagne'],
        ['Title' => 'The Leftovers', 'Synopsis' => 'Du jour au lendemain, un 14 octobre en apparence ordinaire, 2% de la population disparaît mystérieusement de la surface de la terre.', 'Poster' => 'https://m.media-amazon.com/images/M/MV5BNTE3MDc1MjY4NV5BMl5BanBnXkFtZTgwMDg4MjQ4MTE@._V1_FMjpg_UX1000_.jpg', 'Category' => 'Drame', 'Year' => 2014, 'Country' => 'États-Unis'],
        ['Title' => 'Fargo', 'Synopsis' => 'Fargo est une série d\'anthologie basée sur le film éponyme de 1996, écrit et réalisé par les frères Coen.', 'Poster' => 'https://m.media-amazon.com/images/M/MV5BNDJiZDgyZjctYmRjMS00ZjdkLTkwMTEtNGU1NDg3NDQ0Yzk1XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg', 'Category' => 'Comedie', 'Year' => 2014, 'Country' => 'États-Unis'],
        ['Title' => 'The Boys', 'Synopsis' => 'Dans un monde fictif où les super-héros se sont laissés corrompre par la célébrité et la gloire et ont peu à peu révélé la part sombre de leur personnalité.', 'Poster' => 'https://imgsrc.cineserie.com/2018/09/the-boys-tv-series-poster.jpg?ver=1', 'Category' => 'Action', 'Year' => 2019, 'Country' => 'États-Unis']
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMS as $key => $tvshow) {
            $program = new Program();
            $program->setTitle($tvshow['Title']);
            $program->setSynopsis($tvshow['Synopsis']);
            $program->setPoster($tvshow['Poster']);
            $program->setYear($tvshow['Year']);
            $program->setCountry($tvshow['Country']);
            $program->setCategory($this->getReference('category_' . $tvshow['Category']));
            $manager->persist($program);
            $this->addReference('program_' . $key, $program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
