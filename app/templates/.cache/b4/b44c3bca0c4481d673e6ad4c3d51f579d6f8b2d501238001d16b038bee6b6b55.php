<?php

/* escalamiento/escalamiento.twig */
class __TwigTemplate_ce7a27cff50aedef0720bc84857d4e19d4df6d7f7175720d5fdd2e4632becd40 extends Twig_Template
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
    </style>
";
    }

    // line 9
    public function block_appBody($context, array $blocks = array())
    {
        // line 10
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
        // line 35
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
        // line 45
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
        // line 56
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
        // line 67
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
                                        <table id=\"t1\" class=\"table table-bordered\">
                                            <thead>
                                                <tr>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <!-- <div id=\"menu1\" class=\"tab-pane fade\">
                                <div class=\"\">
                                    <h3>Detalle Pendientes</h3>
                                </div>

                                    <div class=\"box-body\">
                                        <table id=\"t2\" class=\"table table-bordered\">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Compromiso</th>
                                                    <th>Bloque Agendamiento</th>
                                                    <th>Id Actividad</th>
                                                    <th>Rut Cliente</th>
                                                    <th>Estado Orden</th>
                                                    <th>Estado Escalamiento </th>
                                                    <th>Tipo de Actividad</th>
                                                    <th>Canal</th>
                                                    <th>Descripción de la Actividad</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div> -->

                                <!-- <div id=\"menu2\" class=\"tab-pane fade\">
                                    <div id=\"\" class=\"\">
                                        <h3>Detalle Seguimiento</h3>
                                    </div>
                                    <div class=\"box-body\">
                                        <table id=\"t3\" class=\"table table-bordered\">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Compromiso</th>
                                                    <th>Bloque Asignado</th>
                                                    <th>Id Actividad</th>
                                                    <th>Rut Cliente</th>
                                                    <th>Estado Orden</th>
                                                    <th>Estado Escalamiento</th>
                                                    <th>Tipo Actividad</th>
                                                    <th>Canal</th>
                                                    <th>Descripción de la Actividad</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div> -->
                                <!-- <div id=\"menu3\" class=\"tab-pane fade\">
                                    <h3>Detalle Finalizadas Hoy</h3>
                                    <div class=\"box-body\">
                                        <table id=\"t4\" name=\"t4\" class=\"table table-bordered t4\">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Compromiso</th>
                                                    <th>Bloque Agendamiento</th>
                                                    <th>Id Actividad</th>
                                                    <th>Rut Cliente</th>
                                                    <th>Estado Orden</th>
                                                    <th>Estado Esacalamiento </th>
                                                    <th>Tipo de Actividad</th>
                                                    <th>Canal</th>
                                                    <th>Descripción de la Actividad</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div> -->
                            </div>

                    </div>
                </div>


    </section>
";
    }

    // line 169
    public function block_appScript($context, array $blocks = array())
    {
        // line 170
        echo "    <script src=\"views/app/js/escalamiento/escalamiento.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <!-- //---------------------------Fin datatable pendiente----------------------------// -->
<!-- <script>
   \$(\"#t2\").dataTable({
       \"ajax\": {
           \"url\": \"api/tablaPendientes\",
           \"type\": \"POST\"
       },
           \"language\"          : {
           \"search\"            : \"Buscar:\",
           \"zeroRecords\"       : \"No hay datos para mostrar\",
           \"info\"              : \"Mostrando _END_ Registros, de un total de _TOTAL_ \",
           \"loadingRecords\"    : \"Cargando...\",
           \"processing\"        : \"Procesando...\",
           \"infoEmpty\"         : \"No hay entradas para mostrar\",
           \"lengthMenu\"        : \"Mostrar _MENU_ Filas\",

           \"paginate\"          : {
           \"first\"             : \"Primera\",
           \"last\"              : \"Ultima\",
           \"next\"              : \"Siguiente\",
           \"previous\"          : \"Anterior\"
           }
       },
           \"autoWidth\"         : true,
           \"scrollX\"           : true,
           \"bSort\"             : false,
           \"bInfo\"             : false,
           \"iDisplayLength\"    : 8,
           \"pagingType\"        : \"full_numbers\"
   });
