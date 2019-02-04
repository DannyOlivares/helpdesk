<?php

/* b2b/altas/seguimiento_altas.twig */
class __TwigTemplate_578666a9a7836cf361eb328f219402ca42fdd8440a3ab341001ed8cacbd3b76b extends Twig_Template
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
            <div class=\"col-lg-4\">
                <div class=\"box\">
                    <div class=\"box-header\">
                        <h3 class=\"box-title\">ATRASADO</h3>
                    </div>
                    <div class=\"box-body\">
                        <table class=\"table table-bordered\">
                            <thead>
                                <th>EMPRESA</th>
                                <th>ZONA</th>
                                <th>Q</th>
                            </thead>
                            <tbody>
                                ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_ATRASADO"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if ((false != ($context["db_ATRASADO"] ?? null))) {
                // line 36
                echo "                                    <tr>
                                        <td>";
                // line 37
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "empresa_final", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "zona", array()), "html", null, true);
                echo "</td>
                                        <td><a href=\"#\" data-toggle=\"modal\" data-target=\"#verTablaAltas\" onclick=\"carga_ordenes_tabla_modal('ATRASADO','";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "zona", array()), "html", null, true);
                echo "','";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "empresa_final", array()), "html", null, true);
                echo "');\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "q", array()), "html", null, true);
                echo "</a></td>
                                    </tr>
                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "                            </tbody>
                        </table>
                    </div>
                    <div class=\"box-footer clearfix\">

                    </div>
                </div>
            </div>
            <div class=\"col-lg-4\">
                <div class=\"box\">
                    <div class=\"box-header\">
                        <h3 class=\"box-title\">COMPROMISO ";
        // line 53
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d-m-Y"), "html", null, true);
        echo "&nbsp;&nbsp;</h3>
                        <select class=\"\" id=\"select_bloque_hoy\" name=\"select_bloque_hoy\" onchange=\"selectBloqueHoySeguimiento()\">
                            ";
        // line 55
        $context["total"] = 0;
        // line 56
        echo "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_HORARIO_COMPROMISO"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if ((false != ($context["db_HORARIO_COMPROMISO"] ?? null))) {
                // line 57
                echo "                                <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "HORARIO_COMPROMISO", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "q", array()), "html", null, true);
                echo " => ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "HORARIO_COMPROMISO", array()), "html", null, true);
                echo " </option>
                                ";
                // line 58
                $context["total"] = (($context["total"] ?? null) + twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "q", array()));
                // line 59
                echo "                            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "                            <option value=\"TODOS\" selected>";
        echo twig_escape_filter($this->env, ($context["total"] ?? null), "html", null, true);
        echo " => TODOS</option>
                        </select>
                    </div>
                    <div class=\"box-body\" id=\"div_hoy\">
                        <table class=\"table table-bordered\">
                            <thead>
                                <th>EMPRESA</th>
                                <th>ZONA</th>
                                <th>Q</th>
                            </thead>
                            <tbody>
                                ";
        // line 71
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_HOY"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if ((false != ($context["db_HOY"] ?? null))) {
                // line 72
                echo "                                    <tr>
                                        <td>";
                // line 73
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "empresa_final", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 74
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "zona", array()), "html", null, true);
                echo "</td>
                                        <td><a href=\"#\" data-toggle=\"modal\" data-target=\"#verTablaAltas\" onclick=\"carga_ordenes_tabla_modal('HOY','";
                // line 75
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "zona", array()), "html", null, true);
                echo "','";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "empresa_final", array()), "html", null, true);
                echo "');\">";
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
            <div class=\"col-lg-4\">
                <div class=\"box\">
                    <div class=\"box-header\">
                        <h3 class=\"box-title\">FUTURO</h3>
                    </div>
                    <div class=\"box-body\">
                        <table class=\"table table-bordered\">
                            <thead>
                                <th>EMPRESA</th>
                                <th>ZONA</th>
                                <th>Q</th>
                            </thead>
                            <tbody>
                                ";
        // line 99
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_FUTURO"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if ((false != ($context["db_FUTURO"] ?? null))) {
                // line 100
                echo "                                    <tr>
                                        <td>";
                // line 101
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "empresa_final", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 102
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "zona", array()), "html", null, true);
                echo "</td>
                                        <td><a href=\"#\" data-toggle=\"modal\" data-target=\"#verTablaAltas\" onclick=\"carga_ordenes_tabla_modal('FUTURO','";
                // line 103
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "zona", array()), "html", null, true);
                echo "','";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "empresa_final", array()), "html", null, true);
                echo "');\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["t"], "q", array()), "html", null, true);
                echo "</a></td>
                                    </tr>
                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 106
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
          <div class=\"modal-body\">
            <table id=\"table_ordenes_pendientes_altas\" class=\"table table-bordered\">
                <thead>
                    <th>FLUJO</th>
                    <th>FECHA_INGRESO</th>
                    <th>ULTIMA_AGENDA</th>
                    <th>BLOQUE</th>
                    <th>IDEN_TRANSAC</th>
                    <th>RUT_PERSONA</th>
                    <th>COMUNA</th>
                    <th>Q-REAGE</th>
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

    // line 152
    public function block_appScript($context, array $blocks = array())
    {
        // line 153
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
            \"iDisplayLength\": 5,
            \"scrollX\": true
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
        return array (  296 => 153,  293 => 152,  244 => 106,  230 => 103,  226 => 102,  222 => 101,  219 => 100,  214 => 99,  191 => 78,  177 => 75,  173 => 74,  169 => 73,  166 => 72,  161 => 71,  146 => 60,  139 => 59,  137 => 58,  128 => 57,  122 => 56,  120 => 55,  115 => 53,  102 => 42,  88 => 39,  84 => 38,  80 => 37,  77 => 36,  72 => 35,  41 => 6,  38 => 5,  33 => 3,  30 => 2,  11 => 1,);
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
            <div class=\"col-lg-4\">
                <div class=\"box\">
                    <div class=\"box-header\">
                        <h3 class=\"box-title\">ATRASADO</h3>
                    </div>
                    <div class=\"box-body\">
                        <table class=\"table table-bordered\">
                            <thead>
                                <th>EMPRESA</th>
                                <th>ZONA</th>
                                <th>Q</th>
                            </thead>
                            <tbody>
                                {% for t in db_ATRASADO if false != db_ATRASADO %}
                                    <tr>
                                        <td>{{ t.empresa_final }}</td>
                                        <td>{{ t.zona }}</td>
                                        <td><a href=\"#\" data-toggle=\"modal\" data-target=\"#verTablaAltas\" onclick=\"carga_ordenes_tabla_modal('ATRASADO','{{ t.zona }}','{{ t.empresa_final }}');\">{{ t.q }}</a></td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>
                    <div class=\"box-footer clearfix\">

                    </div>
                </div>
            </div>
            <div class=\"col-lg-4\">
                <div class=\"box\">
                    <div class=\"box-header\">
                        <h3 class=\"box-title\">COMPROMISO {{ \"now\"|date('d-m-Y') }}&nbsp;&nbsp;</h3>
                        <select class=\"\" id=\"select_bloque_hoy\" name=\"select_bloque_hoy\" onchange=\"selectBloqueHoySeguimiento()\">
                            {% set total = 0 %}
                            {% for t in db_HORARIO_COMPROMISO if false != db_HORARIO_COMPROMISO %}
                                <option value=\"{{ t.HORARIO_COMPROMISO }}\">{{ t.q }} => {{ t.HORARIO_COMPROMISO }} </option>
                                {% set total = total + t.q %}
                            {% endfor %}
                            <option value=\"TODOS\" selected>{{ total }} => TODOS</option>
                        </select>
                    </div>
                    <div class=\"box-body\" id=\"div_hoy\">
                        <table class=\"table table-bordered\">
                            <thead>
                                <th>EMPRESA</th>
                                <th>ZONA</th>
                                <th>Q</th>
                            </thead>
                            <tbody>
                                {% for t in db_HOY if false != db_HOY %}
                                    <tr>
                                        <td>{{ t.empresa_final }}</td>
                                        <td>{{ t.zona }}</td>
                                        <td><a href=\"#\" data-toggle=\"modal\" data-target=\"#verTablaAltas\" onclick=\"carga_ordenes_tabla_modal('HOY','{{ t.zona }}','{{ t.empresa_final }}');\">{{ t.q }}</a></td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>
                    <div class=\"box-footer clearfix\">

                    </div>
                </div>
            </div>
            <div class=\"col-lg-4\">
                <div class=\"box\">
                    <div class=\"box-header\">
                        <h3 class=\"box-title\">FUTURO</h3>
                    </div>
                    <div class=\"box-body\">
                        <table class=\"table table-bordered\">
                            <thead>
                                <th>EMPRESA</th>
                                <th>ZONA</th>
                                <th>Q</th>
                            </thead>
                            <tbody>
                                {% for t in db_FUTURO if false != db_FUTURO %}
                                    <tr>
                                        <td>{{ t.empresa_final }}</td>
                                        <td>{{ t.zona }}</td>
                                        <td><a href=\"#\" data-toggle=\"modal\" data-target=\"#verTablaAltas\" onclick=\"carga_ordenes_tabla_modal('FUTURO','{{ t.zona }}','{{ t.empresa_final }}');\">{{ t.q }}</a></td>
                                    </tr>
                                {% endfor %}
                            </tbody>
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
          <div class=\"modal-body\">
            <table id=\"table_ordenes_pendientes_altas\" class=\"table table-bordered\">
                <thead>
                    <th>FLUJO</th>
                    <th>FECHA_INGRESO</th>
                    <th>ULTIMA_AGENDA</th>
                    <th>BLOQUE</th>
                    <th>IDEN_TRANSAC</th>
                    <th>RUT_PERSONA</th>
                    <th>COMUNA</th>
                    <th>Q-REAGE</th>
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

{% endblock %}
{% block appScript %}
    <script src=\"views/app/js/b2b/altas.js\"></script>

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
            \"iDisplayLength\": 5,
            \"scrollX\": true
        });
    </script>
{% endblock %}
", "b2b/altas/seguimiento_altas.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\b2b\\altas\\seguimiento_altas.twig");
    }
}
