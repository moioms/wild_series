<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    // const SEASON = [
    //     [
    //         'number' => 1,
    //         'year' => 2010,
    //         'description' => "Rick Grimes, shérif adjoint, se réveille à l'hôpital après un long coma de plusieurs mois. Il découvre, grâce à Morgan Jones, que la population entière a été ravagée par une épidémie d'origine inconnue... Parti sur les traces de sa femme Lori et de son fils Carl, Rick arrive en Atlanta où, avec un groupe de rescapés, il va devoir apprendre à survivre et à tuer, tout en cherchant une solution ou un remède à cette épidémie.",
    //         'program' => 'The Walking Dead'
    //     ],
    //     [
    //         'number' => 2,
    //         'year' => 2011,
    //         'description' => "Le groupe de survivants mené par Rick Grimes arrive dans une ferme pour survivre aux rôdeurs.",
    //         'program' => 'The Walking Dead'
    //     ],
    //     [
    //         'number' => 3,
    //         'year' => 2012,
    //         'description' => "Après avoir été contraint de quitter en hâte la ferme de Hershel sous l'assaut des rôdeurs, le petit groupe erre péniblement dans un monde de plus en plus chaotique et dangereux, tandis que la grossesse de Lori arrive bientôt à son terme. Par hasard, Rick découvre un endroit potentiellement sûr : une prison. Lui et les siens décident alors d'y prendre leurs quartiers. De son côté, Andrea, qui a été laissée pour morte par le groupe après l'incendie de la ferme, s'est fait une nouvelle amie en la personne de Michonne.",
    //         'program' => 'The Walking Dead'
    //     ],
    //     [
    //         'number' => 4,
    //         'year' => 2013,
    //         'description' => "Plusieurs mois après les derniers évènements, les occupants de la prison, qui ont réussi à la sécuriser à nouveau depuis la disparition du Gouverneur, accueillent désormais une grande population de survivants et la vie reprend peu à peu son cours. Toutefois, les épreuves de Woodbury ont laissé des traces : Rick, qui n'est plus que « l'ombre de lui-même », refuse de porter son arme, allant même jusqu’à céder sa place de leader au sein du groupe à un Conseil qui se compose de Hershel, Sasha, Glenn, Daryl et Carol.",
    //         'program' => 'The Walking Dead'
    //     ],
    //     [
    //         'number' => 5,
    //         'year' => 2014,
    //         'description' => "Rick Grimes et son groupe ont fui le Terminus et arrivent au sein d'Alexandria, une ville fortifiée, dressée dès le début de l'épidémie.",
    //         'program' => 'The Walking Dead'
    //     ]
        
    //     ];
    public function load(ObjectManager $manager): void
    {
        foreach ($season as $key => $seasonValue) {
            $season = new Season();
            $season->setNumber($SeasonNumber);
            $season->setYear($SeasoonYear);
            $season->setDescription($SeasonDescription);
            $season->setProgram($this->getReference($programTitle));
            $manager->persist($season);
            $this->addReference('season_' . $seasonNumber, $season);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont SeasonFixtures dépend
        return [
          ProgramFixtures::class,
        ];
    }
}
