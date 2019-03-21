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
                        <table id=\"dataordenes\" name=\"dataordenes\" class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th>Fecha Ingreso</th>
                                    <th>Fecha Compromiso</th>
                                    <th>Rut</th>
                                    <th>Id Actividad</th>
                                    <th>Comuna </th>
                                    <th>Remitente</th>
                                    <th>Bloque </th>
                                    <th>Tipo Actividad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                 
                                ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "data", array(), "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "data", array(), "array"))) {
                // line 52
                echo "                                    <tr>
                                        <td>";
                // line 53
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], 0, array(), "array"), "html", null, true);
                echo "</td>
                                        <td>";
                // line 54
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], 1, array(), "array"), "html", null, true);
                echo "</td>
                                        <td>";
                // line 55
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], 2, array(), "array"), "html", null, true);
                echo "</td>
                                        <td>";
                // line 56
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], 3, array(), "array"), "html", null, true);
                echo "</td>
                                        <td>";
                // line 57
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], 4, array(), "array"), "html", null, true);
                echo "</td>
                                        <td>";
                // line 58
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], 5, array(), "array"), "html", null, true);
                echo "</td>
                                        <td>";
                // line 59
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], 6, array(), "array"), "html", null, true);
                echo "</td>
                                        <td>";
                // line 60
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], 7, array(), "array"), "html", null, true);
                echo "</td>
                                        <td><a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Agrega El detalle de tu gestión' class='btn btn-success btn-sm' onclick=\"agregarGestion('";
                // line 61
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], 3, array(), "array"), "html", null, true);
                echo "');\">Agregar Gestión</a></td>
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
        echo "    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/js/escalamiento/escalamiento.js\"></script>
    <script>
        /*\$(\"\").dataTable({
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
        });*/
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
        return array (  152 => 73,  149 => 72,  138 => 64,  128 => 61,  124 => 60,  120 => 59,  116 => 58,  112 => 57,  108 => 56,  104 => 55,  100 => 54,  96 => 53,  93 => 52,  88 => 51,  46 => 11,  43 => 10,  33 => 3,  30 => 2,  11 => 1,);
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
                        <table id=\"dataordenes\" name=\"dataordenes\" class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th>Fecha Ingreso</th>
                                    <th>Fecha Compromiso</th>
                                    <th>Rut</th>
                                    <th>Id Actividad</th>
                                    <th>Comuna </th>
                                    <th>Remitente</th>
                                    <th>Bloque </th>
                                    <th>Tipo Actividad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                 
                                {%  for  d in data['data'] if false != data['data'] %}
                                    <tr>
                                        <td>{{ d[0] }}</td>
                                        <td>{{ d[1] }}</td>
                                        <td>{{ d[2] }}</td>
                                        <td>{{ d[3] }}</td>
                                        <td>{{ d[4] }}</td>
                                        <td>{{ d[5] }}</td>
                                        <td>{{ d[6] }}</td>
                                        <td>{{ d[7] }}</td>
                                        <td><a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Agrega El detalle de tu gestión' class='btn btn-success btn-sm' onclick=\"agregarGestion('{{ d[3] }}');\">Agregar Gestión</a></td>
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
    <script src=\"views/app/js/escalamiento/escalamiento.js\"></script>
    <script>
        /*\$(\"\").dataTable({
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
        });*/
    </script>
{% endblock %}
", "escalamiento/listaActividades.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\escalamiento\\listaActividades.twig");
    }
}
