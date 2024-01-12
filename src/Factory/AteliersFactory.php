<?php

namespace App\Factory;

use App\Entity\Ateliers;
use App\Repository\AteliersRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Ateliers>
 *
 * @method        Ateliers|Proxy                     create(array|callable $attributes = [])
 * @method static Ateliers|Proxy                     createOne(array $attributes = [])
 * @method static Ateliers|Proxy                     find(object|array|mixed $criteria)
 * @method static Ateliers|Proxy                     findOrCreate(array $attributes)
 * @method static Ateliers|Proxy                     first(string $sortedField = 'id')
 * @method static Ateliers|Proxy                     last(string $sortedField = 'id')
 * @method static Ateliers|Proxy                     random(array $attributes = [])
 * @method static Ateliers|Proxy                     randomOrCreate(array $attributes = [])
 * @method static AteliersRepository|RepositoryProxy repository()
 * @method static Ateliers[]|Proxy[]                 all()
 * @method static Ateliers[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Ateliers[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Ateliers[]|Proxy[]                 findBy(array $attributes)
 * @method static Ateliers[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Ateliers[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class AteliersFactory extends ModelFactory
{

    private const LABEL_EX = ['Theatre', 'Chant', 'Danse'];
    
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
        $unLabel = self::faker()->randomElement(self::LABEL_EX);
        return [
            'description' => self::faker()->text(),
            'label' => $unLabel,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */


    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Ateliers $ateliers): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Ateliers::class;
    }
}
