<?php

namespace App\EventListener;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



final class HashUserpassword implements EventSubscriberInterface
{
    private $security;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['hashUserpassword', EventPriorities::PRE_WRITE],
        ];
    }

    public function hashUserpassword(ViewEvent $event): void
    {
        
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

       
        if (!$user instanceof User || Request::METHOD_POST !== $method) {
            return;
        }

        $user->setPassword($this->passwordHasher->hashPassword($user, $user->getPassword()));
    }
}