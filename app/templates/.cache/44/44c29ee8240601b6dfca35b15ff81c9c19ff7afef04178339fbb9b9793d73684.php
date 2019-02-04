<?php

/* b2b/altas/carga_pendientes.twig */
class __TwigTemplate_452f86dcf6cb4132adc10a45d461e128880c27381959c5a9e9bc8655bdad6dff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "b2b/altas/carga_pendientes.twig", 1);
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

    // line 5
    public function block_appBody($context, array $blocks = array())
    {
        // line 6
        echo "
    <section class=\"content-header\">
        <h1>
            B2B
            <small>Carga Base</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-home\"></i> Home</a></li>
            <li><a href=\"b2b/b2b\">Principal B2B</a></li>
            <li><a href=\"b2b/altas\">Dashboard ALTAS</a></li>
            <li class=\"active\">Cargar Base</li>
        </ol>
    </section>

    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body col-sm-8\">
                        <div class=\"form-group\">
                            <form id=\"formblindaje\" name=\"formblindaje\" method=\"post\">
                                <input class='filestyle' data-buttontext=\"Logo\" id=\"blindfile\" onchange=\"document.getElementById('archivo').value=document.getElementById('blindfile').value\" tabindex=\"-1\" style=\"position:absolute; clip: rect(0px 0px 0px 0px);\" type=\"file\" name=\"files[]\" accept=\"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet\">
                                <div class=\"bootstrap-filestyle input-group\">
                                    <input type=\"text\" class=\"form-control\" id=\"archivo\" placeholder=\"\" disabled=\"\">
                                    <span class=\"group-span-filestyle input-group-btn\" tabindex=\"0\">
                                        <label for=\"blindfile\" class=\"btn btn-default \">
                                            <span class=\"icon-span-filestyle glyphicon glyphicon-share\"></span>
                                            <span class=\"buttonText\">Buscar Archivo</span>
                                        </label>
                                    </span>
                                </div>
                                <div class=\"row box-body\">
                                    <div id=\"div_cargando\" class=\"col-sm-6\">
                                        <a class=\"btn btn-success btn-social\" title=\"Importar desde Excel\" data-toggle=\"tooltip\" onclick=\"subirarchivoexcel()\">
                                            <i class=\"fa fa-arrow-up\"></i>
                                            Cargar Base
                                        </a>
                                    </div>
                                    <div id=\"div_traspasa_ofical\" class=\"col-sm-6 \">
                                        ";
        // line 45
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_tmpbase"] ?? null), "cantidad", array()) > 0)) {
            // line 46
            echo "                                            <a href=\"#\" class=\"btn btn-success btn-social\" title=\"Ver Datos Cargados en Temporal\" data-toggle=\"modal\" data-target=\"#verDatosCargaTMP\" onclick='carga_modal_datos_tmp_ordenes_altas();'>
                                                <i class=\"fa fa-eye\"></i>
                                                Ver Datos
                                            </a>
                                            <a class=\"btn btn-success btn-social\" title=\"Archivo Cargado Temporal\" data-toggle=\"tooltip\" onclick=\"traspasar_Ordenes('ALTAS')\">
                                                <i class=\"fa fa-angle-double-right\"></i>
                                                Distribuir
                                            </a>
                                        ";
        }
        // line 55
        echo "                                    </div>
                                </div>

                            </form>
                        </div>

                        <p><strong>Ultimos 10 archivos cargados</strong></p>
                        <table class=\"table table-bordered\">
                            <thead>
                                <th>No</th>
                                <th>Fecha y hora</th>
                                <th>Nombre de Archivo</th>
                                <th>Usuario</th>
                                <th>Cantidad</th>
                            </thead>
                            <tbody>
                                ";
        // line 71
        $context["No"] = 1;
        // line 72
        echo "                                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_archivos"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["db_archivos"] ?? null))) {
                // line 73
                echo "                                    <tr>
                                        <td>";
                // line 74
                echo twig_escape_filter($this->env, ($context["No"] ?? null), "html", null, true);
                echo "</td>
                                        <td>";
                // line 75
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_hora", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 76
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "nombre_archivo", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 77
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "name", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 78
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "q_registros", array()), "html", null, true);
                echo "</td>
                                    </tr>
                                    ";
                // line 80
                $context["No"] = (($context["No"] ?? null) + 1);
                // line 81
                echo "                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "                            </tbody>
                        </table>

                    </div>
                    <div class=\"box-body col-sm-2\">
                        <span>
                            <b>Formato de Archivo</b>
                            <p>Col A -> DIA_BASE</p>
                            <p>Col B -> FECHA_INGRESO</p>
                            <p>Col C -> ULTIMA_AGENDA</p>
                            <p>Col D -> HORARIO_COMPROMISO</p>
                            <p>Col E -> IDEN_TRANSAC</p>
                            <p>Col F -> RUT_PERSONA</p>
                            <p>Col G -> TRAMO_PENDIENTE</p>
                            <p>Col H -> AG</p>
                            <p>Col I -> ZONA</p>
                            <p>Col J -> COMUNA</p>
                            <p>Col K -> REAGENDAMIENTOS</p>
                            <p>Col L -> EMPRESA_FINAL</p>
                        </span>
                    </div>
                    <div class=\"box-body col-sm-2\">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id=\"verDatosCargaTMP\" class=\"modal fade\" role=\"dialog\">
      <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
            <h4 class=\"modal-title\">Datos Cargados desde Archivo</h4>
          </div>
          <div class=\"modal-body\">
            <table id=\"table_datos_tmp\" class=\"table table-bordered\">
                <thead>
                    <th>DIA_BASE</th>
                    <th>FECHA_INGRESO</th>
                    <th>ULTIMA_AGENDA</th>
                    <th>HORARIO_COMPROMISO</th>
                    <th>IDEN_TRANSAC</th>
                    <th>RUT_PERSONA</th>
                    <th>TRAMO_PENDIENTE</th>
                    <th>AG</th>
                    <th>ZONA</th>
                    <th>COMUNA</th>
                    <th>REAGENDAMIENTOS</th>
                    <th>EMPRESA_FINAL</th>
                </thead>
                <tbody>

                </tbody>
            </table>
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
";
    }

    // line 144
    public function block_appScript($context, array $blocks = array())
    {
        // line 145
        echo "    <script src=\"views/app/js/b2b/altas.js\"></script>

    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script>
        \$(\"#table_datos_tmp\").dataTable({
            \"language\": {
                \"search\": \"Buscar:\",
                \"zeroRecords\": \"No hay datos para mostrar\",
                \"info\":\"Mostrando _END_ Registros, de un total de _TOTAL_ \",
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
            \"lengthMenu\": [[ 5, 10, 25, 50, -1], [ 5, 10, 25, 50, \"Todos\"]],
            \"iDisplayLength\": 5,
            \"scrollX\": true
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "b2b/altas/carga_pendientes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 145,  219 => 144,  154 => 82,  147 => 81,  145 => 80,  140 => 78,  136 => 77,  132 => 76,  128 => 75,  124 => 74,  121 => 73,  115 => 72,  113 => 71,  95 => 55,  84 => 46,  82 => 45,  41 => 6,  38 => 5,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "b2b/altas/carga_pendientes.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\b2b\\altas\\carga_pendientes.twig");
    }
}
