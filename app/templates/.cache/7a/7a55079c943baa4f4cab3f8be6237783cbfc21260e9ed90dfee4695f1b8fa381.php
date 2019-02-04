<?php

/* escalamiento/agregarEncargadoFiltrar.twig */
class __TwigTemplate_0a1f070a14b55a1fbc4c02864fb990f5602d752ebed47f815840b487da6db603 extends Twig_Template
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
";
    }

    // line 6
    public function block_appBody($context, array $blocks = array())
    {
        // line 7
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
                <a href=\"escalamiento/listar_evento\">Listado de Escalamientos</a>
            </li>
            <li class=\"active\">Agregar Actividad</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class=\"content\">
        <form id=\"form_evento\" name=\"form_evento\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Registrar Remitente</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col-md-12 text-center\">
                                <a data-toggle='tooltip' data-placement='top' name=\"btnRegistrarRemitente\" id=\"btnRegistrarRemitente\" class='btn btn-success' onclick=\"registrarRemitente()\">Registrar Remitente
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Nombre Remitente:</label>
                                  <input type=\"text\" name=\"nombreRemitente\" id=\"nombreRemitente\" class=\"form-control\" placeholder=\"Ingrese nombre Remitente\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Área Ingreso</label>
                                <input type=\"text\" name=\"\" class=\"form-control\" value=\"\" placeholder=\"Ingrese Area Procedencia Actividad\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Comuna:</label>
                                  <input type=\"text\" name=\"comuna\" id=\"comuna\" class=\"comuna form-control\" placeholder=\"Ingrese Comuna\" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Tipo Actividad:</label>
                                    <select class=\"form-control\" name=\"\">
                                        <option value=\"\" selected disabled>Seleccione Tipo Actividad</option>
                                        <option value=\"deuda\">Deuda</option>
                                        <option value=\"sinActividad\">Sin Actividad</option>
                                        <option value=\"adelantamientoOrdenes\">Adelantamiento Ordenes</option>
                                        <option value=\"actividadPendienteAndes\">Actividades Pendientes Andes</option>
                                        <option value=\"reclamoComercial\">Reclamo Comercial</option>
                                        <option value=\"reagendamientoReiterado\">Reagendamientod Reiterados</option>
                                        <option value=\"fechaFuturaLejana\">Fecha Futura Lejana</option>
                                        <option value=\"fallaSistema\">Falla en el sistema</option>
                                    </select>
                            </div>
                            <br>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"btnRegistrarRemitente\" id=\"btnRegistrarRemitente\" class='btn btn-success' onclick=\"registrarRemitente()\">Registrar Remitente
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

    // line 82
    public function block_appScript($context, array $blocks = array())
    {
        // line 83
        echo "        <script src=\"views/app/js/evento/evento.js\" type=\"text/javascript\"></script>
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
        return array (  122 => 83,  119 => 82,  41 => 7,  38 => 6,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "escalamiento/agregarEncargadoFiltrar.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\escalamiento\\agregarEncargadoFiltrar.twig");
    }
}
