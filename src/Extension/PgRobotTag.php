<?php

namespace HBN\Plugin\System\PgRobotTag\Extension;

// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Event\Application\BeforeCompileHeadEvent;
use Joomla\Event\SubscriberInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Document\Document;

class PgRobotTag extends CMSPlugin implements SubscriberInterface
{
    public static function getSubscribedEvents() : array {
        return [
            'onBeforeCompileHead' => 'addRobotsMetaTag'
        ];
    }

    public function addRobotsMetaTag(BeforeCompileHeadEvent $event) : void {

        if (!$this->getApplication()->isClient('site')) {
            return;
        }

        [$context, $item, $params, $page] = array_values($event->getArguments());

        if (!str_starts_with($context, 'com_phocagallery')) {
            return;
        }

        $doc = Factory::getApplication()->getDocument();
        $doc->setMetaData('robots', 'noindex,nofollow');
    }
}
