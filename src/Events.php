<?php
// App/Events.php
namespace App;

/**
 * This class defines the names of all the events dispatched in
 * our project. It's not mandatory to create a
 * class like this, but it's considered a good practice.
 *
 */
final class Events
{
    /**
     * For the event naming conventions, see:
     * https://symfony.com/doc/current/components/event_dispatcher.html#naming-conventions.
     *
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    const USER_REGISTERED = 'user.registered';
}
