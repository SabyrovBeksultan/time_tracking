<?php

class TimeTracker extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $date_start;

    /**
     *
     * @var string
     */
    public $date_stop;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'date_start' => 'date_start', 
            'date_stop' => 'date_stop', 
            'user_id' => 'user_id'
        );
    }

}
