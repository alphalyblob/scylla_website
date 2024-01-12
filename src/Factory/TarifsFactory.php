<?php

namespace App\Factory;

use App\Entity\Tarifs;
use App\Repository\TarifsRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Tarifs>
 *
 * @method        Tarifs|Proxy                     create(array|callable $attributes = [])
 * @method static Tarifs|Proxy                     createOne(array $attributes = [])
 * @method static Tarifs|Proxy                     find(object|array|mixed $criteria)
 * @method static Tarifs|Proxy                     findOrCreate(array $attributes)
 * @method static Tarifs|Proxy                     first(string $sortedField = 'id')
 * @method static Tarifs|Proxy                     last(string $sortedField = 'id')
 * @method static Tarifs|Proxy                     random(array $attributes = [])
 * @method static Tarifs|Proxy                     randomOrCreate(array $attributes = [])
 * @method static TarifsRepository|RepositoryProxy repository()
 * @method static Tarifs[]|Proxy[]                 all()
 * @method static Tarifs[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Tarifs[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Tarifs[]|Proxy[]                 findBy(array $attributes)
 * @method static Tarifs[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Tarifs[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class TarifsFactory extends ModelFactory
{
    private const PRIX_EX = ['335', '500', '240', '820', '610'];
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
        $unPrix = self::faker()->randomElement(self::PRIX_EX);
        return [
            'formule' => self::faker()->text(255),
            'prix' => $unPrix,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Tarifs $tarifs): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Tarifs::class;
    }
}
