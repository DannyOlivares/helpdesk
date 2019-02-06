<?php

/* escalamiento/escalamiento.twig */
class __TwigTemplate_266d19d624eabe4f7231e125394eed61b8e1a4757b574f4fe6bbd23719fe2a68 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "escalamiento/escalamiento.twig", 1);
        $this->blocks = array(
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
    public function block_appBody($context, array $blocks = array())
    {
        // line 3
        echo "    <section class=\"content-header\">
        <h1>
            Escalamiento
            <small>Resumen Actividades</small>
        </h1>
        <ol class=\"breadcrumb\">
        <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
        <li class=\"active\">Dashboard</li>
        </ol>
    </section>

    <section class=\"content\">
        <div class=\"row\">
                <div class=\"col col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header with-border\">
                            <h3 class=\"box-title\">Mirada Global</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Gestionadas</h3>
                                    </div>
                                    <div class=\"box-body\">
                                        <table class=\"table\">
                                            <thead>
                                                <th>Estado</th>
                                                <th class=\"text-center\">Cantidad</th>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>
                                                            ñfgkñd
                                                        </td>
                                                        <td class=\"text-right\">kjdshf</td>
                                                        ";
        // line 39
        $context["total_pendiente"] = (($context["total_pendiente"] ?? null) + twig_get_attribute($this->env, $this->getSourceContext(), ($context["row"] ?? null), "q", array(), "array"));
        // line 40
        echo "                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Gestionadas: ";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data1"] ?? null), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>
                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Pendientes</h3>
                                    </div>
                                        <div class=\"box-body\">
                                            <table class=\"table\">
                                                <thead>
                                                    <th>Estado</th>
                                                    <th class=\"text-center\">Cantidad</th>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td>
                                                                ñfgkñd
                                                            </td>
                                                            <td class=\"text-right\">kjdshf</td>
                                                            ";
        // line 66
        $context["total_pendiente"] = (($context["total_pendiente"] ?? null) + twig_get_attribute($this->env, $this->getSourceContext(), ($context["row"] ?? null), "q", array(), "array"));
        // line 67
        echo "                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    <div class=\"box-footer\">
                                        Total Pendientes: ";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data2"] ?? null), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>

                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Seguimiento</h3>
                                    </div>
                                    <div class=\"box-body\">
                                        <table class=\"table\">
                                            <thead>
                                                <th>Estado</th>
                                                <th class=\"text-center\">Cantidad</th>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>
                                                            ñfgkñd
                                                        </td>
                                                        <td class=\"text-right\">kjdshf</td>

                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Seguimiento: ";
        // line 100
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data3"] ?? null), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>

                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Finalizadas Hoy</h3>
                                    </div>
                                    <div class=\"box-body\">
                                        <table class=\"table\">
                                            <thead>
                                                <th>Estado</th>
                                                <th class=\"text-center\">Cantidad</th>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>
                                                            ñfgkñd
                                                        </td>
                                                        <td class=\"text-right\">kjdshf</td>

                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Finalizadas Hoy: ";
        // line 128
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data3"] ?? null), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class=\"nav nav-tabs\">
                            <li class=\"active\"><a data-toggle=\"tab\" href=\"#home\">Actividades Gestionadas</a></li>
                            <li><a data-toggle=\"tab\" href=\"#menu1\">Actividades Pendientes</a></li>
                            <li><a data-toggle=\"tab\" href=\"#menu2\">Actividades seguimiento</a></li>
                            <li><a data-toggle=\"tab\" href=\"#menu3\">Actividades Finalizadas Hoy</a></li>
                        </ul>

                            <div class=\"tab-content\">
                                <div id=\"home\" class=\"tab-pane fade in active\">
                                    <div class=\"\">
                                        <h3>Detalle Gestionadas</h3>
                                    </div>

                                    <div class=\"box-body\">
                                        <table id=\"home\" name=\"men\" class=\"table table-bordered men\">
                                            <thead>
                                                <tr>
                                                    <th>Comuna</th>
                                                    <th>Orden</th>
                                                    <th>Rut</th>
                                                    <th>Tipo De Actividad</th>
                                                    <th>Usuario Ingresa </th>
                                                    <th>Usuario Finaliza</th>
                                                    <th>Estado Real </th>
                                                    <th>Bloque</th>
                                                    <th>Gestión</th>
                                                    <th>Observación</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ";
        // line 163
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dat"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["dat"] ?? null))) {
                // line 164
                echo "                                                    <tr>
                                                        <td>";
                // line 165
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fechaCompromiso", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 166
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "bloque", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 167
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "idActividadManual", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 168
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "rutCliente", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 169
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estadoOrden", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 170
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estadoEscalamiento", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 171
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "tipoActividad", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 172
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "canal", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 173
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "descripcionActividad", array()), "html", null, true);
                echo "</td>
                                                        <td></td>
                                                    </tr>
                                            </tbody>
                                            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 178
        echo "                                        </table>
                                    </div>
                                </div>
                                <div id=\"menu1\" class=\"tab-pane fade\">
                                    <h3>Detalle Pendientes</h3>
                                    <div class=\"box-body\">
                                        <table id=\"menu1\" name=\"menu1\" class=\"table table-bordered men\">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Compromiso</th>
                                                    <th>Bloque Asignado</th>
                                                    <th>Id Actividad</th>
                                                    <th>Rut Cliente</th>
                                                    <th>Estado Orden</th>
                                                    <th>Estado Escalamiento</th>
                                                    <th>Tipo Actividad</th>
                                                    <th>Canal</th>
                                                    <th>Descripcion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ";
        // line 199
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data0"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["data0"] ?? null))) {
                // line 200
                echo "                                                    <tr>
                                                        <td>";
                // line 201
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fechaCompromiso", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 202
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "bloque", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 203
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "idActividadManual", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 204
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "rutCliente", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 205
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estadoOrden", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 206
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estadoEscalamiento", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 207
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "tipoActividad", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 208
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "canal", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 209
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "descripcionActividad", array()), "html", null, true);
                echo "</td>
                                                        <td></td>
                                                    </tr>
                                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 213
        echo "                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id=\"menu2\" class=\"tab-pane fade\">
                                    <h3>Detalle Seguimiento</h3>
                                    <div class=\"box-body\">
                                        <table id=\"menu2\" name=\"menu2\" class=\"table table-bordered min\">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Compromiso</th>
                                                    <th>Bloque Asignado</th>
                                                    <th>Id Actividad</th>
                                                    <th>Rut Cliente</th>
                                                    <th>Estado Orden</th>
                                                    <th>Estado Escalamiento</th>
                                                    <th>Tipo Actividad</th>
                                                    <th>Canal</th>
                                                    <th>Descripcion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ";
        // line 235
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["data"] ?? null))) {
                // line 236
                echo "                                                    <tr>
                                                        <td>";
                // line 237
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fechaCompromiso", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 238
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "bloque", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 239
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "idActividadManual", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 240
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "rutCliente", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 241
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estadoOrden", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 242
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estadoEscalamiento", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 243
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "tipoActividad", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 244
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "canal", array()), "html", null, true);
                echo "</td>
                                                        <td>";
                // line 245
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "descripcionActividad", array()), "html", null, true);
                echo "</td>
                                                        <td></td>
                                                    </tr>
                                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 249
        echo "                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id=\"menu3\" class=\"tab-pane fade\">
                                    <h3>Detalle Finalizadas Hoy</h3>
                                    <div class=\"box-body\">
                                        <table id=\"menu3\" name=\"dataordenes\" class=\"table table-bordered mon\">
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

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>

            </div>

    </section>
    ";
        // line 284
        $this->displayBlock('appScript', $context, $blocks);
        // line 357
        echo "
    <!-- /.content -->

";
    }

    // line 284
    public function block_appScript($context, array $blocks = array())
    {
        // line 285
        echo "    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>

    <script>
        \$(\".men\").dataTable({
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

    <script>
        \$(\".min\").dataTable({
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

    <script>
        \$(\".mon\").dataTable({
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
        return "escalamiento/escalamiento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  462 => 285,  459 => 284,  452 => 357,  450 => 284,  413 => 249,  402 => 245,  398 => 244,  394 => 243,  390 => 242,  386 => 241,  382 => 240,  378 => 239,  374 => 238,  370 => 237,  367 => 236,  362 => 235,  338 => 213,  327 => 209,  323 => 208,  319 => 207,  315 => 206,  311 => 205,  307 => 204,  303 => 203,  299 => 202,  295 => 201,  292 => 200,  287 => 199,  264 => 178,  252 => 173,  248 => 172,  244 => 171,  240 => 170,  236 => 169,  232 => 168,  228 => 167,  224 => 166,  220 => 165,  217 => 164,  212 => 163,  174 => 128,  143 => 100,  112 => 72,  105 => 67,  103 => 66,  79 => 45,  72 => 40,  70 => 39,  32 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "escalamiento/escalamiento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\escalamiento\\escalamiento.twig");
    }
}
