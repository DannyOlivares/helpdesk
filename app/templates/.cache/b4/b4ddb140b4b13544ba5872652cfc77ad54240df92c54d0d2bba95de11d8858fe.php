<?php

/* areacontingencia/listarAreasContingencia.twig */
class __TwigTemplate_5bc04199bd73571b880e3a04debb66008e6312b8370d6a00a0389a4b5e816933 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "areacontingencia/listarAreasContingencia.twig", 1);
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
            Listado De Areas Contingencia
            <small>Áreas Registradas en la plataforma</small>

            <a class=\"btn btn-primary btn-social pull-right\" href=\"casilleros/agregar\" title=\"Agregar\" data-toggle=\"tooltip\">
                <i class=\"fa fa-plus\"></i>
                Agregar Nuevo Casillero
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
                                    <th>id Area</th>
                                    <th>Nombre Área</th>
                                    <th>Nombre del Responsable</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["data"] ?? null))) {
                // line 37
                echo "                                    <tr>
                                        <td>";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id_contingencia", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "nombre", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 40
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "name", array()), "html", null, true);
                echo "</td>
                                        <td >
                                            <a data-toggle='tooltip' data-placement='top' id=\"btnmodificar\" name=\"btnmodificar\" title='Modificar' class='btn btn-success btn-sm' href=\"casilleros/editar/";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id_responsable", array()), "html", null, true);
                echo "\">
                                                <i class='glyphicon glyphicon-edit'></i>
                                            </a>
                                            <a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Ver Observacion' class='btn btn-primary btn-sm' onclick=\"visualizar(";
                // line 45
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id_responsable", array()), "html", null, true);
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
        // line 51
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    // line 59
    public function block_appScript($context, array $blocks = array())
    {
        // line 60
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
        return "areacontingencia/listarAreasContingencia.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 60,  124 => 59,  113 => 51,  100 => 45,  94 => 42,  89 => 40,  85 => 39,  81 => 38,  78 => 37,  73 => 36,  46 => 11,  43 => 10,  33 => 3,  30 => 2,  11 => 1,);
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
            Listado De Areas Contingencia
            <small>Áreas Registradas en la plataforma</small>

            <a class=\"btn btn-primary btn-social pull-right\" href=\"casilleros/agregar\" title=\"Agregar\" data-toggle=\"tooltip\">
                <i class=\"fa fa-plus\"></i>
                Agregar Nuevo Casillero
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
                                    <th>id Area</th>
                                    <th>Nombre Área</th>
                                    <th>Nombre del Responsable</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for d in data if false != data %}
                                    <tr>
                                        <td>{{d.id_contingencia}}</td>
                                        <td>{{d.nombre}}</td>
                                        <td>{{d.name}}</td>
                                        <td >
                                            <a data-toggle='tooltip' data-placement='top' id=\"btnmodificar\" name=\"btnmodificar\" title='Modificar' class='btn btn-success btn-sm' href=\"casilleros/editar/{{d.id_responsable}}\">
                                                <i class='glyphicon glyphicon-edit'></i>
                                            </a>
                                            <a data-toggle='tooltip' data-placement='top' id=\"visualizar\" name=\"visualizar\" title='Ver Observacion' class='btn btn-primary btn-sm' onclick=\"visualizar({{d.id_responsable}});\">
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
", "areacontingencia/listarAreasContingencia.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\areacontingencia\\listarAreasContingencia.twig");
    }
}
