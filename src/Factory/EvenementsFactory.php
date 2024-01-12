<?php

namespace App\Factory;

use App\Entity\Evenements;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\ModelFactory;
use App\Factory\TypeEvenementFactory;
use Zenstruck\Foundry\RepositoryProxy;
use App\Repository\EvenementsRepository;

/**
 * @extends ModelFactory<Evenements>
 *
 * @method        Evenements|Proxy                     create(array|callable $attributes = [])
 * @method static Evenements|Proxy                     createOne(array $attributes = [])
 * @method static Evenements|Proxy                     find(object|array|mixed $criteria)
 * @method static Evenements|Proxy                     findOrCreate(array $attributes)
 * @method static Evenements|Proxy                     first(string $sortedField = 'id')
 * @method static Evenements|Proxy                     last(string $sortedField = 'id')
 * @method static Evenements|Proxy                     random(array $attributes = [])
 * @method static Evenements|Proxy                     randomOrCreate(array $attributes = [])
 * @method static EvenementsRepository|RepositoryProxy repository()
 * @method static Evenements[]|Proxy[]                 all()
 * @method static Evenements[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Evenements[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Evenements[]|Proxy[]                 findBy(array $attributes)
 * @method static Evenements[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Evenements[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class EvenementsFactory extends ModelFactory
{
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
        return [
            'date' => self::faker()->dateTime(),
            'descriptif' => self::faker()->text(),
            'titre' => self::faker()->text(50),
            'typeEvenement' => TypeEvenementFactory::random(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Evenements $evenements): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Evenements::class;
    }
}
