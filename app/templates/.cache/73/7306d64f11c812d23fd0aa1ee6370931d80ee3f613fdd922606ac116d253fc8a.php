<?php

/* evento/list_evento.twig */
class __TwigTemplate_55fd99ebb734a71ccedb25e6fbe2774b8d39bd27cc52c19c0bf72a7166960e3a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "evento/list_evento.twig", 1);
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
    <section class=\"content-header\">
        <h1>
            Eventos
            <small>Listado Eventos</small>

            <a class=\"btn btn-primary btn-social pull-right\" href=\"evento/agregarEvento\" title=\"Agregar\" data-toggle=\"tooltip\">
                <i class=\"fa fa-plus\"></i>
                Agregar Nuevo Evento
            </a>
        </h1>
    </section>
    ";
        // line 23
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["data"] ?? null)), "html", null, true);
        echo "
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body\">
                        <table id=\"dataordenes\" name=\"dataordenes\" class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hora Evento</th>
                                    <th>Descripción</th>
                                    <th>Observacion</th>
                                    <th>Fecha Creacion </th>
                                    <th>Fecha Evento </th>
                                    <th>Fecha Cierre </th>
                                    <th>Creador Evento</th>
                                    <th>Estado Evento   </th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["data"] ?? null))) {
                // line 45
                echo "                                    <tr>
                                        <td>";
                // line 46
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 47
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "hora_evento", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 48
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "descripcion_evento", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 49
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "observacion_evento", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 50
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_ingreso", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_evento", array()), "html", null, true);
                echo "</td>
                                        ";
                // line 52
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_cierre", array()) != null)) {
                    // line 53
                    echo "                                        <td>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_cierre", array()), "html", null, true);
                    echo "</td>
                                        ";
                } else {
                    // line 55
                    echo "                                        <td>No Finalizado</td>
                                        ";
                }
                // line 57
                echo "                                        <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "name", array()), "html", null, true);
                echo "</td>
                                            ";
                // line 58
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_evento", array()) == "1")) {
                    // line 59
                    echo "                                                <td>Finalizada</td>
                                        ";
                } else {
                    // line 61
                    echo "                                                <td>Pendiente</td>
                                        ";
                }
                // line 63
                echo "                                        <td>

                                            ";
                // line 65
                if (((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_evento", array()) != "1") && (twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id_usuario", array()) == ($context["user"] ?? null)))) {
                    // line 66
                    echo "                                            <a data-toggle='tooltip' data-placement='top' id=\"btnmodificar\" name=\"btnmodificar\" title='Modificar' class='btn btn-success btn-sm' href=\"evento/editar_evento/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                    echo "\">
                                                <i class='glyphicon glyphicon-edit'></i>
                                            </a>
                                            ";
                }
                // line 70
                echo "                                            <a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Ver Observacion' class='btn btn-primary btn-sm' onclick=\"visualizar(";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                echo ")\">
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </a>
                                            ";
                // line 73
                if (((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_evento", array()) != "1") && (twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id_usuario", array()) == ($context["user"] ?? null)))) {
                    // line 74
                    echo "                                            <a data-toggle='tooltip' data-placement='top' id=\"btnEliminar\" name=\"btnEliminar\" title='Eliminar' class='btn btn-danger btn-sm' href=\"evento/eliminar_evento/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                    echo "\">
                                                <i class='glyphicon glyphicon-erase'></i>
                                            </a>
                                            ";
                }
                // line 78
                echo "
                                        </td>
                                    </tr>
                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    // line 90
    public function block_appScript($context, array $blocks = array())
    {
        // line 91
        echo "    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/js/evento/evento.js\"></script>
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
        return "evento/list_evento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 91,  195 => 90,  184 => 82,  174 => 78,  166 => 74,  164 => 73,  157 => 70,  149 => 66,  147 => 65,  143 => 63,  139 => 61,  135 => 59,  133 => 58,  128 => 57,  124 => 55,  118 => 53,  116 => 52,  112 => 51,  108 => 50,  104 => 49,  100 => 48,  96 => 47,  92 => 46,  89 => 45,  84 => 44,  60 => 23,  46 => 11,  43 => 10,  33 => 3,  30 => 2,  11 => 1,);
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
            <small>Listado Eventos</small>

            <a class=\"btn btn-primary btn-social pull-right\" href=\"evento/agregarEvento\" title=\"Agregar\" data-toggle=\"tooltip\">
                <i class=\"fa fa-plus\"></i>
                Agregar Nuevo Evento
            </a>
        </h1>
    </section>
    {{ dump(data) }}
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body\">
                        <table id=\"dataordenes\" name=\"dataordenes\" class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hora Evento</th>
                                    <th>Descripción</th>
                                    <th>Observacion</th>
                                    <th>Fecha Creacion </th>
                                    <th>Fecha Evento </th>
                                    <th>Fecha Cierre </th>
                                    <th>Creador Evento</th>
                                    <th>Estado Evento   </th>
                                </tr>
                            </thead>
                            <tbody>
                                {%  for d in data if false != data %}
                                    <tr>
                                        <td>{{ d.id }}</td>
                                        <td>{{ d.hora_evento }}</td>
                                        <td>{{ d.descripcion_evento}}</td>
                                        <td>{{ d.observacion_evento }}</td>
                                        <td>{{ d.fecha_ingreso}}</td>
                                        <td>{{ d.fecha_evento}}</td>
                                        {% if d.fecha_cierre != null %}
                                        <td>{{ d.fecha_cierre }}</td>
                                        {%  else %}
                                        <td>No Finalizado</td>
                                        {%  endif %}
                                        <td>{{ d.name }}</td>
                                            {%  if d.estado_evento == \"1\" %}
                                                <td>Finalizada</td>
                                        {%  else %}
                                                <td>Pendiente</td>
                                        {% endif %}
                                        <td>

                                            {%  if  d.estado_evento != \"1\"  and d.id_usuario == user%}
                                            <a data-toggle='tooltip' data-placement='top' id=\"btnmodificar\" name=\"btnmodificar\" title='Modificar' class='btn btn-success btn-sm' href=\"evento/editar_evento/{{d.id}}\">
                                                <i class='glyphicon glyphicon-edit'></i>
                                            </a>
                                            {%  endif %}
                                            <a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Ver Observacion' class='btn btn-primary btn-sm' onclick=\"visualizar({{d.id}})\">
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </a>
                                            {%  if  d.estado_evento != \"1\"  and d.id_usuario == user%}
                                            <a data-toggle='tooltip' data-placement='top' id=\"btnEliminar\" name=\"btnEliminar\" title='Eliminar' class='btn btn-danger btn-sm' href=\"evento/eliminar_evento/{{d.id}}\">
                                                <i class='glyphicon glyphicon-erase'></i>
                                            </a>
                                            {%  endif %}

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
    <script src=\"views/app/js/evento/evento.js\"></script>
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
", "evento/list_evento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\evento\\list_evento.twig");
    }
}
