<?php

namespace App\Factory;

use App\Entity\Seances;
use Zenstruck\Foundry\Proxy;
use App\Factory\CoursFactory;
use Zenstruck\Foundry\ModelFactory;
use App\Repository\SeancesRepository;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Seances>
 *
 * @method        Seances|Proxy                     create(array|callable $attributes = [])
 * @method static Seances|Proxy                     createOne(array $attributes = [])
 * @method static Seances|Proxy                     find(object|array|mixed $criteria)
 * @method static Seances|Proxy                     findOrCreate(array $attributes)
 * @method static Seances|Proxy                     first(string $sortedField = 'id')
 * @method static Seances|Proxy                     last(string $sortedField = 'id')
 * @method static Seances|Proxy                     random(array $attributes = [])
 * @method static Seances|Proxy                     randomOrCreate(array $attributes = [])
 * @method static SeancesRepository|RepositoryProxy repository()
 * @method static Seances[]|Proxy[]                 all()
 * @method static Seances[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Seances[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Seances[]|Proxy[]                 findBy(array $attributes)
 * @method static Seances[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Seances[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class SeancesFactory extends ModelFactory
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
            'cours' => CoursFactory::random(),
            'dateDebut' => self::faker()->dateTime(),
            'dateFin' => self::faker()->dateTime(),
            'infos' => self::faker()->text(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Seances $seances): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Seances::class;
    }
}
