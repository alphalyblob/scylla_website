<?php

namespace App\Factory;

use App\Entity\Adherent;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\ModelFactory;
use App\Repository\AdherentRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @extends ModelFactory<Adherent>
 *
 * @method        Adherent|Proxy                     create(array|callable $attributes = [])
 * @method static Adherent|Proxy                     createOne(array $attributes = [])
 * @method static Adherent|Proxy                     find(object|array|mixed $criteria)
 * @method static Adherent|Proxy                     findOrCreate(array $attributes)
 * @method static Adherent|Proxy                     first(string $sortedField = 'id')
 * @method static Adherent|Proxy                     last(string $sortedField = 'id')
 * @method static Adherent|Proxy                     random(array $attributes = [])
 * @method static Adherent|Proxy                     randomOrCreate(array $attributes = [])
 * @method static AdherentRepository|RepositoryProxy repository()
 * @method static Adherent[]|Proxy[]                 all()
 * @method static Adherent[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Adherent[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Adherent[]|Proxy[]                 findBy(array $attributes)
 * @method static Adherent[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Adherent[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class AdherentFactory extends ModelFactory
{
    private static $createdAdherents = [];
    private $passwordHasher;
    private const ROLES_EX = ['ROLE_GESTION', 'ROLE_MEMBRE', 'ROLE_USER'];

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        parent::__construct();
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        $adherent = self::faker()->unique()->email;

        // Vérifier si l'adhérent a déjà été créé
        while (in_array($adherent, self::$createdAdherents)) {
            $adherent = self::faker()->unique()->email;
        }

        self::$createdAdherents[] = $adherent;
        unset($createdAdherents);


        $unRole = self::faker()->randomElement(self::ROLES_EX);
        return [
            // self::faker()->email(180),
            'email' => $adherent, 
            'password' => '1234',
            'roles' => [$unRole],
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */


    protected function initialize(): self
    {
        return $this
            ->afterInstantiate(function(Adherent $adherent) {
                $adherent->setPassword($this->passwordHasher->hashPassword($adherent, $adherent->getPassword()));
            })
        ;
    }

    protected static function getClass(): string
    {
        return Adherent::class;
    }
}
