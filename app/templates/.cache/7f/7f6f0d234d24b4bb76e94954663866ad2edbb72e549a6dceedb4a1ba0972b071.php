<?php

/* evento/modificar_evento.twig */
class __TwigTemplate_178fda5589d80a6ff7c41717ccc53bc84873a262f5411f0c642133b29e4fd31e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "evento/modificar_evento.twig", 1);
        $this->blocks = array(
            'appStylos' => array($this, 'block_appStylos'),
            'appBody' => array($this, 'block_appBody'),
            'appScript' => array($this, 'block_appScript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "portal/portal";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_appStylos($context, array $blocks = array())
    {
        // line 3
        echo "    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css\">
";
    }

    // line 6
    public function block_appBody($context, array $blocks = array())
    {
        // line 7
        echo "    <section class=\"content-header\">
        <h1>
            Eventos
            <small>Modificación Eventos</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home</a>
            </li>
            <li>
                <a href=\"evento/listarEvento\">Listado de Evento</a>
            </li>
            <li class=\"active\">Modificar Evento</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class=\"content\">
        <form id=\"form_editar_evento\" name=\"form_editar_evento\" class=\"form_editar_evento\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Editar Evento</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col-md-12 text-center\">
                                <a data-toggle='tooltip' data-placement='top' name=\"modificarEvento\" id=\"modificarEvento\" class='btn btn-success'>Modificar Evento
                                </a>
                                <input type=\"reset\"  class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Ingresado por:</label><input type=\"text\" name=\"nUsuario\" id=\"nUsuario\" class=\"form-control\"  value=\"";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo " \"disabled >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Evento:</label><input type=\"date\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "fecha_evento", array()), "html", null, true);
        echo "\">
                                <input type=\"hidden\" name=\"idEvento\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "id", array()), "html", null, true);
        echo "\" id=\"idEvento\" class=\"idEvento\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Descripción:</label>
                                  <input type=\"text\" name=\"descripcion\" id=\"descripcion\" class=\"form-control descripcion\" placeholder=\"Ingrese Descripción\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "descripcion_evento", array()), "html", null, true);
        echo "\">
                              </div>
                            <div class=\"col-md-6\" id=\"diveps\" name=\"diveps\">
                                <label>Hora:</label>
                                <input type=\"time\" name=\"hora\" id=\"hora\" class=\"form-control\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "hora_evento", array()), "html", null, true);
        echo "\" >
                            </div>

                            <div div class=\"col-md-6\" id=\"app3\" data-arr=\"";
        // line 55
        echo twig_escape_filter($this->env, json_encode(($context["dataRes"] ?? null)), "html", null, true);
        echo "\">
                                <label for=\"\">Responsable</label>
                                <input type=\"text\" class=\"form-control\" v-model=\"newKeep\" v-on:keyup.enter=\"addKeep\">
                                <select id=\"responsableModificado\" class=\"responsableModificado form-control\" name=\"\"  multiple>
                                    <option class=\"list-group-item\"  v-for=\"(d,index) in lists\" @click=\"eliminarTarea(index)\">
                                        \${ d.responsable }
                                    </option>
                                </select>
                                <input type=\"hidden\" name=\"areaResInput\" value=\"\" id=\"areaResInput\" class=\"\">
                            </div>

                            <div div class=\"col-md-6\" id=\"app2\" data-array=\"";
        // line 66
        echo twig_escape_filter($this->env, json_encode(($context["dataArea"] ?? null)), "html", null, true);
        echo "\">
                                <label for=\"\">Area Contingencia</label>
                                <input type=\"DATE\" name=\"cierreEvento\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\" id=\"cierreEvento\" hidden>
                                <input type=\"text\"  v-model=\"newKeep1\" class=\"form-control\" v-on:keyup.enter=\"addKeep1\">
                                <select class=\"form-control areaModificada\" name=\"areaModificada\" id=\"areaModificada\" multiple>
                                    <option class=\"list-group-item\"  v-for=\"(d,index) in listas\" @click=\"eliminarTarea(index)\">
                                        \${ d.areas }
                                    </option>
                                </select>
                                <input type=\"hidden\" name=\"areaModInput\" value=\"\" id=\"areaModInput\" class=\"areaModInput\">
                            </div>

                            <br>
                            <div class=\"col-md-12\">
                                <label>Observación:</label>
                                <textarea name=\"observacion\" id=\"observacion\" cols=\"30\" rows=\"3\" class=\"form-control observacion\">";
        // line 81
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "observacion_evento", array()), "html", null, true);
        echo "</textarea>
                            </div>

                            <div class=\"col-md-12\">
                                    <label>Estado:</label>
                                <select class=\"estado_select form-control\" name=\"estado_select\" id=\"estado_select\" >
                                    ";
        // line 87
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "estado_evento", array()) == "1")) {
            // line 88
            echo "                                        <option value=\"1\" selected>Finalizada</option>
                                        <option value=\"2\">Pendiente<option>
                                        ";
        } else {
            // line 91
            echo "                                            <option value=\"1\">Finalizada</option>
                                            <option value=\"2\" selected>Pendiente<option>
                                    ";
        }
        // line 94
        echo "                                </select>
                            </div>

                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"modificarEvento1\" id=\"modificarEvento1\" class='btn btn-success'>Modificar Evento
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    ";
    }

    // line 109
    public function block_appScript($context, array $blocks = array())
    {
        // line 110
        echo "        <script src=\"views/app/js/evento/vue.js\"></script>
        <script src=\"views/app/js/evento/evento.js\" type=\"text/javascript\"></script>
        <script src=\"//code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>

        <script>
             \$(function(){
               var dbdatos = [
                 ";
        // line 117
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dato"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["data"] ?? null))) {
                // line 118
                echo "                 '";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "responsable", array()), "html", null, true);
                echo "',
                 ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 120
        echo "               ];
               \$('#responsable').autocomplete({
                 source: dbdatos
               });
             });
             </script>
         </script>
         <script>
              \$(function(){
                var dbdatos = [
                  ";
        // line 130
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dat"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["dato"] ?? null))) {
                // line 131
                echo "                  '";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "areas", array()), "html", null, true);
                echo "',
                  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 133
        echo "                ];
                \$('#contingencia').autocomplete({
                  source: dbdatos
                });
              });
              </script>
          </script>
    ";
    }

    public function getTemplateName()
    {
        return "evento/modificar_evento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  234 => 133,  224 => 131,  219 => 130,  207 => 120,  197 => 118,  192 => 117,  183 => 110,  180 => 109,  162 => 94,  157 => 91,  152 => 88,  150 => 87,  141 => 81,  125 => 68,  120 => 66,  106 => 55,  100 => 52,  93 => 48,  86 => 44,  82 => 43,  76 => 40,  41 => 7,  38 => 6,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "evento/modificar_evento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\evento\\modificar_evento.twig");
    }
}
