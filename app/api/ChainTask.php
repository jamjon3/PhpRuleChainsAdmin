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
class ChainTask extends \CF\RuleChains\RuleChainTask {
    //put your code here
    public function run() {
        $this->setOutput(\call_user_func_array(function($chain) {
            $result = [];
            while($row = $chain->getNextResultRow()) {
                \array_push($result, $row);
            }
            return $result;
        }, [ new \CF\RuleChains\Chain($this->getConnectionConfig(),[
            [
                "type" => "SQL",
                "name" => "localhost",
                "executeType" => "ROW",
                "rule" => "SELECT 1 FROM DUAL"
            ]
        ],$this->getInput(),true)]));
    }
    
}
