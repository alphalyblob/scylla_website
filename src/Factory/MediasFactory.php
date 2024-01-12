<?php

namespace App\Factory;

use App\Entity\Medias;
use Zenstruck\Foundry\Proxy;
use App\Factory\CoursFactory;
use App\Factory\EvenementsFactory;
use Zenstruck\Foundry\ModelFactory;
use App\Repository\MediasRepository;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Medias>
 *
 * @method        Medias|Proxy                     create(array|callable $attributes = [])
 * @method static Medias|Proxy                     createOne(array $attributes = [])
 * @method static Medias|Proxy                     find(object|array|mixed $criteria)
 * @method static Medias|Proxy                     findOrCreate(array $attributes)
 * @method static Medias|Proxy                     first(string $sortedField = 'id')
 * @method static Medias|Proxy                     last(string $sortedField = 'id')
 * @method static Medias|Proxy                     random(array $attributes = [])
 * @method static Medias|Proxy                     randomOrCreate(array $attributes = [])
 * @method static MediasRepository|RepositoryProxy repository()
 * @method static Medias[]|Proxy[]                 all()
 * @method static Medias[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Medias[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Medias[]|Proxy[]                 findBy(array $attributes)
 * @method static Medias[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Medias[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class MediasFactory extends ModelFactory
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
        $uneImage = "https://picsum.photos/200";
        return [
            'chemin' => $uneImage,
            'cours' => CoursFactory::random(),
            'dateCreation' => self::faker()->dateTime(),
            'evenement' => EvenementsFactory::random(),
            'mediaFormat' => self::faker()->word(),
            'taille' => self::faker()->randomNumber(),
            'titre' => self::faker()->text(70),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Medias $medias): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Medias::class;
    }
}
