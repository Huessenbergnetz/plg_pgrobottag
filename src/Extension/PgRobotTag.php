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

        $app = $this->getApplication();

        if (!$app->isClient('site')) {
            return;
        }

        $option  = $app->getInput()->get('option');

        if ($option !== 'com_phocagallery') {
            return;
        }

        $doc = $app->getDocument();
        $doc->setMetaData('robots', 'noindex,nofollow');
    }
}
