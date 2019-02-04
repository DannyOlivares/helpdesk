<?php

/* reagendamiento/nueva_altautilizacion.twig */
class __TwigTemplate_77065ac8ae567adcfc393cf8766936e432b2a46d8cbad18dff40e2774770648d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "reagendamiento/nueva_altautilizacion.twig", 1);
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
    <!-- <style media=\"screen\">
        .at {
            display: none;
        }
        #divhistorial{
             height:250px;
             width:728px;
             overflow: auto;
        }
        #divdatos{
             height:250px;
             width:728px;
             overflow: auto;
        }
        #divcontenido{
              height:700px;
             width:700px;
        }
    </style> -->
";
    }

    // line 24
    public function block_appBody($context, array $blocks = array())
    {
        // line 25
        echo "  <div class=\"row\">
    <div class=\"box\">
      <div class=\"col-md-12\" >
          <section class=\"content-header\">
              <h1>
                Reagendamiento
                <small>Alta Utilizacion</small>
              </h1>

          </section>
        </div>
    </div>
</div>
<section class=\"content\">
  <form id=\"formalta\" name=\"formalta\">
    <div class=\"row\">
      <div class=\"col-md-4\" id=\"divalta\" name=\"divalta\">
        <div class=\"box\">
            <div class=\"box-header\">
              <h4 class=\"box-title\">Alta Utilizacion</h4>
            </div>
            <div class=\"box-body\">
              <div id=\"divordenesalta\" name=\"divordenesalta\">
                  <div class=\"col-md-10\">
                    <label>ID ORDEN</label>
                    <input type=\"text\" class=\"form-control col-md-3\" id=\"txtordenalta\" name=\"txtordenalta\">
                  </div>
                  <div class=\"col-md-2\">
                  </div>
                  <div class=\"col-md-12\">
                    <br>
                  </div>
                  <div class=\"col-md-10\">
                    <label>N° PEDIDO</label>
                    <input type=\"text\" class=\"form-control col-md-3\" id=\"txtpedidoalta\" name=\"txtpedidoalta\">
                  </div>
                  <div class=\"col-md-2\">
                  </div>
                  <div class=\"col-md-12\">
                    <br>
                  </div>
                  <div class=\"col-md-10\">
                    <label>RUT CLIENTE</label>
                    <input type=\"text\" class=\"form-control col-md-3\" id=\"txtrutclientealta\" name=\"txtrutclientealta\">
                  </div>
                  <div class=\"col-md-2\">
                  </div>
                  <div class=\"col-md-12\">
                    <br>
                  </div>
                  <div class=\"col-md-10\">
                    <label>TIPO ACTIVIDAD</label>
                    <input type=\"text\" class=\"form-control col-md-3\" id=\"txtactividadalta\" name=\"txtactividadalta\">
                  </div>
                  <div class=\"col-md-2\">
                  </div>
                  <div class=\"col-md-12\">
                    <br>
                  </div>
                  <div class=\"col-md-10\">
                    <label>COMUNA</label>
                    <select id='opcioncomunaalta' name='opcioncomunaalta' class=\"form-control\">
                      <option value=\"0\">--</option>
                      ";
        // line 88
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_comunas"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            if ((false != ($context["db_comunas"] ?? null))) {
                // line 89
                echo "                          <option value=\"";
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
        // line 91
        echo "                    </select>
                  </div>
                  <div class=\"col-md-2\">
                  </div>
                <div class=\"col-md-12\">
                </div>
              </div>
            </div>
              <div class=\"box-body\">
                <div>
                  <h4 class=\"box-title\">OPCIONES</h4>
                </div>
                <div class=\"col-md-12\">
                  <br>
                </div>
                <div class=\"col-md-12\" >
                     <div id=\"divbotonesalta\" name=\"divbotonesalta\">
                      <td>
                      <a data-toggle='tooltip' data-placement='top' title='Nueva Orden' onclick=\"nuevaordenalta()\" class='btn btn-success btn-md col-md-3'><i class='glyphicon glyphicon-plus-sign'></i></a>
                      <div class=\"col-md-1\"></div><a data-toggle='tooltip' data-placement='top' title='Guardar Orden' onclick=\"guardar_orden_altautilizacion()\" class='btn btn-primary btn-md col-md-3' ><i class='glyphicon glyphicon-floppy-disk'></i></a>
                      <div class=\"col-md-1\"></div><a data-toggle='tooltip' data-placement='top' title='Eliminar Orden' class='btn btn-danger btn-md col-md-3' onclick='eliminar_orden_altautilizacion()'><i class='glyphicon glyphicon-remove-sign'></a></i>
                      </td>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                     </div>
                </div>
            </div>
          </div>
        </div>

      <div  class='col-md-8' id=\"divdetalle\" name=\"divdetalle\">
        <div class=\"box\">
            <div class=\"box-header\">
              <h4 class=\"box-title\">Listar Ordenes</h4>
            </div>
            <div class=\"box-body\">
                <div id=\"divtablaalta\" name=\"divtablaalta\">
                  <table id='tblaltautilizacion'  name='tblaltautilizacion' class=\"table table-bordered\">
                    <thead>
                      <th>ID_ORDEN</th>
                      <th>NUMERO_ORDEN</th>
                      <th>RUT_CLIENTE</th>
                      <th>ACTIVIDAD</th>
                      <th>COMUNA</th>
                      <th>USUARIO_REGISTRA</th>
                    </thead>
                    <tbody>
                        ";
        // line 141
        $context["No"] = 1;
        // line 142
        echo "                        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_utilizacion"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            if ((false != ($context["db_utilizacion"] ?? null))) {
                // line 143
                echo "                            <tr>
                                <td>";
                // line 144
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["u"], "id_orden", array()), "html", null, true);
                echo "</td>
                                <td>";
                // line 145
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["u"], "num_orden", array()), "html", null, true);
                echo "</td>
                                <td>";
                // line 146
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["u"], "rut_cliente", array()), "html", null, true);
                echo "</td>
                                <td>";
                // line 147
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["u"], "actividad", array()), "html", null, true);
                echo "</td>
                                <td>";
                // line 148
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["u"], "descripcion", array()), "html", null, true);
                echo "</td>
                                <td>";
                // line 149
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["u"], "nombre", array()), "html", null, true);
                echo "</td>
                            </tr>
                            ";
                // line 151
                $context["No"] = (($context["No"] ?? null) + 1);
                // line 152
                echo "
                        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 154
        echo "                    </tbody>
                  </table>
                </div>
          </div>
        </div>
    </div>
  </div>
 </form>
</section>
";
    }

    // line 164
    public function block_appScript($context, array $blocks = array())
    {
        // line 165
        echo "<script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
<script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
<script src=\"views/app/js/reagendamiento/reagendamiento.js\"></script>
<script>
    \$(\"#tblaltautilizacion\").dataTable({
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
        return "reagendamiento/nueva_altautilizacion.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  256 => 165,  253 => 164,  240 => 154,  232 => 152,  230 => 151,  225 => 149,  221 => 148,  217 => 147,  213 => 146,  209 => 145,  205 => 144,  202 => 143,  196 => 142,  194 => 141,  142 => 91,  130 => 89,  125 => 88,  60 => 25,  57 => 24,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "reagendamiento/nueva_altautilizacion.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\reagendamiento\\nueva_altautilizacion.twig");
    }
}
