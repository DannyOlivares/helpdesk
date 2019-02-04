<?php

/* rrhh/asistencia/asistencia.twig */
class __TwigTemplate_944b5e967f213ab67bbfe0687a859834fc1ee07f9bd246a4a36b6dd65807d6e2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "rrhh/asistencia/asistencia.twig", 1);
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
        echo "  <link rel=\"stylesheet\" href=\"views/app/template/datatables/dataTables.bootstrap.css\">
  <style>
      .rojo{color: red;}
      i {-webkit-transition: all 0.5s;
      -o-transition: all 0.5s;
      transition: all 0.5s;}
  </style>
";
    }

    // line 11
    public function block_appBody($context, array $blocks = array())
    {
        // line 12
        echo "    <section class=\"content-header\">
        <h1>
            RRHH
            <small>Asistencia Mensual</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-home\"></i> Home</a></li>
            <li class=\"active\">Asistencia Mensual</li>
        </ol>
    </section>

    <section class=\"content\">
        <div class=\"row\">
            ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fechas_db"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["fechas_db"] ?? null))) {
                // line 26
                echo "                <div class=\"col-lg-3\">
                    <div style=\"background-color:#00c0ef;color:#fff\" class=\"small-box\">
                        <div class=\"inner\">
                            <h3>";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "mesano_print", array()), "html", null, true);
                echo " </h3>
                            <p></p>
                        </div>
                        <div class=\"icon\">
                            <i class=\"fa fa-envelope\"></i>
                        </div>
                        <a class=\"small-box-footer\"  title=\"Revisar Asistencia del mes\" data-toggle=\"tooltip\" onclick=\"verAsistenciaMes('";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "mesano", array()), "html", null, true);
                echo "')\">
                        ";
                // line 36
                if ((twig_date_format_filter($this->env, "now", "m") == twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "mes", array()))) {
                    // line 37
                    echo "                            <i class=\"fa fa-eye rojo\" id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "mesano", array()), "html", null, true);
                    echo "\" ></i>
                        ";
                } else {
                    // line 39
                    echo "                            <i class=\"fa fa-eye\" id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "mesano", array()), "html", null, true);
                    echo "\"></i>
                        ";
                }
                // line 41
                echo "                        </a>
                    </div>
                </div><!-- ./col -->
            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "        </div>
        <div class=\"row\">
        <div class=\"col-md-12\">
            <div class=\"box\">
                <div class=\"box-body\" id=\"camdat\" name=\"camdat\">
                    <table id=\"dataTables4\" class=\"table table-bordered\" >

                        <thead>
                            <th>Rut</th>
                            <th width='200'>Nombre</th>
                            <th>dias_cargados</th>
                            <th>dias_libres</th>
                            <th>Operación</th>
                            <th>dias_trabajados</th>
                            <th>ausentes o libres</th>
                        </thead>
                        <tbody id=\"asistencia_mensual\">
                            ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["getAllAsistenciaMensual"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["ct"]) {
            if ((false != ($context["getAllAsistenciaMensual"] ?? null))) {
                // line 63
                echo "                                <tr>
                                    <td>";
                // line 64
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "rut", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "dv", array()), "html", null, true);
                echo "</td>
                                    <td>";
                // line 65
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "name", array()), "html", null, true);
                echo "</td>
                                    <td>";
                // line 66
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "dias_laborables", array()), "html", null, true);
                echo "</td>
                                    <td>";
                // line 67
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "dias_libres", array()), "html", null, true);
                echo "</td>
                                    <td>
                                        <a class=\"btn btn-success\" title=\"Subir Libro Asistencia\" data-toggle=\"tooltip\" onclick=\"subirLibroasistencia('";
                // line 69
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "rut", array()), "html", null, true);
                echo "')\">
                                            <i class=\"fa fa-arrow-up\"></i>
                                        </a>
                                        <a class=\"btn btn-success\" title=\"Editar Asistencia\" data-toggle=\"modal\" onclick=\"editarAsistenciaMes('";
                // line 72
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "rut", array()), "html", null, true);
                echo "','";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "name", array()), "html", null, true);
                echo "','";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "mesano", array()), "html", null, true);
                echo "')\">
                                            <i class=\"fa fa-edit\"></i>
                                        </a>
                                    </td>
                                    <td>";
                // line 76
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "dias_trabajados", array()), "html", null, true);
                echo "</td>
                                    <td>";
                // line 77
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "dias_ausentes", array()), "html", null, true);
                echo "</td>
                                </tr>
                            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ct'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div id=\"edit_asistencia\" class=\"modal fade\" role=\"dialog\">
      <div class=\"modal-dialog\" style=\"width:800px;\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
            <h4 class=\"modal-title\">Modificar Asistencia</h4> <input type=\"text\" class=\"form-control\" id=\"nombre_personal\" name=\"nombre_personal\" value=\"\" readonly>
          </div>
          <div class=\"modal-body\">
            <form id=\"edit_asistencia_form\" class=\"form-signin\" method=\"POST\">
                <input type=\"hidden\" name=\"rut\" id=\"rut\" class=\"form-control\" value=\"\">
                <table id=\"asistencia_mes_ejecutivo\" class=\"table table-bordered\">
                    <thead>
                        <th width='100'>Fecha</th>
                        <th>Llegada</th>
                        <th>Salida</th>
                        <th>Turno</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Operacion</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </form>
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
          </div>
        </div>
      </div>
    </div>



