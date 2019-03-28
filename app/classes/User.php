<?php

namespace App;

Class User {

    private $data;

    const ORIENTATION_GAY = 'g';
    const ORIENTATION_STRAIGHT = 's';
    const ORIENTATION_BISEXUAL = 'b';
    const GENDER_MALE = 'm';
    const GENDER_FEMALE = 'f';

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'username' => null,
                'email' => null,
                'full_name' => null,
                'age' => null,
                'gender' => null,
                'orientation' => null,
                'photo' => null
            ];
        }
    }

    public static function getGenderOptions() {
        return [
            self::GENDER_MALE => 'Male',
            self::GENDER_FEMALE => 'Female'
        ];
    }

    public static function getOrientationOptions() {
        return [
            self::ORIENTATION_STRAIGHT => 'Straight',
            self::ORIENTATION_BISEXUAL => 'Bisexual',
            self::ORIENTATION_GAY => 'Gay'
        ];
    }

    public function setUsername(string $username) {
        $this->data['username'] = $username;
    }

    public function getUsername() {
        return $this->data['username'];
    }

    public function setEmail(string $email) {
        $this->data['email'] = $email;
    }

    public function getEmail() {
        return $this->data['email'];
    }

    public function setFullName(string $full_name) {
        $this->data['full_name'] = $full_name;
    }

    public function getFullName() {
        return $this->data['full_name'];
    }

    public function setAge(int $age) {
        $this->data['age'] = $age;
    }

    public function getAge() {
        return $this->data['age'];
    }

    public function setGender(string $gender) {
        if (in_array($gender, [
                    $this::GENDER_MALE,
                    $this::GENDER_FEMALE
                ])) {
            $this->data['gender'] = $gender;
        }
    }

    public function getGender() {
        return $this->data['gender'];
    }

    public function setOrientation(string $orientation) {
        if (in_array($orientation, [
                    $this::ORIENTATION_GAY,
                    $this::ORIENTATION_STRAIGHT,
                    $this::ORIENTATION_BISEXUAL
                ])) {
            $this->data['orientation'] = $orientation;
        }
    }

    public function getOrientation() {
        return $this->data['orientation'];
    }

    public function setPhoto(string $photo) {
        $this->data['photo'] = $photo;
    }

    public function getPhoto() {
        return $this->data['photo'];
    }

    public function setData(array $data) {
        $this->setUsername($data['username'] ?? '');
        $this->setEmail($data['email'] ?? '');
        $this->setFullName($data['full_name'] ?? '');
        $this->setAge($data['age'] ?? null);
        $this->setGender($data['gender'] ?? '');
        $this->setOrientation($data['orientation'] ?? '');
        $this->setPhoto($data['photo'] ?? '');
    }

    public function getData() {
        return $this->data;
    }

}
