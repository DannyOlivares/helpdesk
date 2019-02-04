<?php

/* rrhh/turnos/revisar_turnos.twig */
class __TwigTemplate_4980c1ffac7915fb7b7b005d90d4db0a5f171ebe6f4aff702aef155fbd6d1e14 extends Twig_Template
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
                                            <th>Operación</th>

                                        </tr>
                                    </thead>
                                    <tbody id=\"turnos\">
                                      ";
        // line 67
        $context["No"] = 1;
        // line 68
        echo "                                      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cargar_turnos"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if ((false != ($context["cargar_turnos"] ?? null))) {
                // line 69
                echo "                                        <tr>
                                            <td>";
                // line 70
                echo twig_escape_filter($this->env, ($context["No"] ?? null), "html", null, true);
                echo "</td>
                                            <td>";
                // line 71
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "name", array())), "html", null, true);
                echo "</td>
                                            <td>";
                // line 72
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "servicio", array()), "html", null, true);
                echo "</td>

                                            <td>";
                // line 74
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "hora_ingreso", array()), "html", null, true);
                echo "</td>
                                            <td>";
                // line 75
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "hora_salida", array()), "html", null, true);
                echo "</td>



                                            <td>";
                // line 79
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "horario_colacion", array()), "html", null, true);
                echo "</td>
                                            <td>";
                // line 80
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "break_1", array()), "html", null, true);
                echo "</td>
                                            <td>";
                // line 81
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "break_2", array()), "html", null, true);
                echo "</td>
                                            <td>
                                                ";
                // line 83
                $context["falta"] = 0;
                // line 84
                echo "                                                ";
                if ((twig_slice($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()), 0, 5) == "Falta")) {
                    // line 85
                    echo "                                                    <div class='text-red'>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()), "html", null, true);
                    echo "</div>
                                                    ";
                    // line 86
                    $context["falta"] = 1;
                    // line 87
                    echo "                                                ";
                } elseif ((twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()) == "C/TURNO")) {
                    // line 88
                    echo "                                                    <div class='text-green'>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()), "html", null, true);
                    echo "</div>
                                                ";
                } elseif (((twig_get_attribute($this->env, $this->getSourceContext(),                 // line 89
$context["t"], "asistencia", array()) == "LIBRE") || (twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()) == "S/TURNO"))) {
                    // line 90
                    echo "                                                    ";
                    $context["falta"] = 1;
                    // line 91
                    echo "                                                    <div class='text-primary'>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()), "html", null, true);
                    echo "</div>
                                                ";
                } else {
                    // line 93
                    echo "                                                    ";
                    $context["falta"] = 1;
                    // line 94
                    echo "                                                    <div class='text-orange'>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "asistencia", array()), "html", null, true);
                    echo "</div>
                                                ";
                }
                // line 96
                echo "                                            </td>
                                            <td>
                                                ";
                // line 98
                if ((($context["falta"] ?? null) == 0)) {
                    // line 99
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
                    // line 101
                    echo "                                                    <input type=\"time\" name=\"llegada-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "inicio", array()), "html", null, true);
                    echo "\" id=\"llegada-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" disabled>
                                                ";
                }
                // line 103
                echo "                                            </td>
                                            <td>
                                                ";
                // line 105
                if ((($context["falta"] ?? null) == 0)) {
                    // line 106
                    echo "                                                    <input type=\"time\" name=\"salida-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "fin", array()), "html", null, true);
                    echo "\" id=\"salida-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" onchange=\"updateAsistenciaEjecutivo('";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "')\">
                                                ";
                } else {
                    // line 108
                    echo "                                                    <input type=\"time\" name=\"salida-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "fin", array()), "html", null, true);
                    echo "\" id=\"salida-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "id", array()), "html", null, true);
                    echo "\" disabled>
                                                ";
                }
                // line 110
                echo "
                                            </td>
                                            <td>
                                                <a class=\"btn btn-warning pull-right \" href=\"rrhh/ausencias\" title=\"Registrar Ausencia\" data-toggle=\"tooltip\">
                                                    <i class=\"fa fa-minus\"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        ";
                // line 119
                $context["No"] = (($context["No"] ?? null) + 1);
                // line 120
                echo "                                      ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
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
        // line 134
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
        // line 187
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["getEjecutivosFull"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if ((false != ($context["getEjecutivosFull"] ?? null))) {
                // line 188
                echo "                                              <tr>
                                                  <td>";
                // line 189
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "supervisor", array())), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 190
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "name", array())), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 191
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "cargo", array()), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 192
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "fecha_nacimiento", array()), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 193
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "email", array()), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 194
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "fono", array()), "html", null, true);
                echo "</td>

                                                  <td>";
                // line 196
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "user_tango", array()), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 197
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "user_red", array()), "html", null, true);
                echo "</td>
                                                  <td>";
                // line 198
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "user_nnoc", array()), "html", null, true);
                echo "</td>
                                              </tr>

                                              ";
                // line 201
                $context["No"] = (($context["No"] ?? null) + 1);
                // line 202
                echo "                                            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 203
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

    // line 215
    public function block_appScript($context, array $blocks = array())
    {
        // line 216
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
        return array (  415 => 216,  412 => 215,  397 => 203,  390 => 202,  388 => 201,  382 => 198,  378 => 197,  374 => 196,  369 => 194,  365 => 193,  361 => 192,  357 => 191,  353 => 190,  349 => 189,  346 => 188,  341 => 187,  285 => 134,  270 => 121,  263 => 120,  261 => 119,  250 => 110,  240 => 108,  228 => 106,  226 => 105,  222 => 103,  212 => 101,  200 => 99,  198 => 98,  194 => 96,  188 => 94,  185 => 93,  179 => 91,  176 => 90,  174 => 89,  169 => 88,  166 => 87,  164 => 86,  159 => 85,  156 => 84,  154 => 83,  149 => 81,  145 => 80,  141 => 79,  134 => 75,  130 => 74,  125 => 72,  121 => 71,  117 => 70,  114 => 69,  108 => 68,  106 => 67,  70 => 34,  41 => 7,  38 => 6,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appStylos %}
  <link rel=\"stylesheet\" href=\"views/app/template/datatables/dataTables.bootstrap.css\">
{% endblock %}

{% block appBody %}
<section class=\"content-header\">
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
                                        <input type=\"date\" name=\"fechaturno\" id=\"fechaturno\" value='{{ \"now\"|date(\"Y-m-d\") }}'>
                                        <label>&nbsp;</label>
                                        <button type=\"button\" name=\"btnbuscar\" id=\"btnbuscar\" onclick=\"revisar_turno_por_fecha()\" class=\"btn btn-primary\">Aplicar Filtrar</button>
                                        <button type=\"button\" onclick=\"location.reload();\" class=\"btn btn-primary\">Quitar Filtro</button>
                                        <a class=\"btn btn-success btn-social\" id=\"btn_exporta_excel_turno_plataforma\" title=\"Exportar a Excel\" data-toggle=\"tooltip\">
                                            <i class=\"fa fa-arrow-down\"></i> Exportar Excel
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
                                            <th>Operación</th>

                                        </tr>
                                    </thead>
                                    <tbody id=\"turnos\">
                                      {% set No = 1 %}
                                      {% for t in cargar_turnos if false != cargar_turnos %}
                                        <tr>
                                            <td>{{ No }}</td>
                                            <td>{{ t.name|raw|title }}</td>
                                            <td>{{ t.servicio }}</td>

                                            <td>{{ t.hora_ingreso  }}</td>
                                            <td>{{ t.hora_salida }}</td>



                                            <td>{{ t.horario_colacion }}</td>
                                            <td>{{ t.break_1  }}</td>
                                            <td>{{ t.break_2 }}</td>
                                            <td>
                                                {% set falta = 0 %}
                                                {% if t.asistencia|slice(0,5) == \"Falta\" %}
                                                    <div class='text-red'>{{ t.asistencia }}</div>
                                                    {% set falta = 1 %}
                                                {% elseif t.asistencia == \"C/TURNO\" %}
                                                    <div class='text-green'>{{ t.asistencia }}</div>
                                                {% elseif t.asistencia == \"LIBRE\" or t.asistencia == \"S/TURNO\" %}
                                                    {% set falta = 1 %}
                                                    <div class='text-primary'>{{ t.asistencia }}</div>
                                                {% else  %}
                                                    {% set falta = 1 %}
                                                    <div class='text-orange'>{{ t.asistencia }}</div>
                                                {% endif %}
                                            </td>
                                            <td>
                                                {% if falta == 0 %}
                                                    <input type=\"time\" name=\"llegada-{{ t.id }}\" value=\"{{ t.inicio }}\" id=\"llegada-{{ t.id }}\" onchange=\"updateAsistenciaEjecutivo('{{ t.id }}')\">
                                                {% else %}
                                                    <input type=\"time\" name=\"llegada-{{ t.id }}\" value=\"{{ t.inicio }}\" id=\"llegada-{{ t.id }}\" disabled>
                                                {% endif %}
                                            </td>
                                            <td>
                                                {% if falta == 0 %}
                                                    <input type=\"time\" name=\"salida-{{ t.id }}\" value=\"{{ t.fin }}\" id=\"salida-{{ t.id }}\" onchange=\"updateAsistenciaEjecutivo('{{ t.id }}')\">
                                                {% else %}
                                                    <input type=\"time\" name=\"salida-{{ t.id }}\" value=\"{{ t.fin }}\" id=\"salida-{{ t.id }}\" disabled>
                                                {% endif %}

                                            </td>
                                            <td>
                                                <a class=\"btn btn-warning pull-right \" href=\"rrhh/ausencias\" title=\"Registrar Ausencia\" data-toggle=\"tooltip\">
                                                    <i class=\"fa fa-minus\"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        {% set No =  No + 1 %}
                                      {% endfor %}
                                    </tbody>
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
                                            <input type=\"date\" name=\"fecha_turno_s\" id=\"fecha_turno_s\" value='{{ \"now\"|date(\"Y-m-d\") }}'>
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
                                            {% for t in getEjecutivosFull if false != getEjecutivosFull %}
                                              <tr>
                                                  <td>{{ t.supervisor|raw|title }}</td>
                                                  <td>{{ t.name|raw|title }}</td>
                                                  <td>{{ t.cargo }}</td>
                                                  <td>{{ t.fecha_nacimiento }}</td>
                                                  <td>{{ t.email }}</td>
                                                  <td>{{ t.fono }}</td>

                                                  <td>{{ t.user_tango  }}</td>
                                                  <td>{{ t.user_red }}</td>
                                                  <td>{{ t.user_nnoc }}</td>
                                              </tr>

                                              {% set No =  No + 1 %}
                                            {% endfor %}
                                        </tbody>
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
    {% endblock %}
    {% block appScript %}
        <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
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
    {% endblock %}
", "rrhh/turnos/revisar_turnos.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\rrhh\\turnos\\revisar_turnos.twig");
    }
}
