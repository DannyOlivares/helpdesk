<?php

/* rrhh/turnos/revisar_turnos.twig */
class __TwigTemplate_488a72115daff80712b3b0ad8cd90aaa6ad3251bffd8e5b620ab39b2682a0962 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "rrhh/turnos/revisar_turnos.twig", 1);
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
";
    }

    // line 6
    public function block_appBody($context, array $blocks = array())
    {
        // line 7
        echo "<section class=\"content-header\">
    <h1>
        RRHH
        <small>Turnos Plataforma</small>
    </h1>
    <ol class=\"breadcrumb\">
    <li><a href=\"#\"><i class=\"fa fa-home\"></i> Home</a></li>
    <li class=\"active\">Turnos Plataforma</li>
    </ol>
</section>
<section class=\"content\">
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"nav-tabs-custom\">
                <ul class=\"nav nav-tabs pull-rigth\">
                    <li class=\"active\"><a href=\"#tab_1-1\" data-toggle=\"tab\">TURNO DÍA</a></li>
                    <li><a href=\"#tab_2-2\" data-toggle=\"tab\" onclick=\"getTurnoSemanaCompleta();\">TURNO SEMANAL</a></li>
                    <li><a href=\"#tab_3-3\" data-toggle=\"tab\">EJECUTIVOS ACTIVOS</a></li>
                </ul>
                <div class=\"tab-content\">
                    <div class=\"tab-pane active\" id=\"tab_1-1\">
                        <div class=\"box box-primary\">
                            <div class=\"box-body\">
                                <form name=\"formbuscaturno\" id=\"formbuscaturno\"  method=\"post\">
                                    <div class=\"input-daterange\">
                                        <label>Fecha: </label>
                                        <label>&nbsp;</label>
                                        <input type=\"date\" name=\"fechaturno\" id=\"fechaturno\" value='";
        // line 34
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "'>
                                        <label>&nbsp;</label>
                                        <button type=\"button\" name=\"btnbuscar\" id=\"btnbuscar\" onclick=\"revisar_turno_por_fecha()\" class=\"btn btn-primary\">Aplicar Filtrar</button>
                                        <button type=\"button\" onclick=\"location.reload();\" class=\"btn btn-primary\">Quitar Filtro</button>
                                        <a class=\"btn btn-success btn-social\" id=\"btn_exporta_excel_turno_plataforma\" title=\"Exportar a Excel\" data-toggle=\"tooltip\">
                                            <i class=\"fa fa-arrow-down\"></i> Exportar Excel
                                        </a>
                                        <a class=\"btn btn-warning btn-social pull-right \" href=\"rrhh/ausencias\" title=\"Registrar Ausencia\" data-toggle=\"tooltip\">
                                            <i class=\"fa fa-minus\"></i>Registrar Ausencia
                                        </a>
                                    </div>
                                    <hr>
                                </form>

                                <table id=\"dataTables3\" class=\"table table-bordered\" >
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th Width=\"200\">Nombre</th>
                                            <th Width=\"200\">Servicio</th>

                                            <th>H.Ingreso</th>
                                            <th>H.Salida</th>


                                            <th>H.Colacion</th>
                                            <th>Break 1</th>
                                            <th>Break 2</th>
                                            <th>Asistencia</th>
                                            <th>Llegada</th>
                                            <th>Salida</th>

                                        </tr>
                                    </thead>
                                    <tbody id=\"turnos\">
                                      ";
        // line 69
        $context["No"] = 1;
        // line 70
        echo "                                      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cargar_turnos"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if ((false != ($context["cargar_turnos"] ?? null))) {
                // line 71
                echo "                                        <tr>
                                            <td>";
                // line 72
                echo twig_escape_filter($this->env, ($context["No"] ?? null), "html", null, true);
                echo "</td>
                                            <td>";
                // line 73
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "name", array())), "html", null, true);
                echo "</td>
                                            <td>";
                // line 74
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "servicio", array()), "html", null, true);
                echo "</td>

                                            <td>";
                // line 76
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "hora_ingreso", array()), "html", null, true);
                echo "</td>
                                            <td>";
                // line 77
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "hora_salida", array()), "html", null, true);
                echo "</td>



                                            <td>";
                // line 81
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "horario_colacion", array()), "html", null, true);
                echo "</td>
                                            <td>";
                // line 82
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "break_1", array()), "html", null, true);
                echo "</td>
                                            <td>";
                // line 83
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "break_2", array()), "html", null, true);
                echo "</td>
                                            <td>
                                                ";
                // line 85
                $context["falta"] = 0;
                // line 86
                echo "                                                ";
                if ((twig_slice($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()), 0, 5) == "Falta")) {
                    // line 87
                    echo "                                                    <div class='text-red'>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()), "html", null, true);
                    echo "</div>
                                                    ";
                    // line 88
                    $context["falta"] = 1;
                    // line 89
                    echo "                                                ";
                } elseif ((twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()) == "C/TURNO")) {
                    // line 90
                    echo "                                                    <div class='text-green'>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()), "html", null, true);
                    echo "</div>
                                                ";
                } elseif (((twig_get_attribute($this->env, $this->getSourceContext(),                 // line 91
$context["t"], "asistencia", array()) == "LIBRE") || (twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()) == "S/TURNO"))) {
                    // line 92
                    echo "                                                    ";
                    $context["falta"] = 1;
                    // line 93
                    echo "                                                    <div class='text-primary'>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()), "html", null, true);
                    echo "</div>
                                                ";
                } else {
                    // line 95
                    echo "                                                    ";
                    $context["falta"] = 1;
                    // line 96
                    echo "                                                    <div class='text-orange'>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()), "html", null, true);
                    echo "</div>
                                                ";
                }
                // line 98
                echo "                                            </td>
                                            <td>
                                                ";
                // line 100
                if ((($context["falta"] ?? null) == 0)) {
                    // line 101
                    echo "                                                    <input type=\"time\" name=\"llegada-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "inicio", array()), "html", null, true);
                    echo "\" id=\"llegada-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" onchange=\"updateAsistenciaEjecutivo('";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "')\">
                                                ";
                } else {
                    // line 103
                    echo "                                                    <input type=\"time\" name=\"llegada-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "inicio", array()), "html", null, true);
                    echo "\" id=\"llegada-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" disabled>
                                                ";
                }
                // line 105
                echo "                                            </td>
                                            <td>
                                                ";
                // line 107
                if ((($context["falta"] ?? null) == 0)) {
                    // line 108
                    echo "                                                    ";
                    if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "fin", array()) == "00:00:00")) {
                        // line 109
                        echo "                                                        ";
                        $context["value"] = twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "hora_salida", array());
                        // line 110
                        echo "                                                    ";
                    } else {
                        // line 111
                        echo "                                                        ";
                        $context["value"] = twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "fin", array());
                        // line 112
                        echo "                                                    ";
                    }
                    // line 113
                    echo "                                                    <input type=\"time\" name=\"salida-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
                    echo "\" id=\"salida-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" onchange=\"updateAsistenciaEjecutivo('";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "')\">

                                                ";
                } else {
                    // line 116
                    echo "                                                    <input type=\"time\" name=\"salida-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "fin", array()), "html", null, true);
                    echo "\" id=\"salida-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" disabled>
                                                ";
                }
                // line 118
                echo "
                                            </td>
                                        </tr>

                                        ";
                // line 122
                $context["No"] = (($context["No"] ?? null) + 1);
                // line 123
                echo "                                      ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        echo "                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class=\"tab-pane\" id=\"tab_2-2\">
                        <div class=\"box box-primary\">
                            <div class=\"box-body\">
                                <div class=\"col-md-12\">
                                    <form name=\"formbuscaturno_s\" id=\"formbuscaturno_s\"  method=\"post\">
                                        <div class=\"input-daterange\">
                                            <label>Fecha: </label>
                                            <label>&nbsp;</label>
                                            <input type=\"date\" name=\"fecha_turno_s\" id=\"fecha_turno_s\" value='";
        // line 137
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "'>
                                            <label>&nbsp;</label>
                                            <button type=\"button\" name=\"btnbuscar_s\" id=\"btnbuscar_s\" onclick=\"getTurnoSemanaCompleta();\" class=\"btn btn-primary\">Aplicar Filtrar</button>
                                            <button type=\"button\" onclick=\"location.reload();\" class=\"btn btn-primary\">Quitar Filtro</button>
                                            <a class=\"btn btn-success btn-social\" id=\"btn_exporta_excel_turno_plataforma\" title=\"Exportar a Excel\" data-toggle=\"tooltip\">
                                                <i class=\"fa fa-arrow-down\"></i> Exportar Excel
                                            </a>
                                        </div>
                                        <div id=\"semana\">

                                        </div>
                                        <hr>
                                    </form>

                                    <table id=\"dataTables1\" class=\"table table-bordered\">
                                        <thead>
                                            <tr>
                                                <th Width=\"70%\">Nombre</th>
                                                <th Width=\"100%\">Tarea</th>
                                                <th>Lunes</th>
                                                <th>Martes</th>
                                                <th>Miércoles</th>
                                                <th>Jueves</th>
                                                <th>Viernes</th>
                                                <th>Sábado</th>
                                                <th>Domingo</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"tab-pane\" id=\"tab_3-3\">
                        <div class=\"box box-primary\">
                            <div class=\"box-body\">
                                <div class=\"col-md-12\">
                                    <table id=\"dataTables2\" class=\"table table-bordered\">
                                        <thead>
                                            <tr>
                                                <th Width=\"200\">Supervisor</th>
                                                <th Width=\"200\">Ejecutivo</th>
                                                <th Width=\"200\">Cargo</th>
                                                <th>F.Nacimiento</th>
                                                <th>Email</th>
                                                <th>Telefeno</th>
                                                <th>TANGO</th>
                                                <th>RED</th>
                                                <th>NNOC</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            ";
        // line 190
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["getEjecutivosFull"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if ((false != ($context["getEjecutivosFull"] ?? null))) {
                // line 191
                echo "                                              <tr>
                                                  <td>";
                // line 192
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "supervisor", array())), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 193
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "name", array())), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 194
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "cargo", array()), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 195
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "fecha_nacimiento", array()), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 196
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "email", array()), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 197
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "fono", array()), "html", null, true);
                echo "</td>

                                                  <td>";
                // line 199
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "user_tango", array()), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 200
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "user_red", array()), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 201
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "user_nnoc", array()), "html", null, true);
                echo "</td>
                                              </tr>

                                              ";
                // line 204
                $context["No"] = (($context["No"] ?? null) + 1);
                // line 205
                echo "                                            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 206
        echo "                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    ";
    }

    // line 218
    public function block_appScript($context, array $blocks = array())
    {
        // line 219
        echo "        <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
        <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>

        <script src=\"views/app/js/rrhh/turnos.js\"></script>
        <script>
            \$(\"#dataTables3\").dataTable({
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
                     \"previous\":\"Anterior\",
                     }
                  },
                 \"autoWidth\": true,
                 \"lengthMenu\": [[10, 25, 50, -1], [10, 25, 50, \"Todos\"]],
                 \"iDisplayLength\": -1,
                 \"scrollX\": true
             });
             \$(\"#dataTables2\").dataTable({
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
                      \"previous\":\"Anterior\",
                      }
                   },
                  \"autoWidth\": true,
                  \"lengthMenu\": [[10, 25, 50, -1], [10, 25, 50, \"Todos\"]],
                  \"iDisplayLength\": -1
              });
             \$(\"#dataTables1\").dataTable({
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
                      \"previous\":\"Anterior\",
                      }
                  },
                  \"autoWidth\": false,
                  \"lengthMenu\": [[10, 25, 50, -1], [10, 25, 50, \"Todos\"]],
                  \"iDisplayLength\": 10
              });
        </script>
    ";
    }

    public function getTemplateName()
    {
        return "rrhh/turnos/revisar_turnos.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  428 => 219,  425 => 218,  410 => 206,  403 => 205,  401 => 204,  395 => 201,  391 => 200,  387 => 199,  382 => 197,  378 => 196,  374 => 195,  370 => 194,  366 => 193,  362 => 192,  359 => 191,  354 => 190,  298 => 137,  283 => 124,  276 => 123,  274 => 122,  268 => 118,  258 => 116,  245 => 113,  242 => 112,  239 => 111,  236 => 110,  233 => 109,  230 => 108,  228 => 107,  224 => 105,  214 => 103,  202 => 101,  200 => 100,  196 => 98,  190 => 96,  187 => 95,  181 => 93,  178 => 92,  176 => 91,  171 => 90,  168 => 89,  166 => 88,  161 => 87,  158 => 86,  156 => 85,  151 => 83,  147 => 82,  143 => 81,  136 => 77,  132 => 76,  127 => 74,  123 => 73,  119 => 72,  116 => 71,  110 => 70,  108 => 69,  70 => 34,  41 => 7,  38 => 6,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "rrhh/turnos/revisar_turnos.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\rrhh\\turnos\\revisar_turnos.twig");
    }
}
