<?php
declare(strict_types=1);

namespace App\Processor;

use App\Processor\ProcessorInterface;
use Psr\Container\ContainerInterface;
use App\Processor\JobInterface;
use Psr\Log\LoggerInterface;

class ScormProcessor implements ProcessorInterface
{
    private $log;

    public function __construct(LoggerInterface $log)
    {
        $this->log = $log;
    }

    public function process()
    {
        $this->log->info('ScormProcessor', [
            'key1' => 'val21',
            'key2' => 'val2',
        ]);
    }
}
