<?php
namespace App\Processor;

/**
 * Represents a content processing job.
 */
interface JobInterface
{
    /**
     * Get job type.
     *
     * Accepted types are
     * - pdf-to-xod
     *
     * @return string
     */
    public function getType();

    /**
     * Get tasks.
     *
     * @return object
     */
    public function getTask();

    /**
     * Get task meta data.
     *
     * @return object
     */
    public function getMeta();
}

