<?php

/* evento/list_evento.twig */
class __TwigTemplate_a967dadd9a4131c77f4bf4cf6668ee09d16534f5460221ecd33c0314be296d74 extends Twig_Template
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
    <section class=\"content-header menu\" id=\"menu\" >
        <h1>
            Eventos
            <small>Detalle de Evento</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home</a>
            </li>
            <li ><a href=\"evento/bienvenida\" >Bienvenida</a></li>
            <li>
                <a href=\"evento/listar_evento\">Listado de Eventos</a>
            </li>
            <li class=\"active\">
                <button type=\"button\" name=\"button\" class=\"btn btn-primary\" onclick= location.href='evento/agregarEvento'>Agregar Evento</button>
            </li>
        </ol>
    </section>
    <br>
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
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["data"] ?? null))) {
                // line 54
                echo "                                    <tr>
                                        <td>";
                // line 55
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 56
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "hora_evento", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 57
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "descripcion_evento", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 58
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "observacion_evento", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 59
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_ingreso", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 60
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_evento", array()), "html", null, true);
                echo "</td>
                                        ";
                // line 61
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_cierre", array()) != null)) {
                    // line 62
                    echo "                                        <td>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_cierre", array()), "html", null, true);
                    echo "</td>
                                        ";
                } else {
                    // line 64
                    echo "                                        <td>No Finalizado</td>
                                        ";
                }
                // line 66
                echo "                                        <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "name", array()), "html", null, true);
                echo "</td>
                                            ";
                // line 67
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_evento", array()) == "1")) {
                    // line 68
                    echo "                                                <td>Finalizada</td>
                                        ";
                } else {
                    // line 70
                    echo "                                                <td>Pendiente</td>
                                        ";
                }
                // line 72
                echo "                                        <td>

                                            ";
                // line 74
                if (((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_evento", array()) != "1") && (twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id_usuario", array()) == ($context["user"] ?? null)))) {
                    // line 75
                    echo "                                            <a data-toggle='tooltip' data-placement='top' id=\"btnmodificar\" name=\"btnmodificar\" title='Modificar' class='btn btn-success btn-sm' href=\"evento/editar_evento/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                    echo "\">
                                                <i class='glyphicon glyphicon-edit'></i>
                                            </a>
                                            ";
                }
                // line 79
                echo "                                            <a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Ver Observacion' class='btn btn-primary btn-sm' onclick=\"visualizar(";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                echo ")\">

                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </a>
                                            ";
                // line 83
                if (((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_evento", array()) != "1") && (twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id_usuario", array()) == ($context["user"] ?? null)))) {
                    // line 84
                    echo "                                            <a data-toggle='tooltip' data-placement='top' id=\"btnEliminar\" name=\"btnEliminar\" title='Eliminar' class='btn btn-danger btn-sm' onclick=\"eliminar_evento(";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                    echo ");\">
                                                <i class='glyphicon glyphicon-erase'></i>
                                            </a>
                                            ";
                }
                // line 88
                echo "                                        </td>
                                    </tr>
                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    // line 99
    public function block_appScript($context, array $blocks = array())
    {
        // line 100
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
        return array (  204 => 100,  201 => 99,  190 => 91,  181 => 88,  173 => 84,  171 => 83,  163 => 79,  155 => 75,  153 => 74,  149 => 72,  145 => 70,  141 => 68,  139 => 67,  134 => 66,  130 => 64,  124 => 62,  122 => 61,  118 => 60,  114 => 59,  110 => 58,  106 => 57,  102 => 56,  98 => 55,  95 => 54,  90 => 53,  46 => 11,  43 => 10,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "evento/list_evento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\evento\\list_evento.twig");
    }
}
