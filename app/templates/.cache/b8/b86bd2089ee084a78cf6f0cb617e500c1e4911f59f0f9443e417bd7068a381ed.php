<?php

/* casilleros/excell.twig */
class __TwigTemplate_7fcc65c4d66d720bb6b16f1cd71bbeb55dc951df6e10f6202d274df07e8d9cab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "casilleros/excell.twig", 1);
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
        echo "    <section class=\"content-header\">
        <h1>
            Casilleros
            <small>Detalle Casilleros Gestionados</small>
            <div class=\"pull-right\">
                <small>
                    <div class=\"pull-right\" id=\"divopciones\" name=\"divopciones\">
                        <form id=\"form_filtrar_todas_ordenes\" name=\"form_filtrar_todas_ordenes\">
                            <label>Desde:</label>
                            <input type='date' id='fechaI' name='fechaI' value='";
        // line 20
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "'>
                            <label>&nbsp;</label>
                            <label>Hasta:</label>
                            <input type='date' id='fechaF'  name='fechaF' value='";
        // line 23
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "'>


                            <a class='btn btn-primary' id='btnfiltrarfecha' name='btnfiltrarfecha' title='Buscar registro' onclick='filtrar_todas_ordenes();' data-toggle='tooltip'>Filtrar Fecha</a>
                            <button type=\"button\" onclick=\"location.reload();\" class=\"btn btn-primary\">Quitar Filtro</button>
                            <a class=\"btn btn-success btn-social\" id=\"btnexportarexcel\" name=\"btnexportarexcel\" onclick=\"exportarexcel();\" title=\"Exportar a Excel\" data-toggle=\"tooltip\">
                                <i class=\"fa fa-arrow-down\"></i> Exportar Excel
                            </a>
                        </form>
                    </div>
                </small>
            </div>
        </h1>
    </section>
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body\">
                        <table id=\"dataordenes\" name=\"dataordenes\" class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>N°Orden</th>
                                    <th>Rut Cliente</th>
                                    <th>Comuna</th>
                                    <th>Actividad</th>
                                    <th>Accion</th>
                                    <th>Casillero</th>
                                    <th width=\"100\">Fecha</th>
                                    <th width=\"50\">Observacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["casilleros"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["t"]) {
            if ((false != ($context["casilleros"] ?? null))) {
                // line 58
                echo "                                    <tr>
                                        <td>";
                // line 59
                echo twig_escape_filter($this->env, ($context["key"] + 1), "html", null, true);
                echo "</td>
                                        <td>";
                // line 60
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "n_orden", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 61
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "rut", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 62
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "descripcion", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 63
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "actividad", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 64
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "accion", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 65
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "casillero", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 66
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "fecha", array()), "html", null, true);
                echo "</td>
                                        <td>
                                            <a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Ver Observacion' class='btn btn-primary btn-sm' onclick=\"visualizar(";
                // line 68
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                echo ");\">
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </a>
                                            <a data-toggle='tooltip' data-placement='top' id=\"btneliminar\" name=\"btneliminar\" title='Eliminar' class='btn btn-danger btn-sm' onclick=\"eliminar(";
                // line 71
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                echo ");\">
                                                <i class='glyphicon glyphicon-remove'></i>
                                            </a>
                                        </td>
                                    </tr>
                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    // line 85
    public function block_appScript($context, array $blocks = array())
    {
        // line 86
        echo "
    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/js/casilleros/casilleros.js\"></script>
    <script>
        \$(\"#dataordenes\").dataTable({
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
        return "casilleros/excell.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 86,  171 => 85,  160 => 77,  147 => 71,  141 => 68,  136 => 66,  132 => 65,  128 => 64,  124 => 63,  120 => 62,  116 => 61,  112 => 60,  108 => 59,  105 => 58,  100 => 57,  63 => 23,  57 => 20,  46 => 11,  43 => 10,  33 => 3,  30 => 2,  11 => 1,);
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
    <section class=\"content-header\">
        <h1>
            Casilleros
            <small>Detalle Casilleros Gestionados</small>
            <div class=\"pull-right\">
                <small>
                    <div class=\"pull-right\" id=\"divopciones\" name=\"divopciones\">
                        <form id=\"form_filtrar_todas_ordenes\" name=\"form_filtrar_todas_ordenes\">
                            <label>Desde:</label>
                            <input type='date' id='fechaI' name='fechaI' value='{{ \"now\"|date(\"Y-m-d\") }}'>
                            <label>&nbsp;</label>
                            <label>Hasta:</label>
                            <input type='date' id='fechaF'  name='fechaF' value='{{ \"now\"|date(\"Y-m-d\") }}'>


                            <a class='btn btn-primary' id='btnfiltrarfecha' name='btnfiltrarfecha' title='Buscar registro' onclick='filtrar_todas_ordenes();' data-toggle='tooltip'>Filtrar Fecha</a>
                            <button type=\"button\" onclick=\"location.reload();\" class=\"btn btn-primary\">Quitar Filtro</button>
                            <a class=\"btn btn-success btn-social\" id=\"btnexportarexcel\" name=\"btnexportarexcel\" onclick=\"exportarexcel();\" title=\"Exportar a Excel\" data-toggle=\"tooltip\">
                                <i class=\"fa fa-arrow-down\"></i> Exportar Excel
                            </a>
                        </form>
                    </div>
                </small>
            </div>
        </h1>
    </section>
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body\">
                        <table id=\"dataordenes\" name=\"dataordenes\" class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>N°Orden</th>
                                    <th>Rut Cliente</th>
                                    <th>Comuna</th>
                                    <th>Actividad</th>
                                    <th>Accion</th>
                                    <th>Casillero</th>
                                    <th width=\"100\">Fecha</th>
                                    <th width=\"50\">Observacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for key, t in casilleros if false != casilleros %}
                                    <tr>
                                        <td>{{ key + 1 }}</td>
                                        <td>{{ t.n_orden }}</td>
                                        <td>{{ t.rut }}</td>
                                        <td>{{ t.descripcion }}</td>
                                        <td>{{ t.actividad }}</td>
                                        <td>{{ t.accion }}</td>
                                        <td>{{ t.casillero }}</td>
                                        <td>{{ t.fecha }}</td>
                                        <td>
                                            <a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Ver Observacion' class='btn btn-primary btn-sm' onclick=\"visualizar({{t.id}});\">
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </a>
                                            <a data-toggle='tooltip' data-placement='top' id=\"btneliminar\" name=\"btneliminar\" title='Eliminar' class='btn btn-danger btn-sm' onclick=\"eliminar({{t.id}});\">
                                                <i class='glyphicon glyphicon-remove'></i>
                                            </a>
                                        </td>
                                    </tr>
                                {% endfor %}
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
    <script src=\"views/app/js/casilleros/casilleros.js\"></script>
    <script>
        \$(\"#dataordenes\").dataTable({
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
", "casilleros/excell.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\casilleros\\excell.twig");
    }
}
