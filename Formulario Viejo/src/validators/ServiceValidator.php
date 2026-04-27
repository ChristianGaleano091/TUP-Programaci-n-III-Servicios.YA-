<?php
class ServiceValidator {
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
        $this->validatePrice();
        $this->validateBirthDate();
        $this->validateDate();
        /* $this->validateTime(); */
        $this->validateLocation();
        $this->validateEmail();
        $this->validatePhone();
        return $this->errors;
    }

private function validateUserName() {
    $userName = htmlspecialchars(trim($this->data['user_name'] ?? ''));
    if (empty($userName)) {
        $this->errors['user_name'] = 'Campo obligatorio';
    } elseif (strlen($userName) < 3 || strlen($userName) > 50) {
        $this->errors['user_name'] = 'Entre 3 y 50 caracteres';
    }
}

private function validateDni() {
    $dni = filter_var($this->data['dni'] ?? '', FILTER_SANITIZE_NUMBER_INT);
    if (empty($dni)) {
        $this->errors['dni'] = 'Campo obligatorio';
    } elseif (!preg_match('/^\d{7,8}$/', $dni)) {
        $this->errors['dni'] = 'Debe tener 7 u 8 dígitos';
    }
}

    private function validateServiceName() {
        $name = htmlspecialchars(trim($this->data['name'] ?? ''));
        if (empty($name)) {
            $this->errors['name'] = 'Campo obligatorio';
        } elseif (strlen($name) < 3 || strlen($name) > 50) {
            $this->errors['name'] = 'Entre 3 y 50 caracteres';
        }
    }

    private function validateDescription() {
        $desc = htmlspecialchars(trim($this->data['description'] ?? ''));
        if (empty($desc)) {
            $this->errors['description'] = 'Campo obligatorio';
        } elseif (strlen($desc) < 10 || strlen($desc) > 200) {
            $this->errors['description'] = 'Entre 10 y 200 caracteres';
        }
    }

    private function validateCategory() {
        $allowed = ['hogar','tecnologia','transporte']; //es de ejemplo
        $cat = strtolower(trim($this->data['category'] ?? ''));
        if (empty($cat)) {
            $this->errors['category'] = 'Campo obligatorio';
        } elseif (!in_array($cat, $allowed)) {
            $this->errors['category'] = 'Categoría inválida';
        }
    }

    private function validatePrice() {
        $price = filter_var($this->data['price'] ?? '', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if (empty($price)) {
            $this->errors['price'] = 'Campo obligatorio';
        } elseif (!is_numeric($price) || $price <= 0) {
            $this->errors['price'] = 'Debe ser mayor a 0';
        }
    }

private function validateBirthDate() {
    $birthDate = $this->data['birth_date'] ?? '';
    if (empty($birthDate)) {
        $this->errors['birth_date'] = 'Campo obligatorio';
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
}

    private function validateDate() {
    $date = $this->data['date'] ?? '';

    if (empty($date)) {
        $this->errors['date'] = 'Campo obligatorio';
        return;
    }

    // Intentar crear un objeto DateTime con el formato esperado
    $d = DateTime::createFromFormat('Y-m-d', $date);
    $errors = DateTime::getLastErrors();

    if ($d === false || !empty($errors['warning_count']) || !empty($errors['error_count'])) {
        $this->errors['date'] = 'Fecha inválida (YYYY-MM-DD)';
    }
}

    /* private function validateTime() {
    $time = $this->data['time'] ?? '';

    if (empty($time)) {
        $this->errors['time'] = 'Campo obligatorio';
        return;
    }

    // Intentar crear un objeto DateTime con el formato esperado
    $t = DateTime::createFromFormat('H:i', $time);
    $errors = DateTime::getLastErrors();

    if ($t === false || !empty($errors['warning_count']) || !empty($errors['error_count'])) {
        $this->errors['time'] = 'Hora inválida (HH:MM)';
    }
} */

    private function validateLocation() {
        $loc = htmlspecialchars(trim($this->data['location'] ?? ''));
        if (empty($loc)) {
            $this->errors['location'] = 'Campo obligatorio';
        } elseif (strlen($loc) < 5) {
            $this->errors['location'] = 'Mínimo 5 caracteres';
        }
    }

    private function validateEmail() {
        $email = filter_var($this->data['email'] ?? '', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $this->errors['email'] = 'Campo obligatorio';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Email inválido';
        }
    }

    private function validatePhone() {
        $phone = filter_var($this->data['phone'] ?? '', FILTER_SANITIZE_NUMBER_INT);
        if (empty($phone)) {
            $this->errors['phone'] = 'Campo obligatorio';
        } elseif (!preg_match('/^\d{8,15}$/', $phone)) {
            $this->errors['phone'] = 'Debe tener entre 8 y 15 dígitos';
        }
    }
}
