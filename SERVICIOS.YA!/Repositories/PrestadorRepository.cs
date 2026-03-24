using System.Collections.Generic;
using System.Linq;
using SERVICIO.Ya.Models;

namespace SERVICIO.YA.Repositories
{
    public class PrestadorRepository
    {
        private static List<Prestador> _prestadores = new List<Prestador>();
        private static int _nextId = 1;

        public List<Prestador> GetAll()
        {
            return _prestadores;
        }

        public Prestador? GetById(int id)
        {
            return _prestadores.FirstOrDefault(p => p.Id == id);
        }

        public Prestador Create(Prestador prestador)
        {
            prestador.Id = _nextId++;
            _prestadores.Add(prestador);
            return prestador;
        }

        public bool Exists(int id)
        {
            return _prestadores.Any(p => p.Id == id);
        }
    }
}