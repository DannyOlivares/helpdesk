<?php

/* reagendamiento/listar_reagendamiento.twig */
class __TwigTemplate_b1602d96cda831e6d82c1ef6580856f03566d2409e6dbe090eb83af683689982 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "reagendamiento/listar_reagendamiento.twig", 1);
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
            Reagendamiento
            <small>Total Ordenes</small>
        </h1>
    </section>
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body\">
                        <table id=\"tblreagendamiento\" name=\"tblreagendamiento\" class=\"table table-bordered\">
                            <thead>
                                <tr>

                                    <th>ID_ACTIVIDAD</th>
                                    <th>NO_ORDEN</th>
                                    <th>RUT_CLIENTE</th>
                                    <th>TIPO_ACTIVIDAD</th>
                                    <th>COMUNA</th>
                                    <th>ESTADO</th>
                                    <th>dias</th>
                                    <th>Usuario_Gestion</th>
                                    <th>Fecha_Gestion</th>
                                    <th>Observacion_Gestion</th>
                                </tr>
                            </thead>
                            <tbody>

                                ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_ordenes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            if ((false != ($context["db_ordenes"] ?? null))) {
                // line 36
                echo "                                    <tr>

                                        <td>";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["r"], "id_orden", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["r"], "numero_orden", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 40
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["r"], "rut_cliente", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 41
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["r"], "actividad", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["r"], "descripcion", array()), "html", null, true);
                echo "</td>
                                        ";
                // line 43
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["r"], "estado", array()) == 1)) {
                    // line 44
                    echo "                                         <td>GESTIONADA</td>
                                        ";
                } elseif ((twig_get_attribute($this->env, $this->getSourceContext(),                 // line 45
$context["r"], "estado", array()) == 2)) {
                    // line 46
                    echo "                                         <td>REAGENDADA</td>
                                        ";
                } elseif ((twig_get_attribute($this->env, $this->getSourceContext(),                 // line 47
$context["r"], "estado", array()) == 3)) {
                    // line 48
                    echo "                                         <td>CANCELADA</td>
                                        ";
                } elseif ((twig_get_attribute($this->env, $this->getSourceContext(),                 // line 49
$context["r"], "estado", array()) == 4)) {
                    // line 50
                    echo "                                          <td>ALTA UTILIZACION</td>
                                        ";
                } elseif ((twig_get_attribute($this->env, $this->getSourceContext(),                 // line 51
$context["r"], "estado", array()) == 5)) {
                    // line 52
                    echo "                                          <td>GESTION EXTERNA</td>
                                        ";
                } else {
                    // line 54
                    echo "                                          <td>PENDIENTE</td>
                                        ";
                }
                // line 56
                echo "                                        <td >
                                            ";
                // line 57
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["r"], "dias", array()), "html", null, true);
                echo "
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>


                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['r'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    // line 74
    public function block_appScript($context, array $blocks = array())
    {
        // line 75
        echo "
    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/js/reagendamiento/reagendamiento.js\"></script>
    <script>
        \$(\"#tblreagendamiento\").dataTable({
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
            \"scrollX\": true
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "reagendamiento/listar_reagendamiento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 75,  161 => 74,  150 => 66,  134 => 57,  131 => 56,  127 => 54,  123 => 52,  121 => 51,  118 => 50,  116 => 49,  113 => 48,  111 => 47,  108 => 46,  106 => 45,  103 => 44,  101 => 43,  97 => 42,  93 => 41,  89 => 40,  85 => 39,  81 => 38,  77 => 36,  72 => 35,  41 => 6,  38 => 5,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "reagendamiento/listar_reagendamiento.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\reagendamiento\\listar_reagendamiento.twig");
    }
}
