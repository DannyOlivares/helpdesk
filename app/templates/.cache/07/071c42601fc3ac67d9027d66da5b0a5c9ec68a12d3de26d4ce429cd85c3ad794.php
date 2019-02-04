<?php

/* evento/llamarEvento.twig */
class __TwigTemplate_265b0e771c0af406065dd8be04c2ddc968af88fbe09c05ac2ffaef0bbb632d7d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "evento/llamarEvento.twig", 1);
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
        echo "    <link rel=\"stylesheet\" href=\"views\\app\\css\\misEstilos.css\">
    <link rel=\"stylesheet\" href=\"views/app/template/datatables/dataTables.bootstrap.css\">
    <style media=\"screen\">
        .at {
            display: none;
        }
    </style>
";
    }

    // line 11
    public function block_appBody($context, array $blocks = array())
    {
        // line 12
        echo "
    <section class=\"content-header menu1\">
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home</a>
            </li>
            <li class=\"active\">Bienvenida</li>
            <li>
                <a href=\"evento/listarEvento\">Listado de Eventos</a>
            </li>
            <li class=\"active\">
                <!-- <a href=\"evento/agregarEvento\" class=\"btn btn-primary\">Agregar Evento</a> -->
                <button type=\"button\" name=\"button\" class=\"btn btn-primary\" onclick= location.href='evento/agregarEvento'>Agregar Evento</button>
            </li>
        </ol>
    </section>

    <section class=\"content \">
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
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["data"] ?? null))) {
                // line 52
                echo "                                    <tr>
                                        <td>";
                // line 53
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 54
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "hora_evento", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 55
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "descripcion_evento", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 56
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "observacion_evento", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 57
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_ingreso", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 58
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_evento", array()), "html", null, true);
                echo "</td>
                                        ";
                // line 59
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_cierre", array()) != null)) {
                    // line 60
                    echo "                                        <td>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_cierre", array()), "html", null, true);
                    echo "</td>
                                        ";
                } else {
                    // line 62
                    echo "                                        <td>No Finalizado</td>
                                        ";
                }
                // line 64
                echo "                                        <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "name", array()), "html", null, true);
                echo "</td>
                                            ";
                // line 65
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_evento", array()) == "1")) {
                    // line 66
                    echo "                                                <td>Finalizada</td>
                                        ";
                } else {
                    // line 68
                    echo "                                                <td>Pendiente</td>
                                        ";
                }
                // line 70
                echo "                                        <td>

                                            ";
                // line 72
                if (((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_evento", array()) != "1") && (twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id_usuario", array()) == ($context["user"] ?? null)))) {
                    // line 73
                    echo "                                            <a data-toggle='tooltip' data-placement='top' id=\"btnmodificar\" name=\"btnmodificar\" title='Modificar' class='btn btn-success btn-sm' href=\"evento/editar_evento/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                    echo "\">
                                                <i class='glyphicon glyphicon-edit'></i>
                                            </a>
                                            ";
                }
                // line 77
                echo "                                            <a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Ver Observacion' class='btn btn-primary btn-sm' onclick=\"visualizar(";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                echo ")\">
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </a>
                                            ";
                // line 80
                if (((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_evento", array()) != "1") && (twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id_usuario", array()) == ($context["user"] ?? null)))) {
                    // line 81
                    echo "                                            <a data-toggle='tooltip' data-placement='top' id=\"btnEliminar\" name=\"btnEliminar\" title='Eliminar' class='btn btn-danger btn-sm' href=\"evento/eliminar_evento/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                    echo "\">
                                                <i class='glyphicon glyphicon-erase'></i>
                                            </a>
                                            ";
                }
                // line 85
                echo "
                                        </td>
                                    </tr>
                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    // line 97
    public function block_appScript($context, array $blocks = array())
    {
        // line 98
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
        return "evento/llamarEvento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 98,  199 => 97,  188 => 89,  178 => 85,  170 => 81,  168 => 80,  161 => 77,  153 => 73,  151 => 72,  147 => 70,  143 => 68,  139 => 66,  137 => 65,  132 => 64,  128 => 62,  122 => 60,  120 => 59,  116 => 58,  112 => 57,  108 => 56,  104 => 55,  100 => 54,  96 => 53,  93 => 52,  88 => 51,  47 => 12,  44 => 11,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appStylos %}
    <link rel=\"stylesheet\" href=\"views\\app\\css\\misEstilos.css\">
    <link rel=\"stylesheet\" href=\"views/app/template/datatables/dataTables.bootstrap.css\">
    <style media=\"screen\">
        .at {
            display: none;
        }
    </style>
{% endblock %}
{% block appBody %}

    <section class=\"content-header menu1\">
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home</a>
            </li>
            <li class=\"active\">Bienvenida</li>
            <li>
                <a href=\"evento/listarEvento\">Listado de Eventos</a>
            </li>
            <li class=\"active\">
                <!-- <a href=\"evento/agregarEvento\" class=\"btn btn-primary\">Agregar Evento</a> -->
                <button type=\"button\" name=\"button\" class=\"btn btn-primary\" onclick= location.href='evento/agregarEvento'>Agregar Evento</button>
            </li>
        </ol>
    </section>

    <section class=\"content \">
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
", "evento/llamarEvento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\evento\\llamarEvento.twig");
    }
}
