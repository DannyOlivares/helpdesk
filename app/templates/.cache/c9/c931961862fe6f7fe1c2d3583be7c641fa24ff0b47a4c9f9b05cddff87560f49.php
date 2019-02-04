<?php

/* evento/listarEvento.twig */
class __TwigTemplate_0506eed2543ec84ca2b57e2249a069e3072d79c63f7fe2478a790ed200908d14 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "evento/listarEvento.twig", 1);
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
            Eventos
            <small>Eventos Registrados por Ejecutivo</small>

            <a class=\"btn btn-primary btn-social pull-right\" href=\"evento/agregarEvento\" title=\"Agregar\" data-toggle=\"tooltip\">
                <i class=\"fa fa-plus\"></i>
                Agregar Nuevo Evento
            </a>
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
                                    <th>Autor</th>
                                    <th>Descripcion </th>
                                    <th>Responsable</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Area Contingencia</th>
                                    <th>Observación</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["data"] ?? null))) {
                // line 43
                echo "
                                    <tr>
                                        <td>";
                // line 45
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 46
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "ingresadoPor", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 47
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "descripcion", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 48
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "responsable", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 49
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 50
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "hora", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "areaContingencia", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 52
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "observacion", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 53
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado", array()), "html", null, true);
                echo "</td>
                                        <td>
                                            <a data-toggle='tooltip' data-placement='top' id=\"btnmodificar\" name=\"btnmodificar\" title='Modificar' class='btn btn-success btn-sm' href=\"casilleros/editar/";
                // line 55
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["t"] ?? null), "id", array()), "html", null, true);
                echo "\">
                                                <i class='glyphicon glyphicon-edit'></i>
                                            </a>
                                            <a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Ver Observacion' class='btn btn-primary btn-sm' onclick=\"visualizar(";
                // line 58
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["t"] ?? null), "id", array()), "html", null, true);
                echo ");\">
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </a>
                                        </td>
                                    </tr>
                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    // line 72
    public function block_appScript($context, array $blocks = array())
    {
        // line 73
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
        return "evento/listarEvento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 73,  155 => 72,  144 => 64,  131 => 58,  125 => 55,  120 => 53,  116 => 52,  112 => 51,  108 => 50,  104 => 49,  100 => 48,  96 => 47,  92 => 46,  88 => 45,  84 => 43,  79 => 42,  46 => 11,  43 => 10,  33 => 3,  30 => 2,  11 => 1,);
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
            Eventos
            <small>Eventos Registrados por Ejecutivo</small>

            <a class=\"btn btn-primary btn-social pull-right\" href=\"evento/agregarEvento\" title=\"Agregar\" data-toggle=\"tooltip\">
                <i class=\"fa fa-plus\"></i>
                Agregar Nuevo Evento
            </a>
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
                                    <th>Autor</th>
                                    <th>Descripcion </th>
                                    <th>Responsable</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Area Contingencia</th>
                                    <th>Observación</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                {%  for d in data if false != data %}

                                    <tr>
                                        <td>{{ d.id }}</td>
                                        <td>{{ d.ingresadoPor }}</td>
                                        <td>{{ d.descripcion }}</td>
                                        <td>{{ d.responsable }}</td>
                                        <td>{{ d.fecha }}</td>
                                        <td>{{ d.hora }}</td>
                                        <td>{{ d.areaContingencia }}</td>
                                        <td>{{ d.observacion }}</td>
                                        <td>{{ d.estado }}</td>
                                        <td>
                                            <a data-toggle='tooltip' data-placement='top' id=\"btnmodificar\" name=\"btnmodificar\" title='Modificar' class='btn btn-success btn-sm' href=\"casilleros/editar/{{t.id}}\">
                                                <i class='glyphicon glyphicon-edit'></i>
                                            </a>
                                            <a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Ver Observacion' class='btn btn-primary btn-sm' onclick=\"visualizar({{t.id}});\">
                                                <i class='glyphicon glyphicon-eye-open'></i>
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
", "evento/listarEvento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\evento\\listarEvento.twig");
    }
}
