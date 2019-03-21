<?php

/* escalamiento/agregarEncargadoFiltrar.twig */
class __TwigTemplate_d78983603ee56c0bfc653ffc817daadae53f4ec94f6397bf4a45f1de7b0a7489 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "escalamiento/agregarEncargadoFiltrar.twig", 1);
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
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css\">
<script src=\"https://code.jquery.com/jquery-1.12.4.js\"></script>
    <script>
        var respuestaComunas = new Array();
        \$(document).ready(function (){
            \$.ajax({
                type: \"POST\",
                url: \"api/mostrarComunas\",
                success: function(response){
                    for (var i=0; i<response.length; i++) {
                        
                        respuestaComunas.push(response[i][\"descripcion\"]);
                    }
                    console.log(respuestaComunas);
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

    // line 31
    public function block_appBody($context, array $blocks = array())
    {
        // line 32
        echo "    <section class=\"content-header\">
        <h1>
            Escalamiento
            <small>Registro Remitente</small>
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
                <a href=\"escalamiento/listaActividades\">Listado Actividades</a>
            </li>
            <li class=\"active\">Agregar Actividad</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class=\"content\">
        <form id=\"formAgregarEncargadoFiltrar\" name=\"formAgregarEncargadoFiltrar\" class=\"formAgregarEncargadoFiltrar\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Registrar Remitente</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col-md-12 text-center\">
                                <a data-toggle='tooltip' data-placement='top' name=\"btnRegistrarRemitente\" id=\"btnRegistrarRemitente\" class='btn btn-success' onclick=\"crearEncargadoFiltrar()\">Registrar Remitente
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Nombre Remitente:</label>
                                  <input type=\"text\" name=\"nombreRemitente\" id=\"nombreRemitente\" class=\"form-control\" placeholder=\"Ingrese nombre Remitente\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Área Ingreso</label>
                                <input type=\"text\" id=\"areaIngreso\" name=\"areaIngreso\" class=\"form-control areaIngreso\" placeholder=\"Ingrese Area Procedencia Actividad\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Comuna Destinatario:</label>
                                  <input type=\"text\" name=\"comuna\" id=\"comuna\" class=\"comuna form-control\" placeholder=\"Ingrese Comuna\" >
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Id Actividad:</label>
                                  <input type=\"text\" name=\"idActividadManual\" id=\"idActividadManual\" class=\"Id_Actividad_Manual form-control\" placeholder=\"Ingrese Id Actividad\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Tipo Actividad:</label>
                                    <select class=\"form-control selectTipoActividad\" name=\"selectTipoActividad\" id=\"selectTipoActividad\">
                                        <option value=\"\" selected disabled>Seleccione Tipo Actividad</option>
                                        <option value=\"deuda\">Deuda</option>
                                        <option value=\"sinActividad\">Sin Actividad</option>
                                        <option value=\"adelantamientoActividades\">Adelantamiento Actividades</option>
                                        <option value=\"actividadesPendientesAndes\">Actividades Pendientes Andes</option>
                                        <option value=\"reclamoComercial\">Solicitud Comercial</option>
                                        <option value=\"reagendamientoReiterado\">Reagendamientos reiterados</option>
                                        <option value=\"fechaFuturaLejana\">Fecha Futura Lejana</option>
                                        <option value=\"fallaSistema\">Falla En El Sistema</option>
                                        <option value=\"derivadaGsa\">Derivada Gsa</option>
                                        <option value=\"noAgendada\">No Agendada</option>
                                        <option value=\"otros\">Otros</option>
                                    </select>
                            </div>
                            <br>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"btnRegistrarRemitente\" id=\"btnRegistrarRemitente\" class='btn btn-success' onclick=\"crearEncargadoFiltrar()\">Registrar Remitente
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

    // line 114
    public function block_appScript($context, array $blocks = array())
    {
        // line 115
        echo "        <script src=\"views/app/js/escalamiento/escalamiento.js\" type=\"text/javascript\"></script>
        <script src=\"//code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "escalamiento/agregarEncargadoFiltrar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 115,  151 => 114,  66 => 32,  63 => 31,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appStylos %}
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css\">
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css\">
<script src=\"https://code.jquery.com/jquery-1.12.4.js\"></script>
    <script>
        var respuestaComunas = new Array();
        \$(document).ready(function (){
            \$.ajax({
                type: \"POST\",
                url: \"api/mostrarComunas\",
                success: function(response){
                    for (var i=0; i<response.length; i++) {
                        
                        respuestaComunas.push(response[i][\"descripcion\"]);
                    }
                    console.log(respuestaComunas);
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
            <small>Registro Remitente</small>
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
                <a href=\"escalamiento/listaActividades\">Listado Actividades</a>
            </li>
            <li class=\"active\">Agregar Actividad</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class=\"content\">
        <form id=\"formAgregarEncargadoFiltrar\" name=\"formAgregarEncargadoFiltrar\" class=\"formAgregarEncargadoFiltrar\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Registrar Remitente</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col-md-12 text-center\">
                                <a data-toggle='tooltip' data-placement='top' name=\"btnRegistrarRemitente\" id=\"btnRegistrarRemitente\" class='btn btn-success' onclick=\"crearEncargadoFiltrar()\">Registrar Remitente
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Nombre Remitente:</label>
                                  <input type=\"text\" name=\"nombreRemitente\" id=\"nombreRemitente\" class=\"form-control\" placeholder=\"Ingrese nombre Remitente\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Área Ingreso</label>
                                <input type=\"text\" id=\"areaIngreso\" name=\"areaIngreso\" class=\"form-control areaIngreso\" placeholder=\"Ingrese Area Procedencia Actividad\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Comuna Destinatario:</label>
                                  <input type=\"text\" name=\"comuna\" id=\"comuna\" class=\"comuna form-control\" placeholder=\"Ingrese Comuna\" >
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Id Actividad:</label>
                                  <input type=\"text\" name=\"idActividadManual\" id=\"idActividadManual\" class=\"Id_Actividad_Manual form-control\" placeholder=\"Ingrese Id Actividad\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Tipo Actividad:</label>
                                    <select class=\"form-control selectTipoActividad\" name=\"selectTipoActividad\" id=\"selectTipoActividad\">
                                        <option value=\"\" selected disabled>Seleccione Tipo Actividad</option>
                                        <option value=\"deuda\">Deuda</option>
                                        <option value=\"sinActividad\">Sin Actividad</option>
                                        <option value=\"adelantamientoActividades\">Adelantamiento Actividades</option>
                                        <option value=\"actividadesPendientesAndes\">Actividades Pendientes Andes</option>
                                        <option value=\"reclamoComercial\">Solicitud Comercial</option>
                                        <option value=\"reagendamientoReiterado\">Reagendamientos reiterados</option>
                                        <option value=\"fechaFuturaLejana\">Fecha Futura Lejana</option>
                                        <option value=\"fallaSistema\">Falla En El Sistema</option>
                                        <option value=\"derivadaGsa\">Derivada Gsa</option>
                                        <option value=\"noAgendada\">No Agendada</option>
                                        <option value=\"otros\">Otros</option>
                                    </select>
                            </div>
                            <br>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"btnRegistrarRemitente\" id=\"btnRegistrarRemitente\" class='btn btn-success' onclick=\"crearEncargadoFiltrar()\">Registrar Remitente
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
", "escalamiento/agregarEncargadoFiltrar.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\escalamiento\\agregarEncargadoFiltrar.twig");
    }
}
