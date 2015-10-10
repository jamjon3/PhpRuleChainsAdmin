<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CF\RuleChains;

/**
 * Description of Scheduler
 *
 * @author james
 */
class Scheduler {
    protected $taskList;
    protected $output;
    public function __construct() {
        $this->chainService = new \CF\RuleChains\ChainService();
        $this->chainService->getRuleChainsConnectionsConfig();
        $this->taskList = new \pmill\Scheduler\TaskList;
        foreach ($this->chainService->getTaskList() as $task) {
            $this->taskList->addTask((new ChainTask)->setExpression($task['expression'])->setConnectionConfig($this->chainService->getRuleChainsConnectionsConfig())->setChain($task['chain'])->setInput($task['input']));
        }
        $this->taskList->run();
        $this->output = $this->taskList->getOutput();
    }
}