";
    }

    // line 123
    public function block_appScript($context, array $blocks = array())
    {
        // line 124
        echo "    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/js/rrhh/turnos.js\"></script>
    <script>
        \$(\"#dataTables4\").dataTable({
             \"language\": {
                 \"search\": \"Buscar:\",
                 \"zeroRecords\": \"No hay datos para mostrar\",
                 \"info\":\"Mostrando _END_ usuarios, de un total de _TOTAL_ \",
                 \"loadingRecords\": \"Cargando...\",
                 \"processing\":\"Procesando...\",
                 \"infoEmpty\":\"No hay entradas para mostrar\",
                 \"lengthMenu\": \"Mostrar _MENU_ Filas\",
                 \"paginate\":{
                     \"first\":\"Primera\",
                     \"last\":\"Ultima\",
                     \"next\":\"Siguiente\",
                     \"previous\":\"Anterior\"
                 }
            },
             \"scrollX\": true,
             \"lengthMenu\": [[10, 35, 50, -1], [10, 35, 50, \"Todos\"]],
             \"iDisplayLength\": -1,
             \"bSort\": false,

         });
         \$(\"#asistencia_mes_ejecutivo\").dataTable({
              \"language\": {
                  \"search\": \"Buscar:\",
                  \"zeroRecords\": \"No hay datos para mostrar\",
                  \"info\":\"Mostrando _END_ usuarios, de un total de _TOTAL_ \",
                  \"loadingRecords\": \"Cargando...\",
                  \"processing\":\"Procesando...\",
                  \"infoEmpty\":\"No hay entradas para mostrar\",
                  \"lengthMenu\": \"Mostrar _MENU_ Filas\",
                  \"paginate\":{
                      \"first\":\"Primera\",
                      \"last\":\"Ultima\",
                      \"next\":\"Siguiente\",
                      \"previous\":\"Anterior\"
                  }
             },
              \"lengthMenu\": [[10, 35, 50, -1], [10, 35, 50, \"Todos\"]],
              \"iDisplayLength\": -1,
              \"bSort\": false
          });
    </script>
";
    }

    public function getTemplateName()
    {
        return "rrhh/asistencia/asistencia.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  235 => 124,  232 => 123,  186 => 80,  176 => 77,  172 => 76,  161 => 72,  155 => 69,  150 => 67,  146 => 66,  142 => 65,  136 => 64,  133 => 63,  128 => 62,  109 => 45,  99 => 41,  93 => 39,  87 => 37,  85 => 36,  81 => 35,  72 => 29,  67 => 26,  62 => 25,  47 => 12,  44 => 11,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "rrhh/asistencia/asistencia.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\rrhh\\asistencia\\asistencia.twig");
    }
}
