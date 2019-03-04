<?php

/* escalamiento/escalamiento.twig */
class __TwigTemplate_c016bf9db555db0117f217c5c04db20933b58a21cb1906b4b4045de4eed0cfc9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "escalamiento/escalamiento.twig", 1);
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
        echo "
    <link rel=\"stylesheet\" href=\"views/app/template/datatables/dataTables.bootstrap.css\">
    <link rel=\"stylesheet\" href=\"views/app/template/datatables/jquery.dataTables.css\">

    <style media=\"screen\">
        .buttons-excel{
            background-image: url(views/app/images/i_excel.png);
            background-size: contain;
            width: 32px;
            height: 32px;
            background-color: transparent;
            border: none;
            margin-left: 15px;
        }
    </style>
";
    }

    // line 19
    public function block_appBody($context, array $blocks = array())
    {
        // line 20
        echo "    <section class=\"content-header\">
        <h1>
            Escalamiento
            <small>Resumen Actividades</small>
        </h1>
        <ol class=\"breadcrumb\">
        <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
        <li><a href=\"escalamiento/agregarEncargadoFiltrar\">Agregar Actividad</a></li>
        </ol>
    </section>

    <section class=\"content\">
        <div class=\"row\">
                <div class=\"col col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header with-border\">
                            <h3 class=\"box-title\">Mirada Global</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Gestionadas</h3>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Gestionadas: ";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data1"] ?? null), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>
                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Pendientes</h3>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Pendientes: ";
        // line 55
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data2"] ?? null), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>

                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Seguimiento</h3>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Seguimiento: ";
        // line 66
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data3"] ?? null), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>

                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Finalizadas Hoy</h3>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Finalizadas Hoy: ";
        // line 77
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data4"] ?? null), "data", array(), "array"), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>

                        </div>
                        <ul class=\"nav nav-tabs\">
                            <li class=\"active\"><a data-toggle=\"tab\" href=\"#home\" onclick=\"cargarTabla('gestionada');\">Actividades Gestionadas</a></li>
                            <li><a data-toggle=\"tab\" href=\"#menu1\" class=\"\" onclick=\"cargarTabla('pendiente');\">Actividades Pendientes</a></li>
                            <li><a data-toggle=\"tab\" href=\"#menu2\" onclick=\"cargarTabla('seguimiento');\">Actividades seguimiento</a></li>
                            <li><a data-toggle=\"tab\" href=\"#menu3\" onclick=\"cargarTabla('finalizadaHoy');\">Actividades Finalizadas Hoy</a></li>
                        </ul>
                        <div id=\"home\" class=\"tab-pane fade in active\">
                            <div class=\"\">
                                <h3></h3>
                            </div>
                            <div class=\"box-body\">
                                <table id=\"t1\" class=\"table table-bordered stripe hover t1\" name=\"t1\">
                                    <thead>
                                        <tr>
                                            
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type=\"text\" id=\"tabla\" hidden>
    </section>
";
    }

    // line 108
    public function block_appScript($context, array $blocks = array())
    {
        // line 109
        echo "    <script src=\"views/app/js/escalamiento/escalamiento.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js\"></script>
    <script src=\"https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js\"></script>
    <script src=\"https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "escalamiento/escalamiento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 109,  157 => 108,  123 => 77,  109 => 66,  95 => 55,  82 => 45,  55 => 20,  52 => 19,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appStylos %}

    <link rel=\"stylesheet\" href=\"views/app/template/datatables/dataTables.bootstrap.css\">
    <link rel=\"stylesheet\" href=\"views/app/template/datatables/jquery.dataTables.css\">

    <style media=\"screen\">
        .buttons-excel{
            background-image: url(views/app/images/i_excel.png);
            background-size: contain;
            width: 32px;
            height: 32px;
            background-color: transparent;
            border: none;
            margin-left: 15px;
        }
    </style>
{% endblock %}
{% block appBody %}
    <section class=\"content-header\">
        <h1>
            Escalamiento
            <small>Resumen Actividades</small>
        </h1>
        <ol class=\"breadcrumb\">
        <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
        <li><a href=\"escalamiento/agregarEncargadoFiltrar\">Agregar Actividad</a></li>
        </ol>
    </section>

    <section class=\"content\">
        <div class=\"row\">
                <div class=\"col col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header with-border\">
                            <h3 class=\"box-title\">Mirada Global</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Gestionadas</h3>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Gestionadas: {{ data1[0][0] }}
                                    </div>
                                </div>
                            </div>
                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Pendientes</h3>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Pendientes: {{ data2[0][0] }}
                                    </div>
                                </div>
                            </div>

                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Seguimiento</h3>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Seguimiento: {{ data3[0][0] }}
                                    </div>
                                </div>
                            </div>

                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Finalizadas Hoy</h3>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Finalizadas Hoy: {{ data4[\"data\"][0][0] }}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <ul class=\"nav nav-tabs\">
                            <li class=\"active\"><a data-toggle=\"tab\" href=\"#home\" onclick=\"cargarTabla('gestionada');\">Actividades Gestionadas</a></li>
                            <li><a data-toggle=\"tab\" href=\"#menu1\" class=\"\" onclick=\"cargarTabla('pendiente');\">Actividades Pendientes</a></li>
                            <li><a data-toggle=\"tab\" href=\"#menu2\" onclick=\"cargarTabla('seguimiento');\">Actividades seguimiento</a></li>
                            <li><a data-toggle=\"tab\" href=\"#menu3\" onclick=\"cargarTabla('finalizadaHoy');\">Actividades Finalizadas Hoy</a></li>
                        </ul>
                        <div id=\"home\" class=\"tab-pane fade in active\">
                            <div class=\"\">
                                <h3></h3>
                            </div>
                            <div class=\"box-body\">
                                <table id=\"t1\" class=\"table table-bordered stripe hover t1\" name=\"t1\">
                                    <thead>
                                        <tr>
                                            
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type=\"text\" id=\"tabla\" hidden>
    </section>
{% endblock %}

{% block appScript %}
    <script src=\"views/app/js/escalamiento/escalamiento.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js\"></script>
    <script src=\"https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js\"></script>
    <script src=\"https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js\"></script>
{% endblock %}
", "escalamiento/escalamiento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\escalamiento\\escalamiento.twig");
    }
}
