<?php

namespace Massfice\FirstPlugin;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\IO\ConsoleIO;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PreFileDownloadEvent;

class FirstPlugin implements PluginInterface, EventSubscriberInterface
{

    private $io;

    public function activate(Composer $composer, IOInterface $io) {
      $this->io = $io;
    }

    public static function getSubscribedEvents()
    {
        return array('post-update-cmd' => 'createDir');
    }

    public function createDir() {
      mkdir('test');
      $this->io->writeError('Error',true,self::VERY_VERBOSE);
    }
}
