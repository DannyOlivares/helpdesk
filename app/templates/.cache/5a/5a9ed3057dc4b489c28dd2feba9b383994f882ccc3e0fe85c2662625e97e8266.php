<?php

/* escalamiento/agregarEscalamiento.twig */
class __TwigTemplate_0a363d31d0d4b3aa5e5358642e9b3c821612e02649f0487f74fd5b687a2e7253 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "escalamiento/agregarEscalamiento.twig", 1);
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
        echo "<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css\">
    <script>
        var respuestaComunas = new Array();
        \$(document).ready(function (){
            \$.ajax({
                type: \"POST\",
                url: \"api/mostrarComunas2\",
                success: function(response){
                    for (var i=0; i<response.length; i++) {
                        
                        respuestaComunas.push(response[i][\"descripcion\"]);
                    }
                },                
                error: function(xhr, status) {
                    msg_box_alert(99, \"Filtrar Ordenes\", xhr.responseText);
                }
            });
            
           \$( \"#comuna\" ).autocomplete({
                source: respuestaComunas
            });
        });
    </script>
";
    }

    // line 28
    public function block_appBody($context, array $blocks = array())
    {
        // line 29
        echo "    <section class=\"content-header\">
        <h1>
            Escalamiento
            <small>Agregar Actividades</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home
                </a>
            </li>
            <li>
                <a href=\"escalamiento/inicio\">Inicio</a>
            </li>
            <li>
                <a href=\"escalamiento/listar_evento\">Listado de Escalamientos</a>
            </li>
            <li class=\"active\">Agregar Actividad</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class=\"content\">
        <form id=\"formAgregarEscalamiento\" name=\"formAgregarEscalamiento\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Agregar Actividad</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col-md-12 text-center\">
                                <a data-toggle='tooltip' data-placement='top' name=\"btnAgregarEscalamiento\" id=\"btnAgregarEscalamiento\" class='btn btn-success' onclick=\"agregarEscalamiento();\">Agregar Escalamiento
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Usuario:</label><input type=\"text\"   class=\"form-control\"  value=\"";
        // line 65
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo " \" disabled>
                                <input type=\"text\" name=\"nombreUsuario\" id=\"nombreUsuario\" class=\"form-control\"  value=\"";
        // line 66
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo "\" style=\"display:none\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Id Actividad:</label>
                                  <input type=\"text\" name=\"idActividadManual\" id=\"idActividadManual\" class=\"form-control\" placeholder=\"Ingrese Id Actividad\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, ($context["id_actividad"] ?? null), "html", null, true);
        echo "\" readonly>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Ingreso Actividad:</label><input type=\"DATE\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"";
        // line 73
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Rut Cliente:</label>
                                  <input type=\"text\" name=\"rutCliente\" id=\"rutCliente\" class=\"form-control\" value=\"\" placeholder=\"Ingrese rut cliente\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Comuna Destinatario:</label>
                                  <input type=\"text\" name=\"comuna\" id=\"comuna\" class=\"comuna form-control\" placeholder=\"Ingrese Comuna\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Compromiso:</label>
                                    <input type=\"date\" name=\"fechaCompromiso\" id=\"fechaCompromiso\" class=\"form-control fechaCompromiso\" placeholder=\"Ingrese Descripción Actividad\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Hora Compromiso:</label>
                                <input type=\"time\" name=\"horaCompromiso\" value=\"\" id=\"horaCompromiso\" class=\"form-control\" placeholder=\"Ingrese Hora Compromiso\">
                            </div>
                            
                            <div class=\"col-md-6\">
                                <label>Canal:</label>
                                    <input type=\"text\" name=\"canal\" id=\"canal\" class=\"form-control canal\" placeholder=\"Ingrese canal\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Bloque:</label>
                                <select class=\"form-control bloque\" name=\"bloque\" id=\"bloque\">
                                    <option value=\"\"selected disabled>Seleccione Bloque</option>
                                    <option value=\"10-13\">10-13</option>
                                    <option value=\"13-16\">13-16</option>
                                    <option value=\"16-19\">16-19</option>
                                    <option value=\"19-21\">19-22</option>
                                </select>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Estado Escalamiento:</label>
                                <input type=\"text\" name=\"estadoEscalamiento\" value=\"\" id=\"estadoEscalamiento\" class=\"form-control\" placeholder=\"Ingrese estado escalamiento\">
                            </div>
                            
                            <input type=\"date\" name=\"fechaCreacion\" class=\"fechaCreacion\" id=\"fechaCreacion\" value=\"";
        // line 111
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\" hidden>

                            <div class=\"col-md-6\">
                                <label>Tipo Actividad:</label>
                                    <select class=\"form-control\" name=\"selectTipoActividad\" id=\"selectTipoActividad\">
                                        <option value=\"\"selected disabled>Seleccione Tipo</option>
                                        <option value=\"reparacion\">Reparación</option>
                                        <option value=\"modificacion\">Modificación</option>
                                        <option value=\"alta\">Alta</option>
                                        <option value=\"altaTraslado\">Alta Traslado</option>
                                    </select>
                            </div>

                            <div class=\"col-md-6\">
                                <label>Estado Orden:</label>
                                    <select class=\"form-control\" name=\"selectEstadoOrden\" id=\"selectEstadoOrden\">
                                        <option value=\"\"selected disabled>Seleccione Estado</option>
                                        <option value=\"pendiente\">Pendiente</option>
                                        <option value=\"seguimiento\">Seguimiento</option>
                                    </select>
                            </div>

                            <div class=\"col-md-6\">
                                <input type=\"hidden\" name=\"fechaFinalizacion\" id=\"fechaFinalizacion\" class=\"form-control fechaFinalizacion\" placeholder=\"Ingrese comuna Actividad\" value=\"";
        // line 134
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\" >
                            </div>

                                <br>
                            <div class=\"col-md-12\">
                                <label>Descripción:</label>
                                <textarea name=\"descripcionActividad\" id=\"descripcionActividad\" cols=\"30\" rows=\"3\" class=\"form-control\"></textarea>
                            </div>
                            <div class=\"col-md-12\">
                                <label>Observación:</label>
                                <textarea name=\"observacionActividad\" id=\"observacionActividad\" cols=\"30\" rows=\"3\" class=\"form-control\"></textarea>
                            </div>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"btnAgregarEscalamiento\" id=\"btnAgregarEscalamiento\" class='btn btn-success' onclick=\"agregarEscalamiento();\">Agregar Escalamiento
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

    // line 158
    public function block_appScript($context, array $blocks = array())
    {
        // line 159
        echo "        <script src=\"views/app/js/escalamiento/escalamiento.js\" type=\"text/javascript\"></script>
        
        <script src=\"views/app/js/JS/jquery-ui-1.12\" type=\"text/javascript\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "escalamiento/agregarEscalamiento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 159,  213 => 158,  185 => 134,  159 => 111,  118 => 73,  112 => 70,  105 => 66,  101 => 65,  63 => 29,  60 => 28,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appStylos %}
<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css\">
    <script>
        var respuestaComunas = new Array();
        \$(document).ready(function (){
            \$.ajax({
                type: \"POST\",
                url: \"api/mostrarComunas2\",
                success: function(response){
                    for (var i=0; i<response.length; i++) {
                        
                        respuestaComunas.push(response[i][\"descripcion\"]);
                    }
                },                
                error: function(xhr, status) {
                    msg_box_alert(99, \"Filtrar Ordenes\", xhr.responseText);
                }
            });
            
           \$( \"#comuna\" ).autocomplete({
                source: respuestaComunas
            });
        });
    </script>
{% endblock %}

{% block appBody %}
    <section class=\"content-header\">
        <h1>
            Escalamiento
            <small>Agregar Actividades</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home
                </a>
            </li>
            <li>
                <a href=\"escalamiento/inicio\">Inicio</a>
            </li>
            <li>
                <a href=\"escalamiento/listar_evento\">Listado de Escalamientos</a>
            </li>
            <li class=\"active\">Agregar Actividad</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class=\"content\">
        <form id=\"formAgregarEscalamiento\" name=\"formAgregarEscalamiento\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Agregar Actividad</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col-md-12 text-center\">
                                <a data-toggle='tooltip' data-placement='top' name=\"btnAgregarEscalamiento\" id=\"btnAgregarEscalamiento\" class='btn btn-success' onclick=\"agregarEscalamiento();\">Agregar Escalamiento
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Usuario:</label><input type=\"text\"   class=\"form-control\"  value=\"{{ owner_user['name'] }} \" disabled>
                                <input type=\"text\" name=\"nombreUsuario\" id=\"nombreUsuario\" class=\"form-control\"  value=\"{{ owner_user['name'] }}\" style=\"display:none\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Id Actividad:</label>
                                  <input type=\"text\" name=\"idActividadManual\" id=\"idActividadManual\" class=\"form-control\" placeholder=\"Ingrese Id Actividad\" value=\"{{ id_actividad }}\" readonly>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Ingreso Actividad:</label><input type=\"DATE\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"{{ \"now\"|date(\"Y-m-d\") }}\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Rut Cliente:</label>
                                  <input type=\"text\" name=\"rutCliente\" id=\"rutCliente\" class=\"form-control\" value=\"\" placeholder=\"Ingrese rut cliente\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Comuna Destinatario:</label>
                                  <input type=\"text\" name=\"comuna\" id=\"comuna\" class=\"comuna form-control\" placeholder=\"Ingrese Comuna\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Compromiso:</label>
                                    <input type=\"date\" name=\"fechaCompromiso\" id=\"fechaCompromiso\" class=\"form-control fechaCompromiso\" placeholder=\"Ingrese Descripción Actividad\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Hora Compromiso:</label>
                                <input type=\"time\" name=\"horaCompromiso\" value=\"\" id=\"horaCompromiso\" class=\"form-control\" placeholder=\"Ingrese Hora Compromiso\">
                            </div>
                            
                            <div class=\"col-md-6\">
                                <label>Canal:</label>
                                    <input type=\"text\" name=\"canal\" id=\"canal\" class=\"form-control canal\" placeholder=\"Ingrese canal\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Bloque:</label>
                                <select class=\"form-control bloque\" name=\"bloque\" id=\"bloque\">
                                    <option value=\"\"selected disabled>Seleccione Bloque</option>
                                    <option value=\"10-13\">10-13</option>
                                    <option value=\"13-16\">13-16</option>
                                    <option value=\"16-19\">16-19</option>
                                    <option value=\"19-21\">19-22</option>
                                </select>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Estado Escalamiento:</label>
                                <input type=\"text\" name=\"estadoEscalamiento\" value=\"\" id=\"estadoEscalamiento\" class=\"form-control\" placeholder=\"Ingrese estado escalamiento\">
                            </div>
                            
                            <input type=\"date\" name=\"fechaCreacion\" class=\"fechaCreacion\" id=\"fechaCreacion\" value=\"{{ \"now\"|date(\"Y-m-d\") }}\" hidden>

                            <div class=\"col-md-6\">
                                <label>Tipo Actividad:</label>
                                    <select class=\"form-control\" name=\"selectTipoActividad\" id=\"selectTipoActividad\">
                                        <option value=\"\"selected disabled>Seleccione Tipo</option>
                                        <option value=\"reparacion\">Reparación</option>
                                        <option value=\"modificacion\">Modificación</option>
                                        <option value=\"alta\">Alta</option>
                                        <option value=\"altaTraslado\">Alta Traslado</option>
                                    </select>
                            </div>

                            <div class=\"col-md-6\">
                                <label>Estado Orden:</label>
                                    <select class=\"form-control\" name=\"selectEstadoOrden\" id=\"selectEstadoOrden\">
                                        <option value=\"\"selected disabled>Seleccione Estado</option>
                                        <option value=\"pendiente\">Pendiente</option>
                                        <option value=\"seguimiento\">Seguimiento</option>
                                    </select>
                            </div>

                            <div class=\"col-md-6\">
                                <input type=\"hidden\" name=\"fechaFinalizacion\" id=\"fechaFinalizacion\" class=\"form-control fechaFinalizacion\" placeholder=\"Ingrese comuna Actividad\" value=\"{{ \"now\"|date(\"Y-m-d\") }}\" >
                            </div>

                                <br>
                            <div class=\"col-md-12\">
                                <label>Descripción:</label>
                                <textarea name=\"descripcionActividad\" id=\"descripcionActividad\" cols=\"30\" rows=\"3\" class=\"form-control\"></textarea>
                            </div>
                            <div class=\"col-md-12\">
                                <label>Observación:</label>
                                <textarea name=\"observacionActividad\" id=\"observacionActividad\" cols=\"30\" rows=\"3\" class=\"form-control\"></textarea>
                            </div>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"btnAgregarEscalamiento\" id=\"btnAgregarEscalamiento\" class='btn btn-success' onclick=\"agregarEscalamiento();\">Agregar Escalamiento
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
        <script src=\"views/app/js/escalamiento/escalamiento.js\" type=\"text/javascript\"></script>
        
        <script src=\"views/app/js/JS/jquery-ui-1.12\" type=\"text/javascript\"></script>
    {% endblock %}
", "escalamiento/agregarEscalamiento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\escalamiento\\agregarEscalamiento.twig");
    }
}
