<?php

/* escalamiento/agregarEscalamientoNoCorresponde.twig */
class __TwigTemplate_6b077bcbf84dadd80f3c1db00e8c3755349d9dbd9ff48c76e275df4007ec589a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "escalamiento/agregarEscalamientoNoCorresponde.twig", 1);
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
    <script src=\"https://code.jquery.com/jquery-1.12.4.js\"></script>
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

    // line 29
    public function block_appBody($context, array $blocks = array())
    {
        // line 30
        echo "    <section class=\"content-header\">
        <h1>
            Escalamiento
            <small>Actividades mal Derivadas</small>
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
            <li class=\"active\">Agregar Escalamiento</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class=\"content\">
        <form id=\"formAgregarEscalamientoNoCorresponde\" name=\"formAgregarEscalamientoNoCorresponde\" class=\"formAgregarEscalamientoNoCorresponde\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Finalizar Orden</h3>
                        </div>
                        
                        <div class=\"box-body\">
                            <div class=\"col-md-12 text-center\">
                                <a data-toggle='tooltip' data-placement='top' name=\"btnAgregarEscalamiento\" id=\"btnAgregarEscalamiento\" class='btn btn-success' onclick=\"agregarEscalamientoNoCorresponde();\">Finalizar Gestión
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Nombre Usuario:</label><input type=\"text\"   class=\"form-control\"  value=\"";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo " \" disabled>
                                <input type=\"text\" name=\"nombreUsuario\" id=\"nombreUsuario\" class=\"form-control\"  value=\"";
        // line 69
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo "\" style=\"display:none\">
                            </div>
                            
                            <div class=\"col-md-6\">
                                <label for=\"nombreRemitente\">Nombre remitente:</label>
                                <input type=\"text\" name=\"nombreRemitente\" id=\"nombreRemitente\" class=\"form-control nombreRemitente\"  value=\"";
        // line 74
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["datos"] ?? null), "nombreRemitente", array()), "html", null, true);
        echo "\" placeholder=\"Ingrese nombre Remitente\" readonly>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Rut Cliente:</label>
                                <input type=\"text\" name=\"rutCliente\" id=\"rutCliente\" class=\"form-control rutCliente\"  value=\"\" placeholder=\"Ingrese Rut Cliente\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Área Ingreso:</label>
                                <input type=\"text\" name=\"areaIngreso\" id=\"areaIngreso\" class=\"form-control areaIngreso\"  value=\"";
        // line 82
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["datos"] ?? null), "areaIngreso", array()), "html", null, true);
        echo "\" placeholder=\"Ingrese Area Ingreso\" readOnly>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Ingreso Actividad:</label><input type=\"date\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"";
        // line 85
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\" readonly>
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Id Actividad:</label>
                                  <input type=\"text\" name=\"idActividad\" id=\"idActividad\" class=\"form-control idActividad\" placeholder=\"Ingrese id Actividad\" value=\"";
        // line 89
        echo twig_escape_filter($this->env, ($context["id_actividad"] ?? null), "html", null, true);
        echo "\" readonly>
                            </div>
                            <div class=\"col-md-12\">
                                <label>Observación:</label>
                                <textarea name=\"observacion\" id=\"observacion\" cols=\"30\" rows=\"3\" class=\"form-control observacion\"></textarea>
                            </div>
                            <div class=\"col-md-6\">
                                <input type=\"hidden\" name=\"fechaFinalizacion\" id=\"fechaFinalizacion\" class=\"form-control fechaFinalizacion\" placeholder=\"\" value=\"";
        // line 96
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\" >
                            </div>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"btnAgregarEscalamiento\" id=\"btnAgregarEscalamiento\" class='btn btn-success' onclick=\"agregarEscalamientoNoCorresponde();\">Finalizar Gestión
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

    // line 110
    public function block_appScript($context, array $blocks = array())
    {
        // line 111
        echo "        <script src=\"views/app/js/escalamiento/escalamiento.js\" type=\"text/javascript\"></script>
        <script src=\"//code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "escalamiento/agregarEscalamientoNoCorresponde.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 111,  168 => 110,  150 => 96,  140 => 89,  133 => 85,  127 => 82,  116 => 74,  108 => 69,  104 => 68,  64 => 30,  61 => 29,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appStylos %}
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css\">
    <script src=\"https://code.jquery.com/jquery-1.12.4.js\"></script>
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
            <small>Actividades mal Derivadas</small>
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
            <li class=\"active\">Agregar Escalamiento</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class=\"content\">
        <form id=\"formAgregarEscalamientoNoCorresponde\" name=\"formAgregarEscalamientoNoCorresponde\" class=\"formAgregarEscalamientoNoCorresponde\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Finalizar Orden</h3>
                        </div>
                        
                        <div class=\"box-body\">
                            <div class=\"col-md-12 text-center\">
                                <a data-toggle='tooltip' data-placement='top' name=\"btnAgregarEscalamiento\" id=\"btnAgregarEscalamiento\" class='btn btn-success' onclick=\"agregarEscalamientoNoCorresponde();\">Finalizar Gestión
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Nombre Usuario:</label><input type=\"text\"   class=\"form-control\"  value=\"{{ owner_user['name'] }} \" disabled>
                                <input type=\"text\" name=\"nombreUsuario\" id=\"nombreUsuario\" class=\"form-control\"  value=\"{{ owner_user['name'] }}\" style=\"display:none\">
                            </div>
                            
                            <div class=\"col-md-6\">
                                <label for=\"nombreRemitente\">Nombre remitente:</label>
                                <input type=\"text\" name=\"nombreRemitente\" id=\"nombreRemitente\" class=\"form-control nombreRemitente\"  value=\"{{ datos.nombreRemitente }}\" placeholder=\"Ingrese nombre Remitente\" readonly>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Rut Cliente:</label>
                                <input type=\"text\" name=\"rutCliente\" id=\"rutCliente\" class=\"form-control rutCliente\"  value=\"\" placeholder=\"Ingrese Rut Cliente\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Área Ingreso:</label>
                                <input type=\"text\" name=\"areaIngreso\" id=\"areaIngreso\" class=\"form-control areaIngreso\"  value=\"{{datos.areaIngreso}}\" placeholder=\"Ingrese Area Ingreso\" readOnly>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Ingreso Actividad:</label><input type=\"date\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"{{ \"now\"|date(\"Y-m-d\") }}\" readonly>
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Id Actividad:</label>
                                  <input type=\"text\" name=\"idActividad\" id=\"idActividad\" class=\"form-control idActividad\" placeholder=\"Ingrese id Actividad\" value=\"{{ id_actividad }}\" readonly>
                            </div>
                            <div class=\"col-md-12\">
                                <label>Observación:</label>
                                <textarea name=\"observacion\" id=\"observacion\" cols=\"30\" rows=\"3\" class=\"form-control observacion\"></textarea>
                            </div>
                            <div class=\"col-md-6\">
                                <input type=\"hidden\" name=\"fechaFinalizacion\" id=\"fechaFinalizacion\" class=\"form-control fechaFinalizacion\" placeholder=\"\" value=\"{{ \"now\"|date(\"Y-m-d\") }}\" >
                            </div>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"btnAgregarEscalamiento\" id=\"btnAgregarEscalamiento\" class='btn btn-success' onclick=\"agregarEscalamientoNoCorresponde();\">Finalizar Gestión
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
        <script src=\"//code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    {% endblock %}
", "escalamiento/agregarEscalamientoNoCorresponde.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\escalamiento\\agregarEscalamientoNoCorresponde.twig");
    }
}
