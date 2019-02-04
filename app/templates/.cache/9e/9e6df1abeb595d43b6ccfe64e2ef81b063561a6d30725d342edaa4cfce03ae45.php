<?php

/* rrhh/rrhh.twig */
class __TwigTemplate_44d700b0a20c60e00ac835415b09fa95759c6009f827ae4284deb1e7b1ef7451 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "rrhh/rrhh.twig", 1);
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
            RRHH
            <small>Principal</small>
        </h1>
        <ol class=\"breadcrumb\">
        <li><a href=\"#\"><i class=\"fa fa-home\"></i> Home</a></li>
        <li class=\"active\">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"box\">
                    <div class=\"box-header\">
                        <h3 class=\"box-title\">Resumen Asistencia</h3>
                        
                    </div>
                    <div class=\"box-body\">
                        <div class=\"col-lg-3\">
                            <table class=\"table table-bordered\">
                                <tbody>
                                    <tr>
                                    ";
        // line 28
        $context["total"] = 0;
        // line 29
        echo "                                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["GetAllTurnoDiaResumen"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["GetAllTurnoDiaResumen"] ?? null))) {
                // line 30
                echo "
                                        <td>
                                            ";
                // line 32
                if ((twig_slice($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "asistencia", array()), 0, 5) == "Falta")) {
                    // line 33
                    echo "                                                ";
                    $context["clase"] = "btn-danger";
                    // line 34
                    echo "                                            ";
                } elseif ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "asistencia", array()) == "C/TURNO")) {
                    // line 35
                    echo "                                                ";
                    $context["clase"] = "btn-success";
                    // line 36
                    echo "                                            ";
                } elseif (((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "asistencia", array()) == "LIBRE") || (twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "asistencia", array()) == "S/TURNO"))) {
                    // line 37
                    echo "                                                ";
                    $context["clase"] = "btn-primary";
                    // line 38
                    echo "                                            ";
                } else {
                    // line 39
                    echo "                                                ";
                    $context["clase"] = "btn-warning";
                    // line 40
                    echo "                                            ";
                }
                // line 41
                echo "                                            <button type=\"button\" class=\"btn btn-block btn-xs ";
                echo twig_escape_filter($this->env, ($context["clase"] ?? null), "html", null, true);
                echo "\" onclick=\"carga_ejecutivo_estado('";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "asistencia", array()), "html", null, true);
                echo "');\">
                                                ";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "asistencia", array()), "html", null, true);
                echo "
                                            </button>
                                        </td>
                                        <td> ";
                // line 45
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "cuenta", array()), "html", null, true);
                echo "</td>
                                        ";
                // line 46
                $context["total"] = (($context["total"] ?? null) + twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "cuenta", array()));
                // line 47
                echo "                                    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "                                        <td><button type=\"button\" class=\"btn btn-block btn-xs btn-info\" onclick=\"carga_ejecutivo_estado('TODOS');\">TOTAL</button></td><td>";
        echo twig_escape_filter($this->env, ($context["total"] ?? null), "html", null, true);
        echo "</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"box\">

                <div id=\"div_lista_ejecutivos\"  class=\"box-body\">
                    ";
        // line 62
        $context["count"] = 1;
        // line 63
        echo "                    ";
        $context["tope"] = 21;
        // line 64
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["getAllTurnosDia"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["getAllTurnosDia"] ?? null))) {
                // line 65
                echo "                        ";
                if ((($context["count"] ?? null) == 1)) {
                    // line 66
                    echo "                            <div class=\"col-lg-4\">
                                <table class=\"table table-bordered\">
                                    <thead>
                                        <th>Ejecutivo</th>
                                        <th>Asistencia</th>
                                    </thead>
                                    <tbody>

                        ";
                }
                // line 75
                echo "                                        <tr>
                                            <td>";
                // line 76
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "name", array())), "html", null, true);
                echo "</td>
                                            <td>
                                                ";
                // line 78
                if ((twig_slice($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "asistencia", array()), 0, 5) == "Falta")) {
                    // line 79
                    echo "                                                    <span class=\"label label-danger\">
                                                ";
                } elseif ((twig_get_attribute($this->env, $this->getSourceContext(),                 // line 80
$context["d"], "asistencia", array()) == "C/TURNO")) {
                    // line 81
                    echo "                                                    <span class=\"label label-success\">
                                                ";
                } elseif (((twig_get_attribute($this->env, $this->getSourceContext(),                 // line 82
$context["d"], "asistencia", array()) == "LIBRE") || (twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "asistencia", array()) == "S/TURNO"))) {
                    // line 83
                    echo "                                                    <span class=\"label label-primary\">
                                                ";
                } else {
                    // line 85
                    echo "                                                    <span class=\"label label-warning\">
                                                ";
                }
                // line 87
                echo "                                            ";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "asistencia", array())) ? (twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "asistencia", array())) : ("C/TURNO")), "html", null, true);
                echo "</td>
                                        </tr>
                        ";
                // line 89
                $context["count"] = (($context["count"] ?? null) + 1);
                // line 90
                echo "                        ";
                if ((($context["count"] ?? null) == ($context["tope"] ?? null))) {
                    // line 91
                    echo "                                    </tbody>
                                </table>
                            </div>
                            ";
                    // line 94
                    $context["count"] = 1;
                    // line 95
                    echo "                        ";
                }
                // line 96
                echo "
                    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        echo "                    ";
        if ((($context["count"] ?? null) < ($context["tope"] ?? null))) {
            // line 99
            echo "                                </tbody>
                            </table>
                        </div>
                    ";
        }
        // line 103
        echo "                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

";
    }

    // line 110
    public function block_appScript($context, array $blocks = array())
    {
        // line 111
        echo "    <script src=\"views/app/js/rrhh/turnos.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "rrhh/rrhh.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 111,  242 => 110,  232 => 103,  226 => 99,  223 => 98,  215 => 96,  212 => 95,  210 => 94,  205 => 91,  202 => 90,  200 => 89,  194 => 87,  190 => 85,  186 => 83,  184 => 82,  181 => 81,  179 => 80,  176 => 79,  174 => 78,  169 => 76,  166 => 75,  155 => 66,  152 => 65,  146 => 64,  143 => 63,  141 => 62,  123 => 48,  116 => 47,  114 => 46,  110 => 45,  104 => 42,  97 => 41,  94 => 40,  91 => 39,  88 => 38,  85 => 37,  82 => 36,  79 => 35,  76 => 34,  73 => 33,  71 => 32,  67 => 30,  61 => 29,  59 => 28,  32 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "rrhh/rrhh.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\rrhh\\rrhh.twig");
    }
}
