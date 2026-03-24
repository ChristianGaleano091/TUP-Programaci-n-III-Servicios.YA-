using System.Collections.Generic;
using System.Linq;
using SERVICIO.YA.Models;

namespace SERVICIO.Ya.Repositories
{
    public class TurnoRepository
    {
        private static List<Turno> _turnos = new List<Turno>();
        private static int _nextId = 1;

        public List<Turno> GetAll()
        {
            return _turnos;
        }

        public Turno? GetById(int id)
        {
            return _turnos.FirstOrDefault(t => t.Id == id);
        }

        public Turno Create(Turno turno)
        {
            turno.Id = _nextId++;
            _turnos.Add(turno);
            return turno;
        }

        public List<Turno> GetByPrestadorId(int prestadorId)
        {
            return _turnos.Where(t => t.PrestadorId == prestadorId).ToList();
        }

        public List<Turno> GetByUsuarioId(int usuarioId)
        {
            return _turnos.Where(t => t.UsuarioId == usuarioId).ToList();
        }

        public bool Exists(int id)
        {
            return _turnos.Any(t => t.Id == id);
        }
    }
}