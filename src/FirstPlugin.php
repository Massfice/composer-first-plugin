<?php

namespace Massfice\FirstPlugin;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PreFileDownloadEvent;

class FirstPlugin implements PluginInterface, EventSubscriberInterface
{

    public function activate(Composer $composer, IOInterface $io) {}

    public static function getSubscribedEvents()
    {
        return array('post-package-update' => 'createDir');
    }

    public function createDir() {
      mkdir('test');
    }
}
