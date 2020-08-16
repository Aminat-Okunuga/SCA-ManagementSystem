<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Aug-20
 * Time: 5:15 PM
 */
namespace Entity;
class Track
{
    public $name;
    public $level;
    public $status;

    public function __construct($level, $name) {
        $this->name = $name;
        $this->level = $level;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

}