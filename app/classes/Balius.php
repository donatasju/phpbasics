<?php

namespace App;

class Balius {

    private $model_user;
    private $model_gerimas;

    public function __construct(\App\Model\ModelUser $model_user, \App\Model\ModelGerimai $model_gerimas) {
        $this->model_gerimas = $model_gerimas;
        $this->model_user = $model_user;
    }

    public function getPureAlcohol() {
        $pure_alcohol_amount = 0;
        foreach ($this->model_gerimas->loadAll() as $gerimas) {
            $pure_alcohol_amount += ($gerimas->getAmount() / 100) * $gerimas->getAbarot();

            return $pure_alcohol_amount;
        }
    }

    public function getAlcoholPerUser() {
        if (count($this->model_user->loadAll()) != 0) {
            return $this->getPureAlcohol() / count($this->model_user->loadAll());
        }

        return false;
    }

    public function getAlcoholIntoVodka() {
        if ($this->getAlcoholPerUser() != false) {
            return ($this->getAlcoholPerUser() * 100) / 40;
        }

        return false;
    }

    public function partyStatus() {
        $get_vodka = $this->getAlcoholIntoVodka();

        if ($get_vodka != false) {
            if ($get_vodka >= 700) {
                $status = 'vommitron';
            } elseif ($get_vodka >= 500 && $get_vodka < 700) {
                $status = 'fire';
            } elseif ($get_vodka >= 300 && $get_vodka < 500) {
                $status = 'good';
            } elseif ($get_vodka >= 100 && $get_vodka < 300) {
                $status = 'pussy';
            } else {
                $status = 'poop';
            }
        } else {
            $status = 'pending';
        }

        return $status;
    }

    public function getStipriejiAmount() {
        $stiprieji_gerimai_ml = 0;

        foreach ($this->model_gerimas->loadAll() as $gerimas) {
            if ($gerimas->getAbarot() > 20) {
                return $stiprieji_gerimai_ml += $gerimas->getAmount();
            }
        }
    }

    public function getSilpniejiAmount() {
        $silpnieji_gerimai_ml = 0;

        foreach ($this->model_gerimas->loadAll() as $gerimas) {
            if ($gerimas->getAbarot() == 0) {
                return $silpnieji_gerimai_ml += $gerimas->getAmount();
            }
        }
    }

}