</script> -->
<!-- podemos en el llamado del datatable generar un ajax y traer datos atravez de una api -->

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
        return array (  221 => 170,  218 => 169,  113 => 67,  99 => 56,  85 => 45,  72 => 35,  45 => 10,  42 => 9,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appStylos %}

    <link rel=\"stylesheet\" href=\"views/app/template/datatables/dataTables.bootstrap.css\">
    <link rel=\"stylesheet\" href=\"views/app/template/datatables/jquery.dataTables.css\">
    <style media=\"screen\">
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
                                        <table id=\"t1\" class=\"table table-bordered\">
                                            <thead>
                                                <tr>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <!-- <div id=\"menu1\" class=\"tab-pane fade\">
                                <div class=\"\">
                                    <h3>Detalle Pendientes</h3>
                                </div>

                                    <div class=\"box-body\">
                                        <table id=\"t2\" class=\"table table-bordered\">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Compromiso</th>
                                                    <th>Bloque Agendamiento</th>
                                                    <th>Id Actividad</th>
                                                    <th>Rut Cliente</th>
                                                    <th>Estado Orden</th>
                                                    <th>Estado Escalamiento </th>
                                                    <th>Tipo de Actividad</th>
                                                    <th>Canal</th>
                                                    <th>Descripción de la Actividad</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div> -->

                                <!-- <div id=\"menu2\" class=\"tab-pane fade\">
                                    <div id=\"\" class=\"\">
                                        <h3>Detalle Seguimiento</h3>
                                    </div>
                                    <div class=\"box-body\">
                                        <table id=\"t3\" class=\"table table-bordered\">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Compromiso</th>
                                                    <th>Bloque Asignado</th>
                                                    <th>Id Actividad</th>
                                                    <th>Rut Cliente</th>
                                                    <th>Estado Orden</th>
                                                    <th>Estado Escalamiento</th>
                                                    <th>Tipo Actividad</th>
                                                    <th>Canal</th>
                                                    <th>Descripción de la Actividad</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div> -->
                                <!-- <div id=\"menu3\" class=\"tab-pane fade\">
                                    <h3>Detalle Finalizadas Hoy</h3>
                                    <div class=\"box-body\">
                                        <table id=\"t4\" name=\"t4\" class=\"table table-bordered t4\">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Compromiso</th>
                                                    <th>Bloque Agendamiento</th>
                                                    <th>Id Actividad</th>
                                                    <th>Rut Cliente</th>
                                                    <th>Estado Orden</th>
                                                    <th>Estado Esacalamiento </th>
                                                    <th>Tipo de Actividad</th>
                                                    <th>Canal</th>
                                                    <th>Descripción de la Actividad</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div> -->
                            </div>

                    </div>
                </div>


    </section>
{% endblock %}

{% block appScript %}
    <script src=\"views/app/js/escalamiento/escalamiento.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <!-- //---------------------------Fin datatable pendiente----------------------------// -->
<!-- <script>
   \$(\"#t2\").dataTable({
       \"ajax\": {
           \"url\": \"api/tablaPendientes\",
           \"type\": \"POST\"
       },
           \"language\"          : {
           \"search\"            : \"Buscar:\",
           \"zeroRecords\"       : \"No hay datos para mostrar\",
           \"info\"              : \"Mostrando _END_ Registros, de un total de _TOTAL_ \",
           \"loadingRecords\"    : \"Cargando...\",
           \"processing\"        : \"Procesando...\",
           \"infoEmpty\"         : \"No hay entradas para mostrar\",
           \"lengthMenu\"        : \"Mostrar _MENU_ Filas\",

           \"paginate\"          : {
           \"first\"             : \"Primera\",
           \"last\"              : \"Ultima\",
           \"next\"              : \"Siguiente\",
           \"previous\"          : \"Anterior\"
           }
       },
           \"autoWidth\"         : true,
           \"scrollX\"           : true,
           \"bSort\"             : false,
           \"bInfo\"             : false,
           \"iDisplayLength\"    : 8,
           \"pagingType\"        : \"full_numbers\"
   });
</script> -->
<!-- podemos en el llamado del datatable generar un ajax y traer datos atravez de una api -->

{% endblock %}
", "escalamiento/escalamiento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\escalamiento\\escalamiento.twig");
    }
}
