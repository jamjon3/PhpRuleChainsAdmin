<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CF\RuleChains;

use pmill\Scheduler\Tasks\Task;

/**
 * Description of RuleChainTask
 *
 * @author james
 */
abstract class RuleChainTask extends \pmill\Scheduler\Task\Task {

    /**
     * @var null|string|array
     */
    protected $input;
    /**
     * @var string
     */
    protected $chain;
    /**
     * @var array
     */
    protected $connectionConfig;
    /**
     * Sets the input for the task
     * @param null|string|array $input
     * @return Task $this
     */
    public function setInput($input) {
        $this->input = $input;
        return $this;
    }

    /**
     * Gets the input from the task
     * @return null|string|array
     */
    public function getInput() {
        return $this->input;
    }
    /**
     * Sets the chain for the task
     * @param string $chain
     * @return RuleChainTask
     */
    public function setChain($chain) {
        $this->chain = $chain;
        return $this;
    }
    /**
     * Gets the chain for the task
     * @return string
     */
    public function getChain() {
        return $this->chain;
    }
    /**
     * Sets the connection array for the chain to be executed
     * @param array $connectionConfig
     * @return RuleChainTask
     */
    public function setConnectionConfig($connectionConfig) {
        $this->connectionConfig = $connectionConfig;
        return $this;
    }
    /**
     * Gets the connection array for the chain to be executed
     * @return array
     */
    public function getConnectionConfig() {
        return $this->connectionConfig;
    }
}
