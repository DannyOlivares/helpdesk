<?php

/* reagendamiento/cargar_ordenes.twig */
class __TwigTemplate_375d918a3dc6ebc12adbf0df74c13b81d7ed072bb13c93465acfaf74a2e4f3d6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "reagendamiento/cargar_ordenes.twig", 1);
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
        echo "
    <section class=\"content-header\">
        <h1>
            REAGENDAMIENTO ANDES
            <small>Carga de Actividades</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home</a>
            </li>
            <li class=\"active\">Cargar Pendiente de Reagendamiento</li>
        </ol>
    </section>

    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body col-sm-8\">
                        <div class=\"form-group\">
                            <form id=\"formordenes\" name=\"formordenes\">
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
                                <div id=\"div_cargando\">
                                    <a class=\"btn btn-success btn-social\" title=\"Importar Excel\" data-toggle=\"tooltip\" onclick=\"subirarchivoexcel()\">
                                        <i class=\"fa fa-arrow-up\"></i>
                                        Cargar Ordenes
                                    </a>
                                </div>
                                <br>
                                <br>

                            </form>
                        </div>

                          ";
        // line 48
        if ((($context["q_temp"] ?? null) > 0)) {
            // line 49
            echo "                              <a data-toggle='tooltip' data-placement='top' title='Ver datos cargados'       onclick='visualizar_ordenes()' class='btn btn-success btn-md col-md-3'>Ver datos cargados</a>
                              <a data-toggle='tooltip' data-placement='top' title='Cruzar base'              onclick='cruzarbases()' class='btn btn-primary btn-md col-md-3'>Cruzar bases</a>
                              <a data-toggle='tooltip' data-placement='top' title='Exportar inconcistencias' onclick='cargarinconcistencia()' class='btn btn-danger btn-md col-md-3'>Exportar inconcistencias</a>
                              <a data-toggle='tooltip' data-placement='top' title='Distribuir Actividades'   onclick='distribuirordenes()' class='btn btn-warning btn-md col-md-3'>Distribuir Ordenes</a>
                          ";
        }
        // line 54
        echo "
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
        // line 65
        $context["No"] = 1;
        // line 66
        echo "                                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["db_archivos"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["db_archivos"] ?? null))) {
                // line 67
                echo "                                    <tr>
                                        <td>";
                // line 68
                echo twig_escape_filter($this->env, ($context["No"] ?? null), "html", null, true);
                echo "</td>
                                        <td>";
                // line 69
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "fecha_hora", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 70
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "nombre_archivo", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 71
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "name", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 72
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "q_registros", array()), "html", null, true);
                echo "</td>
                                    </tr>
                                    ";
                // line 74
                $context["No"] = (($context["No"] ?? null) + 1);
                // line 75
                echo "                                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "                            </tbody>
                        </table>
                    </div>
                    <div class=\"box-body col-sm-4\">
                        <span>
                            <b>Formato de Archivo</b>
                            <p>Col C -> RUT_CLIENTE</p>
                            <p>Col E -> TIPO_CLIENTE</p>
                            <p>Col P -> NUMERO_ORDEN</p>
                            <p>Col S -> ID_ACTIVIDAD</p>
                            <p>Col AU -> ACTIVIDAD</p>
                            <p>Col BH -> FECHA_CREACIÓN</p>
                            <p>Col BL -> COMUNA</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        ";
        // line 94
        $this->loadTemplate("reagendamiento/modal_visualizar", "reagendamiento/cargar_ordenes.twig", 94)->display($context);
        // line 95
        echo "    </section>

";
    }

    // line 98
    public function block_appScript($context, array $blocks = array())
    {
        // line 99
        echo "
    <script src=\"views/app/template/datatables/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/template/datatables/dataTables.bootstrap.min.js\" type=\"text/javascript\"></script>
    <script src=\"views/app/js/reagendamiento/reagendamiento.js\"></script>
    <script>
        \$(\"#tblordenes\").dataTable({
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
            
            \"bSort\": true
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "reagendamiento/cargar_ordenes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 99,  170 => 98,  164 => 95,  162 => 94,  142 => 76,  135 => 75,  133 => 74,  128 => 72,  124 => 71,  120 => 70,  116 => 69,  112 => 68,  109 => 67,  103 => 66,  101 => 65,  88 => 54,  81 => 49,  79 => 48,  32 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "reagendamiento/cargar_ordenes.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\reagendamiento\\cargar_ordenes.twig");
    }
}
