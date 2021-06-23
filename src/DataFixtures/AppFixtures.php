<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Product;
use App\Entity\Customer;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
         private $passwordHasher;

         public function __construct(UserPasswordHasherInterface $passwordHasher)
         {
             $this->passwordHasher = $passwordHasher;
        }

    public function load(ObjectManager $manager)
    {

        
        $listProduct = [
            [
                'name' =>'Iphone 11',
                'brand' => 'Apple',
                'battery' => 'Lithium Ion',
                'ram' => '6 Go',
                'generation' => '4G',
                'system' => 'iOS 13',
                'intern_memory' => '64 Go',
                'description' => 'Double appareil photo. Autonomie d’une journée1. Le verre le
                plus résistant sur smartphone. Et la puce Apple la plus rapide à ce jour.',
                'price' => '689.00'
            ],
            [
                'name' =>'Iphone 12 pro Max',
                'brand' => 'Apple',
                'battery' => 'Lithium Ion',
                'ram' => '8 Go',
                'generation' => '5G',
                'system' => 'iOS 14',
                'intern_memory' => '128 Go',
                'description' => 'L\'iPhone 12 Pro Max est le modèle grand-format haut de gamme de la 14e génération de smartphone.',
                'price' => '1259.00'
            ],
            [
                'name' =>'Galaxy A21s Noir',
                'brand' => 'Samsung',
                'battery' => '5000 mAh',
                'ram' => '4 Go',
                'generation' => '4G',
                'system' => 'Androïd',
                'intern_memory' => '32 Go',
                'description' => 'Le Galaxy A21s dispose d\'un écran sans bord le rendant plus compact. 
                Ses courbes ont été conçues pour une prise en main agréable et sûre lors de l\'utilisation. ',
                'price' => '168.95'
            ],
            [
                'name' =>'Redmi Note 8 pro vert',
                'brand' => 'Xiaomi',
                'battery' => '4500 mAh',
                'ram' => '6 Go',
                'generation' => '4G',
                'system' => 'Androïd',
                'intern_memory' => '64 Go',
                'description' => 'Découvrez le nouveau Redmi Note 8 Pro vert ! Prendre des photos deviendra votre nouvelle passion !',
                'price' => '250.90'
            ],
            
        ];

        $listCustomer = [
            [
                'email' => 'michelBernard@gmail.com',
                'username' => 'Michel'
                
            ],
            [
                'email' => 'marie.therese@gmail.com',
                'username' => 'Batignolles'
            ],
            [
                'email' => 'gnosprick@gmail.com',
                'username' => 'Hermon'
            ],
            [
                'email' => 'emmanuel@gmail.com',
                'username' => 'Flinch'
            ],
            [
                'email' => 'juliengern@gmail.com',
                'username' => 'Julien'
            ],
            [
                'email' => 'bernadette@gmail.com',
                'username' => 'Marne'
            ],
            [
                'email' => 'mathildejick@gmail.com',
                'username' => 'Mathilde'
            ],
            [
                'email' => 'robert.lui@gmail.com',
                'username' => 'Lui Robert'
            ],
            [
                'email' => 'dark@gmail.com',
                'username' => 'Vador'
            ],
        ];

        $user = new User;

        $user->setEmail('jean.fourcheraude@gmail.com');
        $user->setPassword($this->passwordHasher->hashPassword($user,"123456"));
        $user->setName('Fourcheraude');
        $user->setCreatedAt(new \DateTime('+2 days'));
        $manager->persist($user);
        $allUser[] = $user;
        $manager->flush();

    
        foreach($listProduct as $productListed)
        {
            $product = new Product();
            $product->setName($productListed['name']);
            $product->setBrand($productListed['brand']);
            $product->setBattery($productListed['battery']);
            $product->setRam($productListed['ram']);
            $product->setGeneration($productListed['generation']);
            $product->setSystem($productListed['system']);
            $product->setInternMemory($productListed['intern_memory']);
            $product->setDescription($productListed['description']);
            $product->setPrice($productListed['price']);
            $product->setCreatedAt(new \DateTime('+4 days'));
            $manager->persist($product);
        }
               
        $manager->flush();

        foreach($listCustomer as $CustomerListed)
        {
            $customer = new Customer;
            $customer->setEmail($CustomerListed['email']);
            $customer->setUsername($CustomerListed['username']);
            $customer->setCreatedAt( new \DateTime('+8 days'));
            $customer->setApiUser($allUser[0]);
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
