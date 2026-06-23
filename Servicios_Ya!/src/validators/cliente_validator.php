<?php
class cliente_validator {
    private $data;
    private $errors = [];

    public function __construct($data) {
        $this->data = $data;
    }

    public function validate() {
        $this->validateName();
        $this->validateDni();
        $this->validateLocation();
        $this->validateEmail();
        $this->validatePassword();
        $this->validatePhone();
        return $this->errors;
    }

    private function validateName() {
        $name = htmlspecialchars(trim($this->data['name'] ?? ''));
        if (empty($name)) {
            $this->errors['name'] = 'Este campo es obligatorio';
        } elseif (strlen($name) < 3 || strlen($name) > 50) {
            $this->errors['name'] = 'Debe contener entre 3 y 50 caracteres';
        }
    }

    private function validateDni() {
        $dni = filter_var($this->data['dni'] ?? '', FILTER_SANITIZE_NUMBER_INT);
        if (empty($dni)) {
            $this->errors['dni'] = 'Este campo es obligatorio';
        } elseif (!preg_match('/^\d{7,8}$/', $dni)) {
            $this->errors['dni'] = 'Debe tener 7 u 8 dígitos';
        }
    }

    private function validateLocation() {
        $loc = htmlspecialchars(trim($this->data['location'] ?? ''));
        if (empty($loc)) {
            $this->errors['location'] = 'Este campo es obligatorio';
        } elseif (strlen($loc) < 5) {
            $this->errors['location'] = 'Debe contener al menos 5 caracteres';
        }
    }

    private function validateEmail() {
        $email = filter_var($this->data['email'] ?? '', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $this->errors['email'] = 'Este campo es obligatorio';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Email inválido';
        }
    }

    private function validatePassword() {
        $password = trim($this->data['password'] ?? '');
        if (empty($password)) {
            $this->errors['password'] = 'Este campo es obligatorio';
        } elseif (strlen($password) < 6) {
            $this->errors['password'] = 'Debe contener al menos 6 caracteres';
        }
    }

    private function validatePhone() {
        $phone = filter_var($this->data['phone'] ?? '', FILTER_SANITIZE_NUMBER_INT);
        if (empty($phone)) {
            $this->errors['phone'] = 'Este campo es obligatorio';
        } elseif (!preg_match('/^\d{8,15}$/', $phone)) {
            $this->errors['phone'] = 'Debe tener entre 8 y 15 dígitos';
        }
    }
}
