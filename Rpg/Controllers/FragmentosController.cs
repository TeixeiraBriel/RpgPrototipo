using System;
using System.Collections.Generic;
using System.Diagnostics;
using Microsoft.AspNetCore.Mvc;
using Rpg.Models;

namespace Rpg.Controllers
{
    public class FragmentosController : Controller
    {
        [Route("Fragmentos/Index/{id}")]
        public IActionResult Index([FromRoute] int id)
        {
            return View(new fragmentoHistoria
            {
                IdFragmentoHistoria = id,
                TituloFragmento = "Titulo",
                TextoFragmento = "Texto",
                Segmentos = new List<fragmentoHistoria>
                {
                    new fragmentoHistoria
                    {
                        IdFragmentoHistoria = id + 1,
                        TituloFragmento = $"Titulo {id + 1}",
                        TextoFragmento = $"Texto {id + 1}",
                    },
                    new fragmentoHistoria
                    {
                        IdFragmentoHistoria = id + 2,
                        TituloFragmento = $"Titulo {id + 2}",
                        TextoFragmento = $"Texto {id + 2}",
                    }
                }
            });
        }

        [Route("Fragmentos/Sequencia/{id}")]
        public IActionResult Sequencia([FromRoute]int id)
        {
            fragmentoHistoria fragmento = new fragmentoHistoria { IdFragmentoHistoria = id };

            fragmentoHistoria resposta = coletaApi(id);

            fragmento.TituloFragmento = resposta.TituloFragmento;
            fragmento.TextoFragmento = resposta.TextoFragmento;        
            fragmento.Segmentos = new List<fragmentoHistoria>();

            foreach (var segmento in resposta.Segmentos)
            {
                fragmento.Segmentos.Add(segmento);
            }

            return View(fragmento);
        }

        [Route("Fragmentos/Novo/{id}")]
        public IActionResult Novo([FromRoute] int id)
        {
            fragmentoHistoria fragmento = new fragmentoHistoria { IdFragmentoHistoria = id };
            fragmento.obtemInfos(id);

            return View(fragmento);
        }

        public fragmentoHistoria coletaApi(int id)
        {
            fragmentoHistoria resposta = new fragmentoHistoria { IdFragmentoHistoria = id };
            resposta.obtemInfos(id);
            resposta.obtemSegmentos(id);


            return resposta;
        }
    }
}
