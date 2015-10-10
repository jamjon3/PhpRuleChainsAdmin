<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CF\RuleChains;

/**
 * Description of ChainService
 *
 * @author james
 */
class ChainService {
    // Meedo database connection
    protected $db;
    protected $config;
    /**
     * Constructs a database connection using Meedo and the config
     * based on the database source key name
     * 
     */
    function __construct() {
        $this->config = new Configula\Config('/path/to/config/files');
        $this->db = new \medoo($this->config->ruleChainsDefaultDatabase); // medoo does not use namespaces
    }
    /**
     * 
     * @return \medoo connection
     */
    public function getConnection() {
        return $this->db;
    }
    /**
     * Returns the connections settings for the rule chains process
     * @return array
     */
    public function getRuleChainsConnectionsConfig() {
        return $this->config->ruleChainsConnectionTypes;
    }
    public function getTaskList() {
        return [ 
            [
                "chain" => [
                    [
                        "type" => "SQL",
                        "name" => "localhost",
                        "executeType" => "ROW",
                        "rule" => "SELECT 1 FROM DUAL"
                    ]
                ],
                "expression" => "4 15 * * *",
                "input" => []
            ]
        ];
    }
}
