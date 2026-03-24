using System.Collections.Generic;
using System.Linq;
using SERVICIO.YA.Models;

namespace SERVICIO.YA.Repositories
{
    public class UsuarioRepository
    {
        private static List<Usuario> _usuarios = new List<Usuario>();
        private static int _nextId = 1;

        public List<Usuario> GetAll()
        {
            return _usuarios;
        }

        public Usuario? GetById(int id)
        {
            return _usuarios.FirstOrDefault(u => u.Id == id);
        }

        public Usuario Create(Usuario usuario)
        {
            usuario.Id = _nextId++;
            _usuarios.Add(usuario);
            return usuario;
        }

        public bool Exists(int id)
        {
            return _usuarios.Any(u => u.Id == id);
        }
    }
}