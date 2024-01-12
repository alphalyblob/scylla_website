<?php

namespace App\Factory;

use Zenstruck\Foundry\Proxy;
use App\Factory\CoursFactory;
use App\Factory\AdherentFactory;
use App\Entity\ParticipantsCours;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\RepositoryProxy;
use App\Repository\ParticipantsCoursRepository;

/**
 * @extends ModelFactory<ParticipantsCours>
 *
 * @method        ParticipantsCours|Proxy                     create(array|callable $attributes = [])
 * @method static ParticipantsCours|Proxy                     createOne(array $attributes = [])
 * @method static ParticipantsCours|Proxy                     find(object|array|mixed $criteria)
 * @method static ParticipantsCours|Proxy                     findOrCreate(array $attributes)
 * @method static ParticipantsCours|Proxy                     first(string $sortedField = 'id')
 * @method static ParticipantsCours|Proxy                     last(string $sortedField = 'id')
 * @method static ParticipantsCours|Proxy                     random(array $attributes = [])
 * @method static ParticipantsCours|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ParticipantsCoursRepository|RepositoryProxy repository()
 * @method static ParticipantsCours[]|Proxy[]                 all()
 * @method static ParticipantsCours[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static ParticipantsCours[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static ParticipantsCours[]|Proxy[]                 findBy(array $attributes)
 * @method static ParticipantsCours[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static ParticipantsCours[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ParticipantsCoursFactory extends ModelFactory
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

        // Vérifier si l'adhérent est déjà associé à un ParticipantsCours
        $existingParticipantsCours = ParticipantsCoursFactory::repository()->findOneBy(['adherent' => $adherent]);

       

        // Si l'adhérent est déjà associé à une ParticipantsCours, en choisir un autre
        while ($existingParticipantsCours) {
            $adherent = AdherentFactory::randomOrCreate();
            $existingParticipantsCours = ParticipantsCoursFactory::repository()->findOneBy(['adherent' => $adherent]);
        }
        unset($existingParticipantsCours);
        
        return [
            'adherent' => $adherent,
            'cours' => CoursFactory::randomSet(mt_rand(1, 6)), // Utiliser randomSet avec une plage de 1 à 6
            
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            ->afterInstantiate(function(ParticipantsCours $participantsCours): void {})
        ;
    }

    protected static function getClass(): string
    {
        return ParticipantsCours::class;
    }
}
