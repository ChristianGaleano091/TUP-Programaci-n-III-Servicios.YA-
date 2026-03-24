using System.Data;

namespace SERVICIOS.YA.Models
{
    public class Turno
    {
        public int IdTurno {get;set;}
        public DataSetDateTime HoraTurno {set;get;}
        public DataSetDateTime FechaTurno {get;set;}
        public string EstadoTurno {get;set;} // PENDIENTE, CONFIRMADO, CANCELADO, FINALIZADO (y FACTURADO?)
        public int IdUsuarioTurno {get;set;}
        public int IdPrestadorTurno {get;set;}
    }
}