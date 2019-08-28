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
    private $cio;

    public function activate(Composer $composer, IOInterface $io, ConsoleIO $cio) {
      $this->io = $io;
      $this->cio = $cio;
    }

    public static function getSubscribedEvents()
    {
        return array('post-update-cmd' => 'createDir');
    }

    public function createDir() {
      mkdir('test');
      $this->io->writeError('Error');
      $this->cio->error('Error');
    }
}
