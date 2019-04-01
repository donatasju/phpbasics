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
    const PURE_ALC_IN_VODKA_L = 400;

    public function __construct(\App\Model\ModelUser $model_user, \App\Model\ModelGerimai $model_gerimai) {
        $this->users = $model_user->loadAll();
        $this->gerimai = $model_gerimai->loadAll();
    }

    public function getUserCount() {

        return count($this->useriai);
    }

    public function getPureAlchoholTotal() {
        $pure_alchohol_amount = 0;

        foreach ($this->gerimai as $gerimas) {
            $pure_alchohol_amount += $gerimas->getAmount() * $gerimas->getAbarot() / 100;
        }

        return $pure_alchohol_amount;
    }

    public function getPureAlchoholPerUser() {
        $user_cnt = $this->getUserCount();

        if ($user_cnt > 0) {
            return $this->getPureAlchoholTotal() / $user_cnt;
        }
        return false;
    }

    public function getPartyStatus() {
        $get_vodka = $this->getPureAlchoholPerUser();

        if ($get_vodka != false) {

            if ($get_vodka >= self::PURE_ALC_IN_VODKA_L * 0.7) {
                return self::STATUS_VOMITTRON;
            } elseif ($get_vodka >= $this::PURE_ALC_IN_VODKA_L * 0.5) {
                return self::STATUS_FIRE;
            } elseif ($get_vodka >= $this::PURE_ALC_IN_VODKA_L * 0.3) {
                return self::STATUS_GOOD;
            } elseif ($get_vodka >= $this::PURE_ALC_IN_VODKA_L * 0.1) {
                return self::STATUS_PUSSY;
            } else {
                return self::STATUS_POOP;
            }
        } else {

            return self::STATUS_PENDING;
        }
    }

}
