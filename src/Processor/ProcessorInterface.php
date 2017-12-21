<?php
namespace App\Processor;

use App\Processor\JobInterface;

/**
 * Processes a job
 *
 * This system will:
 * * Process a job
 * * Save it in the job output location
 */
interface ProcessorInterface
{
    /**
     * Process a job.
     *
     *
     * @throws Exception If unknown error occurs
     * @return boolean Whether the processing succeeded or not
     */
    public function process();
}