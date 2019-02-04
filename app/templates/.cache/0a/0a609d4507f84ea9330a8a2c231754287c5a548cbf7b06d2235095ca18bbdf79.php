<?php

/* evento/editar_evento.twig */
class __TwigTemplate_600333b2b3b8b6aa9810cfc21dc5219f2d72915c3d497fe3c949d131bfd2930a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "evento/editar_evento.twig", 1);
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
                                <a data-toggle='tooltip' data-placement='top' name=\"modificarEvento\" id=\"modificarEvento\" class='btn btn-success'>Modificar Registro
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Ingresado por:</label><input type=\"text\" name=\"nUsuario\" id=\"nUsuario\" class=\"form-control\"  value=\"";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo " \"disabled >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Evento:</label><input type=\"DATE\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Descripción:</label>
                                  <input type=\"text\" name=\"iDescripcion\" id=\"iDescripcion\" class=\"form-control iDescripcion\" placeholder=\"Ingrese Descripción\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "descripcion", array()), "html", null, true);
        echo "\">
                              </div>
                            <div class=\"col-md-6\" id=\"diveps\" name=\"diveps\">
                                <label>Hora:</label>
                                <input type=\"time\" name=\"hora\" id=\"hora\" class=\"form-control\" value=\"";
        // line 51
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["object"] ?? null), "date", array()), "H:i:s"), "html", null, true);
        echo "\" >
                            </div>

                            <div class=\"col-md-6\" id=\"appVue\">
                                <label>Responsable:</label>
                                <input type=\"text\" class=\"form-control\"   id=\"id_responsable\" name=\"id_responsable\">
                            </div>

                            <div class=\"col-md-6\" id=\"appVue1\">
                                <label>Área Contingencia:</label>
                                <input type=\"text\" class=\"form-control\" v-model=\"newKeep1\" id=\"area_contingencia\" v-on:keyup.enter=\"addKeep1\">
                            </div>

                            <br>

                            <div class=\"col-md-12\">
                                <label>Observación:</label>
                                <textarea name=\"observacion\" id=\"observacion\" cols=\"30\" rows=\"3\" class=\"form-control\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "observacion", array()), "html", null, true);
        echo "\"></textarea>
                            </div>
                            <div class=\"col-md-12\">
                                    <label>Estado:</label>
                                <select class=\"estado_select form-control\" name=\"estado_select\" id=\"estado_select\">
                                    <option selected=\"true\" disabled>Seleccione estado Evento</option>
                                    <option value=\"1\">Finalizada</option>
                                    <option value=\"2\">Pendiente</option>
                                </select>
                            </div>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"modificarEvento\" id=\"modificarEvento\" class='btn btn-success' value=\"";
        // line 80
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "id", array()), "html", null, true);
        echo "\">Modificar Evento
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

    // line 90
    public function block_appScript($context, array $blocks = array())
    {
        // line 91
        echo "        <script src=\"views/app/js/evento/vue.js\"></script>
        <script src=\"views/app/js/evento/evento.js\" type=\"text/javascript\"></script>
        <script src=\"//code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>


        <script>
             \$(function(){
               var dbdatos = [
                 ";
        // line 99
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["data"] ?? null))) {
                // line 100
                echo "                 '";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "responsable", array()), "html", null, true);
                echo "',
                 ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "               ];
               \$('#id_responsable').autocomplete({
                 source: dbdatos
               });
             });
             </script>
         </script>
         <script>
              \$(function(){
                var dbdatos = [
                  ";
        // line 112
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dato"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["dato"] ?? null))) {
                // line 113
                echo "                  '";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "areas", array()), "html", null, true);
                echo "',
                  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 115
        echo "                ];
                \$('#area_contingencia').autocomplete({
                  source: dbdatos
                });
              });
              </script>
          </script>
    ";
    }

    public function getTemplateName()
    {
        return "evento/editar_evento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  200 => 115,  190 => 113,  185 => 112,  173 => 102,  163 => 100,  158 => 99,  148 => 91,  145 => 90,  131 => 80,  116 => 68,  96 => 51,  89 => 47,  82 => 43,  76 => 40,  41 => 7,  38 => 6,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appStylos %}
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css\">
{% endblock %}

{% block appBody %}
    <section class=\"content-header\">
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
                                <a data-toggle='tooltip' data-placement='top' name=\"modificarEvento\" id=\"modificarEvento\" class='btn btn-success'>Modificar Registro
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Ingresado por:</label><input type=\"text\" name=\"nUsuario\" id=\"nUsuario\" class=\"form-control\"  value=\"{{ owner_user['name'] }} \"disabled >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Evento:</label><input type=\"DATE\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"{{ \"now\"|date(\"Y-m-d\") }}\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Descripción:</label>
                                  <input type=\"text\" name=\"iDescripcion\" id=\"iDescripcion\" class=\"form-control iDescripcion\" placeholder=\"Ingrese Descripción\" value=\"{{data.descripcion}}\">
                              </div>
                            <div class=\"col-md-6\" id=\"diveps\" name=\"diveps\">
                                <label>Hora:</label>
                                <input type=\"time\" name=\"hora\" id=\"hora\" class=\"form-control\" value=\"{{ object.date|date('H:i:s') }}\" >
                            </div>

                            <div class=\"col-md-6\" id=\"appVue\">
                                <label>Responsable:</label>
                                <input type=\"text\" class=\"form-control\"   id=\"id_responsable\" name=\"id_responsable\">
                            </div>

                            <div class=\"col-md-6\" id=\"appVue1\">
                                <label>Área Contingencia:</label>
                                <input type=\"text\" class=\"form-control\" v-model=\"newKeep1\" id=\"area_contingencia\" v-on:keyup.enter=\"addKeep1\">
                            </div>

                            <br>

                            <div class=\"col-md-12\">
                                <label>Observación:</label>
                                <textarea name=\"observacion\" id=\"observacion\" cols=\"30\" rows=\"3\" class=\"form-control\" value=\"{{data.observacion}}\"></textarea>
                            </div>
                            <div class=\"col-md-12\">
                                    <label>Estado:</label>
                                <select class=\"estado_select form-control\" name=\"estado_select\" id=\"estado_select\">
                                    <option selected=\"true\" disabled>Seleccione estado Evento</option>
                                    <option value=\"1\">Finalizada</option>
                                    <option value=\"2\">Pendiente</option>
                                </select>
                            </div>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"modificarEvento\" id=\"modificarEvento\" class='btn btn-success' value=\"{{data.id}}\">Modificar Evento
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    {% endblock %}
    {% block appScript %}
        <script src=\"views/app/js/evento/vue.js\"></script>
        <script src=\"views/app/js/evento/evento.js\" type=\"text/javascript\"></script>
        <script src=\"//code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>


        <script>
             \$(function(){
               var dbdatos = [
                 {% for d in data if false != data %}
                 '{{d.responsable}}',
                 {% endfor %}
               ];
               \$('#id_responsable').autocomplete({
                 source: dbdatos
               });
             });
             </script>
         </script>
         <script>
              \$(function(){
                var dbdatos = [
                  {% for d in dato if false != dato %}
                  '{{d.areas}}',
                  {% endfor %}
                ];
                \$('#area_contingencia').autocomplete({
                  source: dbdatos
                });
              });
              </script>
          </script>
    {% endblock %}
", "evento/editar_evento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\evento\\editar_evento.twig");
    }
}
