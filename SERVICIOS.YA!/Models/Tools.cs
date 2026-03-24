namespace SERVICIOS.YA.Models;
public class Categoria
{
    public int IdCategoria {get;set;}
    public string NombreCategoria {get;set;}
}

namespace SERVICIOS.YA.Models;
public static class EstadoTurno
{
    public const string Pendiente = "PENDIENTE";
    public const string Confirmado = "CONFIRMADO";
    public const string Cancelado = "CANCELADO";
    public const string Finalizado = "FINALIZADO";
    public const string Facturado = "FACTURADO";
}