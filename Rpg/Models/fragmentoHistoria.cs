using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Rpg.Models
{
    public class fragmentoHistoria
    {
        public int IdFragmentoHistoria { get; set; }
        public string TituloFragmento { get; set; }
        public string TextoFragmento { get; set; }
        public List<fragmentoHistoria> Segmentos { get; set; }
    }
}
