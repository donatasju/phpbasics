<?php

namespace App;

class Party {

    private $model_user;
    private $model_gerimas;
    
    const STATUS_POOP = 'poop';
    const STATUS_VOMITTRON = 'vomittron';
    const STATUS_FIRE = 'fire';
    const STATUS_GOOD = 'good';
    const STATUS_PUSSY = 'pussy';
    const STATUS_PENDING = 'pending';

    public function __construct(\App\Model\ModelUser $model_user, \App\Model\ModelGerimai $model_gerimas) {
        $this->model_gerimas = $model_gerimas;
        $this->model_user = $model_user;
    }

}
