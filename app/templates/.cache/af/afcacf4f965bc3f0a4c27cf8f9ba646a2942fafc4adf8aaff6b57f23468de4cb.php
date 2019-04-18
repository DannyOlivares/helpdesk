<?php

/* escalamiento/listaActividades.twig */
class __TwigTemplate_0e1590ab6e7db38143070aa679d4796cb0b516b6f69f9a8944efa4cb2fc359c9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "escalamiento/listaActividades.twig", 1);
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
        echo "    <link rel=\"stylesheet\" href=\"views/app/template/datatables/dataTables.bootstrap.css\">
    <style media=\"screen\">
        .at {
            display: none;
        }
    </style>
";
    }

    // line 10
    public function block_appBody($context, array $blocks = array())
    {
        // line 11
        echo "
    <section class=\"content-header menu\" id=\"menu\" >
        <h1>
            Listado Actividades
            <small>Detalle de Actividades</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home</a>
            </li>
            <li ><a href=\"escalamiento/escalamiento\" >Principal</a></li>
            <li class=\"active\">
                <button type=\"button\" name=\"button\" class=\"btn btn-primary\" onclick= location.href='escalamiento/agregarEncargadoFiltrar'>Agregar Actividad</button>
            </li>
        </ol>
    </section>
    <br>
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body\">
                        <table id=\"dataEscalamiento\" name=\"dataordenes\" class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th>Id Actividad</th>
                                    <th>Rut Cliente</th>
                                    <th>Fecha Compromiso</th>
                                    <th>Canal</th>
                                    <th>Bloque </th>
                                    <th>Estado Escalamiento</th>
                                    <th>Tipo Actividad</th>
                                    <th>Gestion</th>
                                    <th>Hora Compromiso</th>
                                    <th>Estado Orden</th>
                                    <th>Creador</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    // line 61
    public function block_appScript($context, array $blocks = array())
    {
        // line 62
        echo "    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/js/escalamiento/escalamiento.js\"></script>
    <script>
        \$(\"#dataEscalamiento\").dataTable({
            ajax: {
                url: \"api/todasLasActividades\",
                type: \"POST\"
              },
            \"language\": {
                \"search\": \"Buscar:\",
                \"zeroRecords\": \"No hay datos para mostrar\",
                \"info\": \"Mostrando _END_ Registros, de un total de _TOTAL_ \",
                \"loadingRecords\": \"Cargando...\",
                \"processing\": \"Procesando...\",
                \"infoEmpty\": \"No hay entradas para mostrar\",
                \"lengthMenu\": \"Mostrar _MENU_ Filas\",
                \"paginate\": {
                    \"first\": \"Primera\",
                    \"last\": \"Ultima\",
                    \"next\": \"Siguiente\",
                    \"previous\": \"Anterior\"
                }
            },
            \"autoWidth\": true,
            \"scrollX\": true,
            \"bSort\": false
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "escalamiento/listaActividades.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 62,  99 => 61,  46 => 11,  43 => 10,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appStylos %}
    <link rel=\"stylesheet\" href=\"views/app/template/datatables/dataTables.bootstrap.css\">
    <style media=\"screen\">
        .at {
            display: none;
        }
    </style>
{% endblock %}
{% block appBody %}

    <section class=\"content-header menu\" id=\"menu\" >
        <h1>
            Listado Actividades
            <small>Detalle de Actividades</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home</a>
            </li>
            <li ><a href=\"escalamiento/escalamiento\" >Principal</a></li>
            <li class=\"active\">
                <button type=\"button\" name=\"button\" class=\"btn btn-primary\" onclick= location.href='escalamiento/agregarEncargadoFiltrar'>Agregar Actividad</button>
            </li>
        </ol>
    </section>
    <br>
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body\">
                        <table id=\"dataEscalamiento\" name=\"dataordenes\" class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th>Id Actividad</th>
                                    <th>Rut Cliente</th>
                                    <th>Fecha Compromiso</th>
                                    <th>Canal</th>
                                    <th>Bloque </th>
                                    <th>Estado Escalamiento</th>
                                    <th>Tipo Actividad</th>
                                    <th>Gestion</th>
                                    <th>Hora Compromiso</th>
                                    <th>Estado Orden</th>
                                    <th>Creador</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
{% endblock %}
{% block appScript %}
    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/js/escalamiento/escalamiento.js\"></script>
    <script>
        \$(\"#dataEscalamiento\").dataTable({
            ajax: {
                url: \"api/todasLasActividades\",
                type: \"POST\"
              },
            \"language\": {
                \"search\": \"Buscar:\",
                \"zeroRecords\": \"No hay datos para mostrar\",
                \"info\": \"Mostrando _END_ Registros, de un total de _TOTAL_ \",
                \"loadingRecords\": \"Cargando...\",
                \"processing\": \"Procesando...\",
                \"infoEmpty\": \"No hay entradas para mostrar\",
                \"lengthMenu\": \"Mostrar _MENU_ Filas\",
                \"paginate\": {
                    \"first\": \"Primera\",
                    \"last\": \"Ultima\",
                    \"next\": \"Siguiente\",
                    \"previous\": \"Anterior\"
                }
            },
            \"autoWidth\": true,
            \"scrollX\": true,
            \"bSort\": false
        });
    </script>
{% endblock %}
", "escalamiento/listaActividades.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\escalamiento\\listaActividades.twig");
    }
}
