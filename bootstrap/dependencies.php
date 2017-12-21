<?php
declare(strict_types=1);

use Psr\Container\ContainerInterface;

return [
    'env' => 'dev',
    // if we comment this out, autowiring will kick in
    // http://php-di.org/doc/autowiring.html
    'App\Processor\ScormProcessor' => DI\object(App\Processor\ScormProcessor::class),
    'Psr\Log\LoggerInterface' => DI\factory(function (ContainerInterface $container) {
        // processors
        $introspectionProcessor = new \Monolog\Processor\IntrospectionProcessor();
        $memoryUsageProcessor = new \Monolog\Processor\MemoryUsageProcessor();
        $memoryPeakUsageProcessor = new \Monolog\Processor\MemoryPeakUsageProcessor();
        $uidProcessor = new \Monolog\Processor\UidProcessor();
        $gitProcessor = new \Monolog\Processor\GitProcessor();

        $env = $container->get('env');

        // log handlers
        $streamHandler = new \Monolog\Handler\StreamHandler(__DIR__. '/../logs/'.$env.'.log');
        $streamHandler->setFormatter(new \Monolog\Formatter\JsonFormatter());

        // create a log channel
        $log = new \Monolog\Logger($env);

        $log->pushHandler($streamHandler);

        $log->pushProcessor($introspectionProcessor);
        $log->pushProcessor($memoryUsageProcessor);
        $log->pushProcessor($memoryPeakUsageProcessor);
        $log->pushProcessor($uidProcessor);
        $log->pushProcessor($gitProcessor);

        return $log;
    }),
];
