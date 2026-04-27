

________________________________________________________________________________________________________________________________________________________________________________________
|Campo        | Tipo     | Regla / Validación                                   | Mensaje de Error                                         | Sanitización				                        |
|-------------|----------|------------------------------------------------------|----------------------------------------------------------|--------------------------------------------|
|user_name    | string   | Obligatorio, 3–50 caracteres                         | Campo obligatorio / Entre 3 y 50 caracteres              | htmlspecialchars(trim())			              |
|dni          | integer  | Obligatorio, 7–8 dígitos, solo números               | Campo obligatorio / DNI inválido                         | trim(), conversión a número		            |
|name (serv.) | string   | Obligatorio, 3–50 caracteres                         | Campo obligatorio / Entre 3 y 50 caracteres              | htmlspecialchars(trim())			              |
|description  | string   | Obligatorio, mínimo 10 caracteres                    | Campo obligatorio / Descripción demasiado corta          | htmlspecialchars(trim())			              |
|category     | string   | Obligatorio, debe coincidir con categorías válidas   | Campo obligatorio / Categoría inválida                   | trim()					                            |
|location     | string   | Obligatorio, texto libre                             | Campo obligatorio                                        | htmlspecialchars(trim())			              |
|email        | string   | Obligatorio, formato email válido                    | Campo obligatorio / Email inválido                       | filter_var(..., FILTER_VALIDATE_EMAIL)	    |
|phone        | string   | Obligatorio, solo números, longitud mínima           | Campo obligatorio / Teléfono inválido                    | trim(), regex				                      |
|created_date | date     | Automática, generada en backend con date("Y-m-d")    | —                                                        | —						                              |
|created_time | time     | Automática, generada en backend con date("H:i")      | —                                                        | —						                              |
|_____________|__________|______________________________________________________|__________________________________________________________|____________________________________________|
