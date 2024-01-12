<?php

namespace App\Factory;

use Zenstruck\Foundry\Proxy;
use App\Factory\AdherentFactory;
use App\Factory\EvenementsFactory;
use Zenstruck\Foundry\ModelFactory;
use App\Entity\ParticipantsEvenements;
use Zenstruck\Foundry\RepositoryProxy;
use App\Repository\ParticipantsEvenementsRepository;

/**
 * @extends ModelFactory<ParticipantsEvenements>
 *
 * @method        ParticipantsEvenements|Proxy                     create(array|callable $attributes = [])
 * @method static ParticipantsEvenements|Proxy                     createOne(array $attributes = [])
 * @method static ParticipantsEvenements|Proxy                     find(object|array|mixed $criteria)
 * @method static ParticipantsEvenements|Proxy                     findOrCreate(array $attributes)
 * @method static ParticipantsEvenements|Proxy                     first(string $sortedField = 'id')
 * @method static ParticipantsEvenements|Proxy                     last(string $sortedField = 'id')
 * @method static ParticipantsEvenements|Proxy                     random(array $attributes = [])
 * @method static ParticipantsEvenements|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ParticipantsEvenementsRepository|RepositoryProxy repository()
 * @method static ParticipantsEvenements[]|Proxy[]                 all()
 * @method static ParticipantsEvenements[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static ParticipantsEvenements[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static ParticipantsEvenements[]|Proxy[]                 findBy(array $attributes)
 * @method static ParticipantsEvenements[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static ParticipantsEvenements[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ParticipantsEvenementsFactory extends ModelFactory
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
        $adherent = AdherentFactory::randomOrCreate();

        // Vérifier si l'adhérent est déjà associé à un ParticipantsEvenements
        $existingParticipantsEvenements = ParticipantsEvenementsFactory::repository()->findOneBy(['adherent' => $adherent]);

       

        // Si l'adhérent est déjà associé à une ParticipantsEvenements, en choisir un autre
        while ($existingParticipantsEvenements) {
            $adherent = AdherentFactory::randomOrCreate();
            $existingParticipantsEvenements = ParticipantsEvenementsFactory::repository()->findOneBy(['adherent' => $adherent]);
        }
        unset($existingParticipantsEvenements);


        return [
            'adherent' => $adherent,
            'evenement' => EvenementsFactory::randomSet(mt_rand(1, 6)), // Utiliser randomSet avec une plage de 1 à 6
            
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(ParticipantsEvenements $participantsEvenements): void {})
        ;
    }

    protected static function getClass(): string
    {
        return ParticipantsEvenements::class;
    }
}
