<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Phone;
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
    
            $listCustomer0 = [
                [
                    'email' => 'michelBernard@gmail.com',
                    'username' => 'Michel',
                    'name' => 'Michel',
                    'surname' => 'Bernard'
                ],
                [
                    'email' => 'marie.therese@gmail.com',
                    'username' => 'Batignolles',
                    'name' => 'marie-therese',
                    'surname' => 'des batignolles'
                ],
                [
                    'email' => 'gnosprick@gmail.com',
                    'username' => 'Hermon',
                    'name' => 'hermon',
                    'surname' => 'James'
                ],
                [
                    'email' => 'emmanuel@gmail.com',
                    'username' => 'Flinch',
                    'name' => 'Flinch',
                    'surname' => 'Gerard'
                ],
                [
                    'email' => 'juliengern@gmail.com',
                    'username' => 'Julien',
                    'name' => 'Julien',
                    'surname' => 'Gern'
                ],
                [
                    'email' => 'bernadette@gmail.com',
                    'username' => 'Marne',
                    'name' => 'Bernardette',
                    'surname' => 'Marne'
                ],
                [
                    'email' => 'mathildejick@gmail.com',
                    'username' => 'Mathilde',
                    'name' => 'Mathidle',
                    'surname' => 'Jick'
                ],
                [
                    'email' => 'robert.lui@gmail.com',
                    'username' => 'Lui',
                    'name' => 'Louis',
                    'surname' => 'Robert'
                ],
                [
                    'email' => 'dark@gmail.com',
                    'username' => 'Vador',
                    'name' => 'Dark',
                    'surname' => 'Vador'
                ],
            ];
    
            $listCustomer1 = [
                [
                    'email' => 'baptisteUnk@gmail.com',
                    'username' => 'Batiste',
                    'name' => 'Baptiste',
                    'surname' => 'Unk'
                    
                ],
                [
                    'email' => 'joseph.desk@gmail.com',
                    'username' => 'joseph',
                    'name' => 'Joseph',
                    'surname' => 'Desk'
                ],
                [
                    'email' => 'edgard.long@gmail.com',
                    'username' => 'Edgard',
                    'name' => 'Edgard',
                    'surname' => 'Long'
                ],
                [
                    'email' => 'emmanuelle@gmail.com',
                    'username' => 'Emanuelle',
                    'name' => 'Emanuelle',
                    'surname' => 'Bert'
                ],
                [
                    'email' => 'jules.cesar@gmail.com',
                    'username' => 'Cesar',
                    'name' => 'Jules',
                    'surname' => 'Cesar'
                ],
                [
                    'email' => 'mathidlepoint@gmail.com',
                    'username' => 'Mathilde',
                    'name' => 'Mathilde',
                    'surname' => 'Point'
                ],
                [
                    'email' => 'robertaejick@gmail.com',
                    'username' => 'Roberta',
                    'name' => 'Roberta',
                    'surname' => 'Jick'
                ],
                [
                    'email' => 'fanzine.elle@gmail.com',
                    'username' => 'Elle',
                    'name' => 'Fanzine',
                    'surname' => 'Elle'
                ],
                [
                    'email' => 'luke@gmail.com',
                    'username' => 'Luke',
                    'name' => 'Luke',
                    'surname' => 'Skywalker'
                ],
            ];
    
            $listUser = [
                [
                    'email' => 'jean.fourcheraude@gmail.com',
                    'name' => 'Fourcheraude',
                    'password' => '12345678'
                ],
                [
                    'email' => 'geraldine.duval@gmail.com',
                    'name' => 'Duval',
                    'password' => '12345678'
                ],
                [
                    'email' => 'yann.lebreton@gmail.com',
                    'name' => 'Yann',
                    'password' => '12345678'
                ]
            ];
    
            foreach ($listUser as $userListed) {
                $user = new User;
    
                $user->setEmail($userListed['email']);
                $user->setPassword($this->passwordHasher->hashPassword($user,$userListed['password']));
                $user->setName($userListed['name']);

                $manager->persist($user);
                $allUser[] = $user;
                
            }
           
            $manager->flush();
    
        
            foreach($listProduct as $productListed)
            {
                $product = new Phone();
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
    
            foreach($listCustomer0 as $CustomerListed)
            {
                $customer = new Customer;
                $customer->setEmail($CustomerListed['email']);
                $customer->setUsername($CustomerListed['username']);
                $customer->setName($CustomerListed['name']);
                $customer->setSurname($CustomerListed['surname']);               
                $customer->setUser($allUser[0]);
                $manager->persist($customer);
            }
    
            foreach($listCustomer1 as $CustomerListed)
            {
                $customer = new Customer;
                $customer->setEmail($CustomerListed['email']);
                $customer->setUsername($CustomerListed['username']);
                $customer->setName($CustomerListed['name']);
                $customer->setSurname($CustomerListed['surname']); 
                
                $customer->setUser($allUser[1]);
                $manager->persist($customer);
            }
    
            $manager->flush();
       
    }
}
