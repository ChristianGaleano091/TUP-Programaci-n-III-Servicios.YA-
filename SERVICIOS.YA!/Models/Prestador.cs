namespace SERVICIOS.YA.Models
{
    public class Prestador
    {
        // Datos Plataforma
        public int IdRolPrestador {get; set;}
        public int IdPrestador { get; set; }
        public int IdCategoriaPrestador { get; set;}
        public string PasswordPrestador {get; set;}
        // Datos Personales Prestador
        public int DNIPrestador { get; set; }
        public string NombrePrestador { get; set; }
        public string ApellidoPrestador { get; set; }
        // Datos Contacto Prestador
        public string EmailPrestador { get; set; }
        public int WhatsAppPrestador { get; set; }
        // Datos Reputación Prestador
        public int ReputacionPrestador {get; set;}
        //Rep.= Promedio.Estrellas
    }
}
//Mejoras
// Si Activa Facturador: Cancela suscripcion y cobra % (0,01) de facturacion
// Vista del Usuario, Contador de Servicios:
// Recibidos (ej: 100)
// Rechazados (ej: 10)
// Aceptados (ej: 80)
// Incompletos (ej: 10)
// En Proceso (ej: 10)
// Finalizados (ej: 80)
// Facturados (ej: 40)
// 
// La suma da la misma cantidad de Rechazados+Aceptados=Recibidos, Incompletos+EnProceso+Finalizados=Aceptados
// Si tiene varios servicios Aceptados y no hay una facturacion por un valor de comisión mayor al de Suscripcion, se deshabilita el Modo Faturador
// y se vuelve al modo Suscripcion.