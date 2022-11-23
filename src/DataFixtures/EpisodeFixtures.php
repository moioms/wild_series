<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach ($episode as $key => $episodeValue) {
            $episode = new Episode();
            $episode->setTitle($episodeTitle);
            $episode->setNumber($episodeNumber);
            $season->setSynopsis($episodeSynopsis);
            $season->setSeason($this->getReference($SeasonNumber));
            $manager->persist($season);
            $this->addReference('season_' . $seasonNumber, $season);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont EpisodeFixtures dépend
        return [
          SeasonFixtures::class,
        ];
    }
}
