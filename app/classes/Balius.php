<?php

namespace App;

class Balius {

    /**  @var User[];  */
    private $useriai;

    /**  @var Gerimai[];  */
    private $gerimai;

    const STATUS_POOP = 'poop';
    const STATUS_VOMITTRON = 'vomittron';
    const STATUS_FIRE = 'fire';
    const STATUS_GOOD = 'good';
    const STATUS_PUSSY = 'pussy';
    const STATUS_PENDING = 'pending';

    public function __construct(\App\Model\ModelUser $model_user, \App\Model\ModelGerimai $model_gerimai) {
        $this->users = $model_user->loadAll();
        $this->gerimai = $model_gerimai->loadAll();
    }

}
