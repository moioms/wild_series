<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAM = [
        [
            'title' => 'Rick et Morty',
            'synopsis' => "Rick est un scientifique âgé et déséquilibré qui a récemment renoué avec sa famille. Il passe le plus clair de son temps à entraîner son petit-fils Morty dans des aventures extraordinaires et dangereuses, à travers l'espace et dans des univers parallèles. Ajoutés à la vie de famille déjà instable de Morty, ces événements n'amènent qu'un surcroît de stress pour Morty, à la maison et à l'école...",
            'poster' => 'https://www.themoviedb.org/t/p/w300_and_h450_bestv2/s11re4xQLZ6pRPv2sqXnK8CCvGn.jpg',
            'category' => 'category_Animation'
            ],
        [
            'title' => 'House of the Dragon',
            'synopsis' => "Près de 200 ans avant les évènements de Games of Thrones, le continent de Westeros est en proie à de nombreux dangers. Une guerre civile se prépare dans différents endroits du royaume : cette guerre sera appelée la Danse des Dragons. De son côté, la maison Targaryen se disloque peu à peu et le règne des dragons est menacé.",
            'poster' => 'https://www.themoviedb.org/t/p/w300_and_h450_bestv2/zzLJ2gSwmXPcilaigMDi9G8JFfK.jpg',
            'category' => 'category_Fantastique'
            ],
        [
            'title' => 'Le Seigneur des anneaux : Les Anneaux de pouvoir',
            'synopsis' => "Divers personnages, connus et inconnus, doivent faire face à la résurgence du mal en Terre du Milieu. Des profondeurs des Montagnes de Brume aux forêts majestueuses du Lindon, de l'île des Rois de Númenor aux contrées les plus éloignées du monde, ces royaumes et personnages vont forger un héritage qui demeurera bien après leur disparition.",
            'poster' => 'https://www.themoviedb.org/t/p/w300_and_h450_bestv2/gpHezxjqAnZ21o8T9vSSrUKygQ3.jpg',
            'category' => 'category_Fantastique'
            ],
        [
            'title' => 'Breaking Bad',
            'synopsis' => "Walter White, professeur de chimie dans un lycée d'Albuquerque au Nouveau-Mexique, est atteint d'un cancer pulmonaire en phase terminale. Il s'associe à Jesse Pinkman, un ancien élève, cancre, toxicomane et dealer, afin d'assurer l'avenir financier de sa famille après son décès. L'improbable duo va alors synthétiser et commercialiser la plus pure méthamphétamine en cristaux jamais vue dans les Amériques.",
            'poster' => 'https://www.themoviedb.org/t/p/w300_and_h450_bestv2/ggFHVNu6YYI5L9pCfOacjizRGt.jpg',
            'category' => 'category_Drame'
            ],
        [
            'title' => 'The Walking Dead',
            'synopsis' => "Après une apocalypse, ayant transformé la quasi-totalité de la population en zombies, un groupe d'hommes et de femmes, mené par le shérif adjoint Rick Grimes, tente de survivre... Ensemble, ils vont devoir, tant bien que mal, faire face à ce nouveau monde, devenu méconnaissable, à travers leur périple dans le Sud profond des États-Unis.",
            'poster' => 'https://www.themoviedb.org/t/p/w300_and_h450_bestv2/4UZzJ65UxR6AsKL6zjFWNYAKb3w.jpg',
            'category' => 'category_Horreur'
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        
        foreach (self::PROGRAM as $key => $programValue) {

            $program = new Program();
            $program->setTitle($programValue['title']);
            $program->setSynopsis($programValue['synopsis']);
            $program->setPoster($programValue['poster']);
            $program->setCategory($this->getReference($programValue['category']));
            $manager->persist($program);
            $this->addReference('program_' . $programTitle, $program);
        }
     
        $manager->flush();

    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          CategoryFixtures::class,
        ];
    }
}
