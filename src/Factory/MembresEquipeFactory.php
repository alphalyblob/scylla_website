<?php

namespace App\Factory;

use Zenstruck\Foundry\Proxy;
use App\Entity\MembresEquipe;
use App\Factory\AdherentFactory;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\RepositoryProxy;
use App\Repository\MembresEquipeRepository;

/**
 * @extends ModelFactory<MembresEquipe>
 *
 * @method        MembresEquipe|Proxy                     create(array|callable $attributes = [])
 * @method static MembresEquipe|Proxy                     createOne(array $attributes = [])
 * @method static MembresEquipe|Proxy                     find(object|array|mixed $criteria)
 * @method static MembresEquipe|Proxy                     findOrCreate(array $attributes)
 * @method static MembresEquipe|Proxy                     first(string $sortedField = 'id')
 * @method static MembresEquipe|Proxy                     last(string $sortedField = 'id')
 * @method static MembresEquipe|Proxy                     random(array $attributes = [])
 * @method static MembresEquipe|Proxy                     randomOrCreate(array $attributes = [])
 * @method static MembresEquipeRepository|RepositoryProxy repository()
 * @method static MembresEquipe[]|Proxy[]                 all()
 * @method static MembresEquipe[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static MembresEquipe[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static MembresEquipe[]|Proxy[]                 findBy(array $attributes)
 * @method static MembresEquipe[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static MembresEquipe[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class MembresEquipeFactory extends ModelFactory
{
    private const FONCTION_EX = ['Présidente et Directrice artistique', 'Vice Président', 'Secrétaire', 'Trésorière'];
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
        $uneFonction = self::faker()->randomElement(self::FONCTION_EX);

        $adherent = null;

        // Boucle pour continuer à choisir aléatoirement jusqu'à ce que les conditions soient remplies
        while ($adherent === null || !in_array('ROLE_GESTION', $adherent->getRoles()) && !in_array('ROLE_MEMBRE', $adherent->getRoles())) {
            // Choisir un adhérent aléatoire (créer s'il n'existe pas encore)
            $adherent = AdherentFactory::randomOrCreate();
        
            // Vérifier si l'adhérent est déjà associé à une MembresEquipe
            $existingMembresEquipe = MembresEquipeFactory::repository()->findOneBy(['adherent' => $adherent]);
        
            // Si l'adhérent est déjà associé à une MembresEquipe, en choisir un autre
            while ($existingMembresEquipe) {
                $adherent = AdherentFactory::randomOrCreate();
                $existingMembresEquipe = MembresEquipeFactory::repository()->findOneBy(['adherent' => $adherent]);
            }
        }
        unset($existingMembresEquipe);


        return [
            'adherent' => $adherent,
            'fonction' => $uneFonction,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    
    protected function initialize(): self
    {
        return $this
            ->afterInstantiate(function(MembresEquipe $membresEquipe): void {})
        ;
    }

    protected static function getClass(): string
    {
        return MembresEquipe::class;
    }
}
