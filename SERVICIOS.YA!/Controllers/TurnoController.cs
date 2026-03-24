namespace SERVICIO.YA.Controllers;

// POST /api/turnos
public HttpResponse CrearTurno(HttpRequest request)
{
    try
    {
        var dto = JsonSerializer.Deserialize<TurnoRequest>(request.Body);

        var turno = _service.CrearTurno(
            dto.Usuario,
            dto.FechaHora,
            dto.Prestador
        );

        return new HttpResponse
        {
            StatusCode = 201,
            ContentType = "application/json",
            Body = JsonSerializer.Serialize(turno)
        };
    }
    catch (Exception ex)
    {
        return new HttpResponse
        {
            StatusCode = 400,
            Body = ex.Message
        };
    }
}