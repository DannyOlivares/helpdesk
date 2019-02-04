<?php

/* reagendamiento/reagendamiento_usuario.twig */
class __TwigTemplate_66413c056e901c6f3e5d7e1f1cecf948ccf35a857c8b9d4ecf1677f3d9778048 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "reagendamiento/reagendamiento_usuario.twig", 1);
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
";
    }

    // line 5
    public function block_appBody($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"row\">
      <div class=\"col-md-12\">
          <section class=\"content-header\">
              <h4>
                <i class=\"fa fa-user\"></i> Reagendamiento
                <small>Usuarios</small>

                <div id=\"divestado\" name=\"divestado\" class=\"pull-right\">
                    ";
        // line 14
        if ((($context["db_UserStatus"] ?? null) != false)) {
            // line 15
            echo "                        <a class='btn btn-success btn-social' onclick=\"activar('reag_andes')\"  title='ONLINE' data-toggle='tooltip'>
                        <i class='fa fa-toggle-on'></i> ONLINE
                        </a>
                        <input type=\"hidden\" name=\"idestado\" id=\"idestado\" value=\"1\">
                    ";
        } else {
            // line 20
            echo "                        <a class=\"btn btn-danger btn-social\" onclick=\"activar('reag_andes')\" title=\"OFFLINE\" data-toggle=\"tooltip\">
                        <i class=\"fa fa-toggle-off\"></i> OFFLINE
                        </a>
                        <input type=\"hidden\" name=\"idestado\" id=\"idestado\" value=\"0\">
                    ";
        }
        // line 25
        echo "                </div>
              </h4>
          </section>
      </div>
    </div>

    ";
        // line 31
        if (((false == ($context["db_orden_reagendar"] ?? null)) && (($context["db_UserStatus"] ?? null) != false))) {
            // line 32
            echo "        <section class=\"content\">
            <div class=\"row\">
                <div class=\"col-md-12\" id=\"divcontenido\" name=\"divcontenido\">
                    <div class=\"box-body\">
                        <input type=\"hidden\" class=\"form-control\" id=\"txtnumorden\" name=\"txtnumorden\" value=\"\">
                        <br><br><br><br><br><br><br>
                        <div class=\"panel panel-warning\">
                            <div class=\"panel-heading\">
                                <h3 class=\"panel-title text-center\">  <i class=\"icon fa fa-history\"></i> Muchas gracias <strong>";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
            echo "</strong> pero en estos momentos no tenemos más actividades para reagendar, vuelva el <strong>";
            echo twig_escape_filter($this->env, ($context["fecha_volver"] ?? null), "html", null, true);
            echo "</strong>. Mientras tanto ayude a confirmar <i class=\"fa fa-smile-o\"></i> </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    ";
        } else {
            // line 48
            echo "        <section class=\"content\">
            <div class=\"row\">
                <div class=\"col-md-12\" id=\"divcontenido\" name=\"divcontenido\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h4 class=\"box-title\">Datos Orden</h4>
                        </div>
                        <div class=\"box-body\">
                            <div id=\"divordenes\" name=\"divordenes\">
                                <form id=\"formordenes\" name=\"formordenes\">
                                    <div class=\"col-md-2\">
                                        <label>RUT CLIENTE</label>
                                        <input type=\"text\" class=\"form-control col-md-3\" id=\"txtrutcliente\" name=\"txtrutcliente\" value=\"";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_orden_reagendar"] ?? null), "rut_cliente", array()), "html", null, true);
            echo "\">
                                    </div>
                                    <div class=\"col-md-2\">
                                        <label>ID ACTIVIDAD</label>
                                        <input type=\"text\" class=\"form-control\" id=\"txtnumorden\" name=\"txtnumorden\" value=\"";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_orden_reagendar"] ?? null), "id_orden", array()), "html", null, true);
            echo "\">
                                    </div>
                                    <div class=\"col-md-2\">
                                        <label>N° ORDEN</label>
                                        <input type=\"text\" class=\"form-control\" id=\"txtpedido\" name=\"txtpedido\" value=\"";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_orden_reagendar"] ?? null), "numero_orden", array()), "html", null, true);
            echo "\">
                                    </div>

                                    <div class=\"col-md-3\">
                                        <label>TIPO ACTIVIDAD</label>
                                        <input type=\"text\" class=\"form-control\" id=\"txtnombrecliente\" name=\"txtnombrecliente\" value=\"";
            // line 73
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_orden_reagendar"] ?? null), "actividad", array()), "html", null, true);
            echo "\">
                                    </div>
                                    <div class=\"col-md-3\">
                                        <label>COMUNA</label>
                                        ";
            // line 77
            if ((($context["db_UserStatus"] ?? null) != false)) {
                // line 78
                echo "                                            <input type=\"text\" class=\"form-control\" id=\"opcioncomuna\" name=\"opcioncomuna\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_orden_reagendar"] ?? null), "descripcion", array()), "html", null, true);
                echo "\">
                                        ";
            } else {
                // line 80
                echo "                                            <select id='opcioncomuna' name='opcioncomuna' class=\"form-control\">
                                                <option value=\"0\">--</option>
                                                ";
                // line 82
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["db_comunas"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                    if ((false != ($context["db_comunas"] ?? null))) {
                        // line 83
                        echo "                                                    <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["c"], "id_comuna", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["c"], "descripcion", array()), "html", null, true);
                        echo "</option>
                                                ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 85
                echo "                                            </select>
                                        ";
            }
            // line 87
            echo "                                        <br>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class=\"box-footer\">
                            <!-- <div id=\"divbotones\" name=\"divbotones\"> -->
                                ";
            // line 94
            if ((($context["db_UserStatus"] ?? null) != false)) {
                // line 95
                echo "                                    <div class='col-md-1'></div>
                                    <a data-toggle='tooltip' data-placement='top' title='Volver a llamar' class='btn btn-success btn-md col-md-4' onclick='volverallamar()'>
                                        <i class='glyphicon glyphicon-earphone'></i>
                                    </a>
                                    <div class='col-md-2'></div>
                                    <a data-toggle='tooltip' data-placement='top' title='Orden Reagendada' class='btn btn-primary btn-md col-md-4' onclick='reagendarorden()'>
                                        <i class='glyphicon glyphicon-ok-sign'></i>
                                    </a>
                                ";
            } else {
                // line 104
                echo "                                    <div class='col-md-1'></div>
                                    <a data-toggle='tooltip' data-placement='top' title='Guardar Actividad' onclick='guardarordenes()' class='btn btn-success btn-md col-md-4'><i class='glyphicon glyphicon-floppy-disk'></i></a>
                                    <div class=\"col-md-2\"></div><a data-toggle='tooltip' data-placement='top' title='Orden Reagendada' onclick='reagendarordenes()' class='btn btn-primary btn-md col-md-4' ><i class='glyphicon glyphicon-ok-sign'></i></a>
                                ";
            }
            // line 108
            echo "                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                <div class=\"col-md-6\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h4 class=\"box-title\">Historial Orden</h4>
                        </div>
                        <div class=\"box-body\" id=\"divhistorial\" name=\"divhistorial\">
                            <table id='tblhistorial'  name='tblhistorial' class=\"table table-bordered\">
                                <thead>
                                    <th>FECHA_LLAMADO</th>
                                    <th>ESTADO</th>
                                    <th>OBSERVACION</th>
                                    <th>EJECUTIVO</th>
                                </thead>
                                <tbody>
                                    ";
            // line 126
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["db_historial_actividad"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
                if ((false != ($context["db_historial_actividad"] ?? null))) {
                    // line 127
                    echo "                                        <tr>
                                            <td>";
                    // line 128
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["h"], "fecha", array()), "html", null, true);
                    echo "</td>
                                            <td>";
                    // line 129
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["h"], "estado", array()), "html", null, true);
                    echo "</td>
                                            <td>";
                    // line 130
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["h"], "observacion", array()), "html", null, true);
                    echo "</td>
                                            <td>";
                    // line 131
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["h"], "name", array()), "html", null, true);
                    echo "</td>
                                        </tr>
                                    ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['h'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 134
            echo "                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-6\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h4 class=\"box-title\">Observacion Usuario</h4>
                            <div class=\"box-tools pull-right\">
                                ";
            // line 144
            if ((($context["db_UserStatus"] ?? null) != false)) {
                // line 145
                echo "                                    <button type=\"button\" class=\"btn btn-box-tool\"  title='Agregar observacion' onclick='agregar_observacion()'><i class=\"fa fa-plus\"></i></button>

                                ";
            } else {
                // line 148
                echo "                                    <button type=\"button\" class=\"btn btn-box-tool\"   title='Agregar observacion'><i class=\"fa fa-plus\"></i></button>
                                ";
            }
            // line 150
            echo "
                            </div>

                        </div>
                        <div class=\"box-body\" id=\"divdatos\" name=\"divdatos\">
                            <table id='tblobservacion'  name='tblobservacion' class=\"table table-bordered\">
                                <thead>
                                    <th>FECHA_LLAMADO</th>
                                    <th>OBSERVACION</th>
                                    <th>EJECUTIVO</th>
                                </thead>
                                <tbody>
                                    ";
            // line 162
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["db_observacion_cliente"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
                if ((false != ($context["db_observacion_cliente"] ?? null))) {
                    // line 163
                    echo "                                        <tr>
                                            <td>";
                    // line 164
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["h"], "fecha_observacion", array()), "html", null, true);
                    echo "</td>
                                            <td>";
                    // line 165
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["h"], "observacion", array()), "html", null, true);
                    echo "</td>
                                            <td>";
                    // line 166
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["h"], "name", array()), "html", null, true);
                    echo "</td>
                                        </tr>
                                    ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['h'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 169
            echo "                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    ";
        }
        // line 177
        echo "    ";
        $this->loadTemplate("reagendamiento/modal_observacion", "reagendamiento/reagendamiento_usuario.twig", 177)->display($context);
    }

    // line 179
    public function block_appScript($context, array $blocks = array())
    {
        // line 180
        echo "    <script src=\"views/app/js/reagendamiento/reagendamiento.js\"></script>
    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script>
        \$(\"#tblobservacion\").dataTable({
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
            \"scrollX\": true,
            \"lengthMenu\": [[5, 10, 50], [5, 10, 50]],
            \"iDisplayLength\": 5,
            \"bSort\": false,
            \"info\": true,
            \"paging\": true,
            \"autoWidth\": true,
            \"searching\": true
        });
        \$(\"#tblhistorial\").dataTable({
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
            \"scrollX\": true,
            \"lengthMenu\": [[5, 10, 50], [5, 10, 50]],
            \"iDisplayLength\": 5,
            \"bSort\": false,
            \"info\": true,
            \"paging\": true,
            \"autoWidth\": true,
            \"searching\": true
        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "reagendamiento/reagendamiento_usuario.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  335 => 180,  332 => 179,  327 => 177,  317 => 169,  307 => 166,  303 => 165,  299 => 164,  296 => 163,  291 => 162,  277 => 150,  273 => 148,  268 => 145,  266 => 144,  254 => 134,  244 => 131,  240 => 130,  236 => 129,  232 => 128,  229 => 127,  224 => 126,  204 => 108,  198 => 104,  187 => 95,  185 => 94,  176 => 87,  172 => 85,  160 => 83,  155 => 82,  151 => 80,  145 => 78,  143 => 77,  136 => 73,  128 => 68,  121 => 64,  114 => 60,  100 => 48,  87 => 40,  77 => 32,  75 => 31,  67 => 25,  60 => 20,  53 => 15,  51 => 14,  41 => 6,  38 => 5,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "reagendamiento/reagendamiento_usuario.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\reagendamiento\\reagendamiento_usuario.twig");
    }
}
