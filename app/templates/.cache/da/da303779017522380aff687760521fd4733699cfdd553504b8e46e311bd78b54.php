<?php

/* escalamiento/agregarEscalamientoNoCorresponde.twig */
class __TwigTemplate_ad9286a067c5cd8b450a5c4c8508480e2ea387b2c0af6f0f246be892c29ca506 extends Twig_Template
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
";
    }

    // line 6
    public function block_appBody($context, array $blocks = array())
    {
        // line 7
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
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo " \" disabled>
                                <input type=\"text\" name=\"nombreUsuario\" id=\"nombreUsuario\" class=\"form-control\"  value=\"";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo "\" style=\"display:none\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Nombre remitente:</label>
                                <input type=\"text\" name=\"nombreRemitente\" id=\"nombreRemitente\" class=\"form-control nombreRemitente\"  value=\"";
        // line 49
        echo twig_escape_filter($this->env, ($context["nombreRemitente"] ?? null), "html", null, true);
        echo "\" placeholder=\"Ingrese nombre Remitente\" readonly>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Ingreso Actividad:</label><input type=\"date\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Rut Cliente:</label>
                                  <input type=\"text\" name=\"rutCliente\" id=\"rutCliente\" class=\"form-control rutCliente\" placeholder=\"Ingrese rut cliente\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Id Actividad:</label>
                                  <input type=\"text\" name=\"idActividad\" id=\"idActividad\" class=\"form-control idActividad\" placeholder=\"Ingrese id Actividad\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, ($context["id_actividad"] ?? null), "html", null, true);
        echo "\" readonly>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Canal:</label>
                                <input type=\"text\" name=\"canal\" id=\"canal\" class=\"form-control canal\" placeholder=\"Ingrese canal\" value=\"\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Compromiso:</label>
                                <input type=\"date\" name=\"fechaCompromiso\" id=\"fechaCompromiso\" class=\"form-control fechaCompromiso\" placeholder=\"Ingrese fecha compromiso\" value=\"\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Bloque:</label>
                                <select class=\"form-control bloque\" name=\"bloque\" id=\"bloque\">
                                    <option value=\"\"selected disabled>Seleccione Bloque</option>
                                    <option value=\"09-13\">10-13</option>
                                    <option value=\"13-16\">13-16</option>
                                    <option value=\"16-19\">16-19</option>
                                    <option value=\"19-21\">19-22</option>
                                </select>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Estado Escalamiento:</label>
                                <input type=\"text\" name=\"estadoEscalamiento\" value=\"\" id=\"estadoEscalamiento\" class=\"form-control\" placeholder=\"Ingrese estado escalamiento\">
                            </div>
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
                                    <select class=\"form-control\" onchange=\"this.options[1].selected=true\" name=\"selectEstadoOrden\" id=\"selectEstadoOrden\">
                                        <option value=\"\"selected disabled>Seleccione Estado</option>
                                        <option value=\"finalizada\" selected>Finalizada</option>
                                        <option value=\"pendiente\">Pendiente</option>
                                        <option value=\"seguimiento\">Seguimiento</option>
                                    </select>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Comuna:</label>
                                <input type=\"text\" name=\"comuna\" value=\"\" id=\"comuna\" class=\"form-control\" placeholder=\"Ingrese comuna\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Hora Compromiso:</label>
                                <input type=\"time\" name=\"horaCompromiso\" value=\"\" id=\"horaCompromiso\" class=\"form-control horaCompromiso\" placeholder=\"Ingrese Hora Compromiso\">
                            </div>
                            <div class=\"col-md-12\">
                                <label>Descripción:</label>
                                <textarea name=\"descripcionActividad\" id=\"descripcionActividad\" cols=\"30\" rows=\"3\" class=\"form-control\"></textarea>
                            </div>
                            <div class=\"col-md-6\">
                                <input type=\"hidden\" name=\"fechaFinalizacion\" id=\"fechaFinalizacion\" class=\"form-control fechaFinalizacion\" placeholder=\"\" value=\"";
        // line 116
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

    // line 130
    public function block_appScript($context, array $blocks = array())
    {
        // line 131
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
        return array (  188 => 131,  185 => 130,  167 => 116,  108 => 60,  97 => 52,  91 => 49,  84 => 45,  80 => 44,  41 => 7,  38 => 6,  33 => 3,  30 => 2,  11 => 1,);
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
                                <label>Nombre remitente:</label>
                                <input type=\"text\" name=\"nombreRemitente\" id=\"nombreRemitente\" class=\"form-control nombreRemitente\"  value=\"{{ nombreRemitente }}\" placeholder=\"Ingrese nombre Remitente\" readonly>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Ingreso Actividad:</label><input type=\"date\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"{{ \"now\"|date(\"Y-m-d\") }}\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Rut Cliente:</label>
                                  <input type=\"text\" name=\"rutCliente\" id=\"rutCliente\" class=\"form-control rutCliente\" placeholder=\"Ingrese rut cliente\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Id Actividad:</label>
                                  <input type=\"text\" name=\"idActividad\" id=\"idActividad\" class=\"form-control idActividad\" placeholder=\"Ingrese id Actividad\" value=\"{{ id_actividad }}\" readonly>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Canal:</label>
                                <input type=\"text\" name=\"canal\" id=\"canal\" class=\"form-control canal\" placeholder=\"Ingrese canal\" value=\"\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Compromiso:</label>
                                <input type=\"date\" name=\"fechaCompromiso\" id=\"fechaCompromiso\" class=\"form-control fechaCompromiso\" placeholder=\"Ingrese fecha compromiso\" value=\"\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Bloque:</label>
                                <select class=\"form-control bloque\" name=\"bloque\" id=\"bloque\">
                                    <option value=\"\"selected disabled>Seleccione Bloque</option>
                                    <option value=\"09-13\">10-13</option>
                                    <option value=\"13-16\">13-16</option>
                                    <option value=\"16-19\">16-19</option>
                                    <option value=\"19-21\">19-22</option>
                                </select>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Estado Escalamiento:</label>
                                <input type=\"text\" name=\"estadoEscalamiento\" value=\"\" id=\"estadoEscalamiento\" class=\"form-control\" placeholder=\"Ingrese estado escalamiento\">
                            </div>
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
                                    <select class=\"form-control\" onchange=\"this.options[1].selected=true\" name=\"selectEstadoOrden\" id=\"selectEstadoOrden\">
                                        <option value=\"\"selected disabled>Seleccione Estado</option>
                                        <option value=\"finalizada\" selected>Finalizada</option>
                                        <option value=\"pendiente\">Pendiente</option>
                                        <option value=\"seguimiento\">Seguimiento</option>
                                    </select>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Comuna:</label>
                                <input type=\"text\" name=\"comuna\" value=\"\" id=\"comuna\" class=\"form-control\" placeholder=\"Ingrese comuna\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Hora Compromiso:</label>
                                <input type=\"time\" name=\"horaCompromiso\" value=\"\" id=\"horaCompromiso\" class=\"form-control horaCompromiso\" placeholder=\"Ingrese Hora Compromiso\">
                            </div>
                            <div class=\"col-md-12\">
                                <label>Descripción:</label>
                                <textarea name=\"descripcionActividad\" id=\"descripcionActividad\" cols=\"30\" rows=\"3\" class=\"form-control\"></textarea>
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
