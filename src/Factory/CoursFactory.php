<?php

namespace App\Factory;

use DateTime;
use App\Entity\Cours;
use Zenstruck\Foundry\Proxy;
use App\Factory\AteliersFactory;
use App\Repository\CoursRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Cours>
 *
 * @method        Cours|Proxy                     create(array|callable $attributes = [])
 * @method static Cours|Proxy                     createOne(array $attributes = [])
 * @method static Cours|Proxy                     find(object|array|mixed $criteria)
 * @method static Cours|Proxy                     findOrCreate(array $attributes)
 * @method static Cours|Proxy                     first(string $sortedField = 'id')
 * @method static Cours|Proxy                     last(string $sortedField = 'id')
 * @method static Cours|Proxy                     random(array $attributes = [])
 * @method static Cours|Proxy                     randomOrCreate(array $attributes = [])
 * @method static CoursRepository|RepositoryProxy repository()
 * @method static Cours[]|Proxy[]                 all()
 * @method static Cours[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Cours[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Cours[]|Proxy[]                 findBy(array $attributes)
 * @method static Cours[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Cours[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class CoursFactory extends ModelFactory
{
    private const HORAIRE_EX = ['Mercredi de 20h à 22h30', 'Jeudi de 19h à 20h30', 'Lundi de 18h15 à 20h', 'Lundi de 20h15 à 22h45'];


    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        $unHoraire = self::faker()->randomElement(self::HORAIRE_EX);
        $saisonDeb = new \DateTime('2023-09-01');
        $saisonFin = new \DateTime('2024-07-01');
        

        return [
            'atelier' => AteliersFactory::random(),
            'debutSaison' => $saisonDeb,
            'descriptif' => self::faker()->text(),
            'finSaison' => $saisonFin,
            'horaire' => $unHoraire,
            'label' => self::faker()->text(50),
            'lieu' => self::faker()->address(255),
            'niveau' => self::faker()->word(150),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */


    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Cours $cours): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Cours::class;
    }
}
