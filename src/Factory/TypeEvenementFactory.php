<?php

namespace App\Factory;

use App\Entity\TypeEvenement;
use App\Repository\TypeEvenementRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<TypeEvenement>
 *
 * @method        TypeEvenement|Proxy                     create(array|callable $attributes = [])
 * @method static TypeEvenement|Proxy                     createOne(array $attributes = [])
 * @method static TypeEvenement|Proxy                     find(object|array|mixed $criteria)
 * @method static TypeEvenement|Proxy                     findOrCreate(array $attributes)
 * @method static TypeEvenement|Proxy                     first(string $sortedField = 'id')
 * @method static TypeEvenement|Proxy                     last(string $sortedField = 'id')
 * @method static TypeEvenement|Proxy                     random(array $attributes = [])
 * @method static TypeEvenement|Proxy                     randomOrCreate(array $attributes = [])
 * @method static TypeEvenementRepository|RepositoryProxy repository()
 * @method static TypeEvenement[]|Proxy[]                 all()
 * @method static TypeEvenement[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static TypeEvenement[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static TypeEvenement[]|Proxy[]                 findBy(array $attributes)
 * @method static TypeEvenement[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static TypeEvenement[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class TypeEvenementFactory extends ModelFactory
{
    private const TYPE_EVENT_EX = ['Projection', 'Spectacle', 'Stage', 'Tournage', 'Vente'];
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
        $unTypeEvenement = self::faker()->randomElement(self::TYPE_EVENT_EX);
        return [
            'label' => $unTypeEvenement,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
     
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(TypeEvenement $typeEvenement): void {})
        ;
    }

    protected static function getClass(): string
    {
        return TypeEvenement::class;
    }
}
