<?php

/* rrhh/anticipos/listar_anticipo_mensual.twig */
class __TwigTemplate_982035b63ef6bb04eb44004408bc47f1c707f49fa52465d0d59af749582c83fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "rrhh/anticipos/listar_anticipo_mensual.twig", 1);
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
            <small>Listar Anticipos del Mes seleccionado</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-home\"></i> Home</a></li>
            <li>Listar Anticipos</li>
            <li class=\"active\">
                <input type=\"hidden\" name=\"input_annomes\"  id=\"input_annomes\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Ym"), "html", null, true);
        echo "\">
                <a id=\"btn_exportar_excel_listado_anticipos\" class=\"btn btn-success btn-social pull-right\" title=\"exportar\" data-toggle=\"tooltip\">
                    <i class=\"fa fa-arrow-down\"></i>
                    Exportar Anticipos
                </a>
            </li>
        </ol>
    </section>

    <section class=\"content\">
        <div class=\"row\">
            ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fechas_db"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["fechas_db"] ?? null))) {
                // line 33
                echo "                <div class=\"col-lg-3\">
                    <div style=\"background-color:#00c0ef;color:#fff\" class=\"small-box\">
                        <div class=\"inner\">
                            <h3>";
                // line 36
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "mesano_print", array()), "html", null, true);
                echo " </h3>
                            <p></p>
                        </div>
                        <div class=\"icon\">
                            <i class=\"fa fa-envelope\"></i>
                        </div>
                        <a class=\"small-box-footer\"  title=\"Revisar proceso del mes\" data-toggle=\"tooltip\" onclick=\"GetListarAnticipoMes('";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "annomes", array()), "html", null, true);
                echo "','";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "mesano", array()), "html", null, true);
                echo "')\">
                        ";
                // line 43
                if ((twig_date_format_filter($this->env, "now", "m") == twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "mes", array()))) {
                    // line 44
                    echo "                            <i class=\"fa fa-eye rojo\" id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "mesano", array()), "html", null, true);
                    echo "\" ></i>
                        ";
                } else {
                    // line 46
                    echo "                            <i class=\"fa fa-eye\" id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "mesano", array()), "html", null, true);
                    echo "\"></i>
                        ";
                }
                // line 48
                echo "                        </a>
                    </div>
                </div><!-- ./col -->
            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "        </div>
        <div class=\"row\">
        <div class=\"col-md-12\">
            <div class=\"box\">
                <div class=\"box-body\" id=\"camdat\" name=\"camdat\">
                    <table id=\"dataTables4\" class=\"table table-bordered\" >
                        <thead>
                            <th Width=\"40\">N°</th>
                            <th Width=\"100\">Rut</th>
                            <th Width=\"300\">Nombre</th>
                            <th Width=\"150\">quincena</th>
                            <th>Monto</th>
                        </thead>
                        <tbody id=\"dtturnos\">
                            ";
        // line 66
        $context["No"] = 1;
        // line 67
        echo "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["anticipos_db"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["ct"]) {
            if ((false != ($context["anticipos_db"] ?? null))) {
                // line 68
                echo "                                <tr>
                                    <td>";
                // line 69
                echo twig_escape_filter($this->env, ($context["No"] ?? null), "html", null, true);
                echo "</td>
                                    <td>";
                // line 70
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "rut_personal", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "dv", array()), "html", null, true);
                echo "</td>
                                    <td Width=\"300\">";
                // line 71
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "name", array()), "html", null, true);
                echo "</td>
                                    <td>";
                // line 72
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "quincena", array()), "html", null, true);
                echo "</td>
                                    <td>";
                // line 73
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["ct"], "monto", array()), "html", null, true);
                echo "</td>
                                </tr>
                                ";
                // line 75
                $context["No"] = (($context["No"] ?? null) + 1);
                // line 76
                echo "                            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ct'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
";
    }

    // line 85
    public function block_appScript($context, array $blocks = array())
    {
        // line 86
        echo "    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/js/rrhh/rrhh.js\"></script>
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
             \"bSort\": false
         });
    </script>
";
    }

    public function getTemplateName()
    {
        return "rrhh/anticipos/listar_anticipo_mensual.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 86,  191 => 85,  180 => 77,  173 => 76,  171 => 75,  166 => 73,  162 => 72,  158 => 71,  152 => 70,  148 => 69,  145 => 68,  139 => 67,  137 => 66,  121 => 52,  111 => 48,  105 => 46,  99 => 44,  97 => 43,  91 => 42,  82 => 36,  77 => 33,  72 => 32,  58 => 21,  47 => 12,  44 => 11,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "rrhh/anticipos/listar_anticipo_mensual.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\rrhh\\anticipos\\listar_anticipo_mensual.twig");
    }
}
