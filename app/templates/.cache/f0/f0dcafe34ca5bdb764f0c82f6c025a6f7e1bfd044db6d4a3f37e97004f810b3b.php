<?php

/* b2b/altas/seguimiento_altas.twig */
class __TwigTemplate_21cfaa217622af92c4031bc9b63d9de5426fb2c685bc89dca3152e90f2da792c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "b2b/altas/seguimiento_altas.twig", 1);
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
        echo "    <section class=\"content-header\">
        <h1>
            SEGUIMIENTO
            <small>ALTAS</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-home\"></i> Home</a></li>
            <li><a href=\"b2b/b2b\">Principal B2B</a></li>
            <li><a href=\"b2b/altas\">Dashboard ALTAS</a></li>
            <li class=\"active\">Seguimiento de Altas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-lg-6\">
                <div class=\"box\">
                    <div class=\"box-header\">
                        <h3 class=\"box-title\">ATRASADO</h3>
                        <a href=\"#\" class=\"btn btn-primary pull-right\" data-toggle=\"modal\" data-target=\"#verTablaAltas\" onclick=\"carga_ordenes_tabla_modal('ATRASADO','-1',document.getElementById('select_bloque_hoy').value);\">Ver Todas</a>
                    </div>
                    <div class=\"box-body\">
                        <table class=\"table table-bordered\">
                            <thead>
                                <thead>
                                    <th>Motivo Pendiente</th>
                                    <th>Q</th>
                                </thead>
                            </thead>
                            <tbody>
                                ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_ATRASADO"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if ((false != ($context["db_ATRASADO"] ?? null))) {
                // line 38
                echo "                                    <tr>
                                        <td>";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "DESC_PENDIENTE", array()), "html", null, true);
                echo "</td>
                                        <td><a href=\"#\" data-toggle=\"modal\" data-target=\"#verTablaAltas\" onclick=\"carga_ordenes_tabla_modal('ATRASADO','";
                // line 40
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "CLASIFICACION_PENDIENTE", array()), "html", null, true);
                echo "','TODOS');\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "q", array()), "html", null, true);
                echo "</a></td>
                                    </tr>
                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                            </tbody>
                        </table>
                    </div>
                    <div class=\"box-footer clearfix\">

                    </div>
                </div>
            </div>
            <div class=\"col-lg-6\">
                <div class=\"box\">
                    <div class=\"box-header\">
                        <h3 class=\"box-title\">COMPROMISO ";
        // line 54
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d-m-Y"), "html", null, true);
        echo "&nbsp;&nbsp;</h3>
                        <select class=\"\" id=\"select_bloque_hoy\" name=\"select_bloque_hoy\" onchange=\"selectBloqueHoySeguimiento()\">
                            ";
        // line 56
        $context["total"] = 0;
        // line 57
        echo "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_HORARIO_COMPROMISO"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if ((false != ($context["db_HORARIO_COMPROMISO"] ?? null))) {
                // line 58
                echo "                                <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "HORARIO_COMPROMISO", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "q", array()), "html", null, true);
                echo " => ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "HORARIO_COMPROMISO", array()), "html", null, true);
                echo " </option>
                                ";
                // line 59
                $context["total"] = (($context["total"] ?? null) + twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "q", array()));
                // line 60
                echo "                            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                            <option value=\"TODOS\" selected>";
        echo twig_escape_filter($this->env, ($context["total"] ?? null), "html", null, true);
        echo " => TODOS</option>
                        </select>
                        <a href=\"#\" class=\"btn btn-primary pull-right\" data-toggle=\"modal\" data-target=\"#verTablaAltas\" onclick=\"carga_ordenes_tabla_modal('HOY','-1',document.getElementById('select_bloque_hoy').value);\">Ver Todas</a>
                    </div>
                    <div class=\"box-body\" id=\"div_hoy\">
                        <table class=\"table table-bordered\">
                            <thead>
                                <th>Motivo Pendiente</th>
                                <th>Q</th>
                            </thead>
                            <tbody>
                                ";
        // line 72
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_HOY"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if ((false != ($context["db_HOY"] ?? null))) {
                // line 73
                echo "                                    <tr>
                                        <td>";
                // line 74
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "DESC_PENDIENTE", array()), "html", null, true);
                echo "</td>
                                        <td><a href=\"#\" data-toggle=\"modal\" data-target=\"#verTablaAltas\" onclick=\"carga_ordenes_tabla_modal('HOY','";
                // line 75
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "CLASIFICACION_PENDIENTE", array()), "html", null, true);
                echo "','TODOS');\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "q", array()), "html", null, true);
                echo "</a></td>
                                    </tr>
                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "                            </tbody>
                        </table>
                    </div>
                    <div class=\"box-footer clearfix\">

                    </div>
                </div>
            </div>

        </div>
    </section>
    <div id=\"verTablaAltas\" class=\"modal fade col-lg-12 col-md-12 col-xs-12\" role=\"dialog\">
      <div class=\"modal-dialog\" style=\"width:1200px;\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
            <h4 class=\"modal-title\"><div id='titulo_modal'></div> </h4>
          </div>
          <div class=\"modal-body table-responsive\">
            <table id=\"table_ordenes_pendientes_altas\" class=\"table table-bordered table-responsive\">
                <thead>
                    <th>FLUJO</th>
                    <th>FECHA_INGRESO</th>
                    <th>ULTIMA_AGENDA</th>
                    <th>BLOQUE</th>
                    <th>IDEN_TRANSAC</th>
                    <th>RUT_PERSONA</th>
                    <th>COMUNA</th>
                    <th>ZONA</th>
                    <th>EMPRESA</th>
                    <th>Q-REAGE</th>
                    <th>Modificado</th>
                    <th>ESTADO</th>
                    <th>OBSERVACION</th>
                    <th>OPERACION</th>
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
    <!-- /.content -->

";
    }

    // line 128
    public function block_appScript($context, array $blocks = array())
    {
        // line 129
        echo "    <script src=\"views/app/js/b2b/altas.js\"></script>

    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script>
        \$(\"#table_ordenes_pendientes_altas\").dataTable({
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
            \"iDisplayLength\": 5
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "b2b/altas/seguimiento_altas.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  237 => 129,  234 => 128,  181 => 78,  169 => 75,  165 => 74,  162 => 73,  157 => 72,  142 => 61,  135 => 60,  133 => 59,  124 => 58,  118 => 57,  116 => 56,  111 => 54,  98 => 43,  86 => 40,  82 => 39,  79 => 38,  74 => 37,  41 => 6,  38 => 5,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "b2b/altas/seguimiento_altas.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\b2b\\altas\\seguimiento_altas.twig");
    }
}
