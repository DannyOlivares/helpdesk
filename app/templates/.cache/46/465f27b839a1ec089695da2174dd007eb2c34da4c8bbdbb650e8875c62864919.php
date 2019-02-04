<?php

/* b2b/altas/master_motivoincumplimiento/listar_motivoincumplimiento.twig */
class __TwigTemplate_2b9aff0c093ef04bcc6d0cb34288d68fc5dfdb06e69135b5ed24124d562e5528 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "b2b/altas/master_motivoincumplimiento/listar_motivoincumplimiento.twig", 1);
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
        echo "    <section class=\"content-header\">
        <h1>
            B2B - Altas
            <small>Listado de Motivos Incumplimiento</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-home\"></i> Home</a></li>
            <li><a href=\"b2b/b2b\">Principal B2B</a></li>
            <li><a href=\"b2b/altas\">Dashboard ALTAS</a></li>
            <li class=\"active\">
                <a class=\"btn btn-primary btn-social pull-right\" href=\"b2b/nuevo_motivoincumplimiento\" title=\"Agregar\" data-toggle=\"tooltip\">
                    <i class=\"fa fa-plus\"></i>
                    Agregar Nuevo Motivo
                </a>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class=\"content\">
        <br>
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body\">
                        <table id=\"dataTables1\" class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th width='100'>Codigo</th>
                                    <th>Descripción</th>
                                    <th>Responsable</th>
                                    <th width='100'>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_motivoincumplimiento"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["db_motivoincumplimiento"] ?? null))) {
                // line 42
                echo "                                    <tr>
                                        <td>";
                // line 43
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "descripcion", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 45
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "grupo", array()), "html", null, true);
                echo "</td>
                                        <td class='center' width='80'>
                                            <a data-toggle='tooltip' data-placement='top' title='Modificar' class='btn btn-success btn-sm' href=\"b2b/editar_motivoincumplimiento/";
                // line 47
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                echo "\">
                                                <i class='glyphicon glyphicon-edit'></i>
                                            </a>

                                            ";
                // line 51
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado", array()) == 0)) {
                    // line 52
                    echo "                                                <a data-toggle='tooltip' data-placement='top' title='Bloqueado' class='btn btn-warning btn-sm' href=\"b2b/estado_motivoincumplimiento/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                    echo "\">
                                                    <i class='glyphicon glyphicon-off'></i>
                                                </a>

                                            ";
                } else {
                    // line 57
                    echo "                                                <a data-toggle='tooltip' data-placement='top' title='Activo' class='btn btn-danger btn-sm' href=\"b2b/estado_motivoincumplimiento/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "id", array()), "html", null, true);
                    echo "\">
                                                    <i class='glyphicon glyphicon-check'></i>
                                                </a>
                                            ";
                }
                // line 61
                echo "                                        </td>
                                    </tr>
                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

";
    }

    // line 74
    public function block_appScript($context, array $blocks = array())
    {
        // line 75
        echo "
    <script src=\"views/app/js/b2b/altas.js\"></script>

    <!-- DATA TABES SCRIPT -->
    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>

    <script>
        \$(\"#dataTables1\").dataTable({
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
            \"iDisplayLength\": -1
        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "b2b/altas/master_motivoincumplimiento/listar_motivoincumplimiento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 75,  147 => 74,  134 => 64,  125 => 61,  117 => 57,  108 => 52,  106 => 51,  99 => 47,  94 => 45,  90 => 44,  86 => 43,  83 => 42,  78 => 41,  41 => 6,  38 => 5,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "b2b/altas/master_motivoincumplimiento/listar_motivoincumplimiento.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\b2b\\altas\\master_motivoincumplimiento\\listar_motivoincumplimiento.twig");
    }
}
