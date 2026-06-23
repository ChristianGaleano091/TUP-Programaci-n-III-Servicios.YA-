<?php
class prestador_validator {
    private $data;
    private $errors = [];

    public function __construct($data) {
        $this->data = $data;
    }

    public function validate() {
        $this->validateUserName();
        $this->validateDni();
        $this->validateServiceName();
        $this->validateDescription();
        $this->validateCategory();
        $this->validateLocation();
        $this->validateEmail();
        $this->validatePassword();
        $this->validatePhone();
        /* $this->validatePrice(); */
        /* $this->validateBirthDate(); */
        /* $this->validateCreatedDate(); */
        /* $this->validateCreatedTime(); */
        return $this->errors;
    }

    private function validateUserName() {
        $userName = htmlspecialchars(trim($this->data['user_name'] ?? ''));
        if (empty($userName)) {
            $this->errors['user_name'] = 'Este campo es obligatorio';
        } elseif (strlen($userName) < 3 || strlen($userName) > 50) {
            $this->errors['user_name'] = 'Debe contener entre 3 y 50 caracteres';
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

    private function validateServiceName() {
        $name = htmlspecialchars(trim($this->data['name'] ?? ''));
        if (empty($name)) {
            $this->errors['name'] = 'Este campo es obligatorio';
        } elseif (strlen($name) < 3 || strlen($name) > 50) {
            $this->errors['name'] = 'Debe contener entre 3 y 50 caracteres';
        }
    }

    private function validateDescription() {
        $desc = htmlspecialchars(trim($this->data['description'] ?? ''));
        if (empty($desc)) {
            $this->errors['description'] = 'Este campo es obligatorio';
        } elseif (strlen($desc) < 10 || strlen($desc) > 500) {
            $this->errors['description'] = 'Debe contener entre 10 y 500 caracteres';
        }
    }

    private function validateCategory() {
        $allowed = ['hogar','tecnologia','transporte'];
        $cat = strtolower(trim($this->data['category'] ?? ''));
        if (empty($cat)) {
            $this->errors['category'] = 'Este campo es obligatorio';
        } elseif (!in_array($cat, $allowed)) {
            $this->errors['category'] = 'Categoría inválida';
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

//PRECIO (Se puede activar si preferimos)
    
    /* private function validatePrice() {
        $price = filter_var($this->data['price'] ?? '', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if (empty($price)) {
            $this->errors['price'] = 'Este campo es obligatorio';
        } elseif (!is_numeric($price) || $price <= 0) {
            $this->errors['price'] = 'Debe ser un número mayor a 0';
        }
    } */

    //FECHA DE NACIMIENTO (Se puede activar si preferimos)

    /* private function validateBirthDate() {       
        $birthDate = $this->data['birth_date'] ?? '';
        if (empty($birthDate)) {
            $this->errors['birth_date'] = 'Este campo es obligatorio';
            return;
        }

        $d = DateTime::createFromFormat('Y-m-d', $birthDate);
        $errors = DateTime::getLastErrors();

        if ($d === false || !empty($errors['warning_count']) || !empty($errors['error_count'])) {
            $this->errors['birth_date'] = 'Fecha inválida (YYYY-MM-DD)';
            return;
        }

        $today = new DateTime();
        if ($d > $today) {
            $this->errors['birth_date'] = 'La fecha de nacimiento no puede ser futura';
        }
    } */

    /* private function validateCreatedDate() {
        $date = $this->data['created_date'] ?? '';
        if (empty($date)) {
            $this->errors['created_date'] = 'Este campo es obligatorio';
            return;
        }

        $d = DateTime::createFromFormat('Y-m-d', $date);
        $errors = DateTime::getLastErrors();

        if ($d === false || !empty($errors['warning_count']) || !empty($errors['error_count'])) {
            $this->errors['created_date'] = 'Fecha inválida (YYYY-MM-DD)';
        }
    } */

    /* private function validateCreatedTime() {
        $time = $this->data['created_time'] ?? '';
        if (empty($time)) {
            $this->errors['created_time'] = 'Este campo es obligatorio';
            return;
        }

        $t = DateTime::createFromFormat('H:i', $time);
        $errors = DateTime::getLastErrors();

        if ($t === false || !empty($errors['warning_count']) || !empty($errors['error_count'])) {
            $this->errors['created_time'] = 'Hora inválida (HH:MM)';
        }
    } */