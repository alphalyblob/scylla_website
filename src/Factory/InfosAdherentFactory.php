<?php

namespace App\Factory;

use App\Entity\Adherent;
use Zenstruck\Foundry\Proxy;
use App\Entity\InfosAdherent;
use App\Factory\AdherentFactory;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\RepositoryProxy;
use App\Repository\InfosAdherentRepository;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints\Unique;

/**
 * @extends ModelFactory<InfosAdherent>
 *
 * @method        InfosAdherent|Proxy                     create(array|callable $attributes = [])
 * @method static InfosAdherent|Proxy                     createOne(array $attributes = [])
 * @method static InfosAdherent|Proxy                     find(object|array|mixed $criteria)
 * @method static InfosAdherent|Proxy                     findOrCreate(array $attributes)
 * @method static InfosAdherent|Proxy                     first(string $sortedField = 'id')
 * @method static InfosAdherent|Proxy                     last(string $sortedField = 'id')
 * @method static InfosAdherent|Proxy                     random(array $attributes = [])
 * @method static InfosAdherent|Proxy                     randomOrCreate(array $attributes = [])
 * @method static InfosAdherentRepository|RepositoryProxy repository()
 * @method static InfosAdherent[]|Proxy[]                 all()
 * @method static InfosAdherent[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static InfosAdherent[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static InfosAdherent[]|Proxy[]                 findBy(array $attributes)
 * @method static InfosAdherent[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static InfosAdherent[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class InfosAdherentFactory extends ModelFactory
{
    private static $adherents = [];
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

        // Vérifier si l'adhérent est déjà associé à une InfosAdherent
        $existingInfosAdherent = InfosAdherentFactory::repository()->findOneBy(['adherent' => $adherent]);

       

        // Si l'adhérent est déjà associé à une InfosAdherent, en choisir un autre
        while ($existingInfosAdherent) {
            $adherent = AdherentFactory::randomOrCreate();
            $existingInfosAdherent = InfosAdherentFactory::repository()->findOneBy(['adherent' => $adherent]);
        }
        unset($existingInfosAdherent);
        
        return [
            'adherent' => $adherent,
            'adresse' => self::faker()->address(255),
            'dateNaissance' => self::faker()->dateTime(),
            'nom' => self::faker()->lastName(150),
            'pratique' => self::faker()->text(100),
            'prenom' => self::faker()->firstName(100),
            'telephone' => self::faker()->phoneNumber(20),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */

  
    
      
 
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(InfosAdherent $infosAdherent): void {})
        ;
    }

    protected static function getClass(): string
    {
        return InfosAdherent::class;
    }
}
