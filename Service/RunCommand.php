<?php

namespace N0ni0\RunCommand\Service;

use Magento\Framework\Shell;
use N0ni0\RunCommand\Api\RunCommandInterface;
use Psr\Log\LoggerInterface;

class RunCommand implements RunCommandInterface
{
    /**
     * @var Shell
     */
    private $shell;

    /**
     * @var LoggerInterface;
     */
    private $logger;

    /**
     * RunCommand constructor.
     *
     * @param Shell $shell
     * @param LoggerInterface $logger
     */
    public function __construct(
        Shell $shell,
        LoggerInterface $logger
    ) {
        $this->shell = $shell;
        $this->logger = $logger;
    }

    /**
     * @param $command
     * @param array $arguments
     * @return bool|string
     */
    public function runCommand($command, array $arguments = [])
    {
        try {
            // BP - Shortcut constant for the root directory
            $command =  BP . '/bin/magento' . ' ' . $command;
            $output = $this->shell->execute($command, $arguments);

        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->logger->error('Error executing command: ' . $command);
            $output = false;
        }

        return $output;
    }
}
