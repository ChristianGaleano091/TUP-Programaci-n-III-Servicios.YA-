namespace SERVICIOS.YA.Models
{
    public class Usuario
    {
        // Datos de Plataforma
        public int IdRolUsuario { get; set; }
        public int IdUsuario { get; set; }
        public string PasswordUsuario { get; set; }
        //Datos Personales Usuario
        public int DNIUsuario { get; set; }
        public string NombreUsuario { get; set; }
        public string ApellidoUsuario { get; set; }
        public string LocalidadUsuario {get; set;}
        public string DomicilioUsuario { get; set; }
        // Datos Contacto Usuario
        public string EmailUsuario { get; set; }
        public int WhatsAppUsuario { get; set; }
        // Datos Reputación Usuario
        public int ReputacionUsuario {get; set;}
        //Rep.= Promedio.Estrellas
    }
}