<?php

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
                'fullname' => null,
                'age' => null,
                'gender' => null,
                'orientation' => null,
                'photo' => null
            ];
        }
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

    public function setFullname(string $fullname) {
        $this->data['fullname'] = $fullname;
    }

    public function getFullname() {
        return $this->data['fullname'];
    }

    public function setAge(int $age) {
        $this->data['age'] = $age;
    }

    public function getAge() {
        return $this->data['age'];
    }

    public function setGender(string $gender) {
        $this->data['gender'] = $gender;
    }

    public function getGender() {
        return $this->data['gender'];
    }

    public function setOrientation(string $orientation) {
        if (in_array($orientation, [$this::GAY, $this::STRAIGHT, $this::BISEXUAL])) {
            $this->data['orientation'] = $orientation;
        }
    }

    public function getOrientation() {
        return $this->data['orientation'];
    }

    public function setPhoto(string $photo) {
        if (in_array($photo, [$this::MALE, $this::FEMALE])) {
            $this->data['photo'] = $photo;
        }
    }

    public function getPhoto() {
        return $this->data['photo'];
    }

    public function setData(array $data) {
        $this->setUsername($data['username'] ?? '');
        $this->setEmail($data['email'] ?? '');
        $this->setFullname($data['fullname'] ?? '');
        $this->setAge($data['age'] ?? 0);
        $this->setGender($data['gender'] ?? '');
        $this->setOrientation($data['orientation'] ?? '');
        $this->setPhoto($data['photo'] ?? '');
    }

    public function getData() {
        return $this->data;
    }

}
