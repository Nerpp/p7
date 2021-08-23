<?php

namespace App\EventListener;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Customer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;


final class InsertUser implements EventSubscriberInterface
{
    private $security;

    public function __construct(Security $security)
    {
        // Avoid calling getUser() in the constructor: auth may not
        // be complete yet. Instead, store the entire Security object.
        $this->security = $security;
    }
    
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['insertUser', EventPriorities::PRE_WRITE],
        ];
    }

    public function insertUser(ViewEvent $event): void
    {
        
        $customer = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

       
        if (!$customer instanceof Customer || Request::METHOD_POST !== $method) {
            return;
        }

        $user = $this->security->getUser();
        $customer->setUser($user);
    }
}