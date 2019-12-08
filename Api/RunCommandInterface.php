<?php

namespace N0ni0\RunCommand\Api;

interface RunCommandInterface
{
    /**
     * @param $command
     * @param array $arguments
     */
    public function runCommand($command, array $arguments);
}