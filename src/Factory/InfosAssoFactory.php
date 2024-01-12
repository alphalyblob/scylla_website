<?php

namespace App\Factory;

use App\Entity\InfosAsso;
use App\Repository\InfosAssoRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<InfosAsso>
 *
 * @method        InfosAsso|Proxy                     create(array|callable $attributes = [])
 * @method static InfosAsso|Proxy                     createOne(array $attributes = [])
 * @method static InfosAsso|Proxy                     find(object|array|mixed $criteria)
 * @method static InfosAsso|Proxy                     findOrCreate(array $attributes)
 * @method static InfosAsso|Proxy                     first(string $sortedField = 'id')
 * @method static InfosAsso|Proxy                     last(string $sortedField = 'id')
 * @method static InfosAsso|Proxy                     random(array $attributes = [])
 * @method static InfosAsso|Proxy                     randomOrCreate(array $attributes = [])
 * @method static InfosAssoRepository|RepositoryProxy repository()
 * @method static InfosAsso[]|Proxy[]                 all()
 * @method static InfosAsso[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static InfosAsso[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static InfosAsso[]|Proxy[]                 findBy(array $attributes)
 * @method static InfosAsso[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static InfosAsso[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class InfosAssoFactory extends ModelFactory
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
        $unNom = 'Scylla - Arts De La Scène';
       
        return [
            'description' => self::faker()->text(),
            'mail' => self::faker()->email(),
            'nom' => $unNom,
            'siege' => self::faker()->address(),
            'telephone' => self::faker()->phoneNumber(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(InfosAsso $infosAsso): void {})
        ;
    }

    protected static function getClass(): string
    {
        return InfosAsso::class;
    }
}
