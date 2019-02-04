<?php

/* b2b/b2b.twig */
class __TwigTemplate_33fc552d2d8ee053d6d14147634f1c4a895c093fc624693c66a18fdc7957e9fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "b2b/b2b.twig", 1);
        $this->blocks = array(
            'appBody' => array($this, 'block_appBody'),
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
            B2B
            <small>Control panel</small>
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
                <div class=\"nav-tabs-custom\">
                    <ul class=\"nav nav-tabs pull-rigth\">
                        <li class=\"active\"><a href=\"#tab_1-1\" data-toggle=\"tab\">ALTAS</a></li>
                        <li><a href=\"#tab_2-2\" data-toggle=\"tab\" onclick=\"getTurnoSemanaCompleta();\">SSTT</a></li>
                    </ul>
                    <div class=\"tab-content\">
                        <div class=\"tab-pane active\" id=\"tab_1-1\">
                            <div class=\"row\">
                                <div class=\"col-lg-6\">
                                    <div class=\"box\">
                                        <div class=\"box-header\">
                                            <h3 class=\"box-title\">Resumen Gestion Compromiso Hoy</h3>
                                        </div>
                                        <div class=\"box-body\">
                                            <div class=\"col-lg-3\">
                                                <table class=\"table table-bordered\">
                                                    <tbody>
                                                        <tr>
                                                        ";
        // line 36
        $context["total"] = 0;
        // line 37
        echo "                                                        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["getResumenGestionCompromisoHoy"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["getResumenGestionCompromisoHoy"] ?? null))) {
                // line 38
                echo "
                                                            <td>
                                                                ";
                // line 40
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_actual", array()) == "ANULADA")) {
                    // line 41
                    echo "                                                                    ";
                    $context["clase"] = "label-danger";
                    // line 42
                    echo "                                                                ";
                } elseif ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_actual", array()) == "FINALIZADA")) {
                    // line 43
                    echo "                                                                    ";
                    $context["clase"] = "label-success";
                    // line 44
                    echo "                                                                ";
                } elseif ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_actual", array()) == "PENDIENTE")) {
                    // line 45
                    echo "                                                                    ";
                    $context["clase"] = "label-warning";
                    // line 46
                    echo "                                                                ";
                }
                // line 47
                echo "                                                                <span class=\"label  ";
                echo twig_escape_filter($this->env, ($context["clase"] ?? null), "html", null, true);
                echo "\">
                                                                    ";
                // line 48
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_actual", array()), "html", null, true);
                echo "
                                                                </span>
                                                            </td>
                                                            <td> ";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "q", array()), "html", null, true);
                echo "</td>
                                                            ";
                // line 52
                $context["total"] = (($context["total"] ?? null) + twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "q", array()));
                // line 53
                echo "                                                        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "                                                            <td><span class=\"label label-info\" >TOTAL</span></td><td>";
        echo twig_escape_filter($this->env, ($context["total"] ?? null), "html", null, true);
        echo "</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class=\"col-lg-6\">
                                    <div class=\"box\">
                                        <div id=\"div_lista_ejecutivos\"  class=\"box-body\">
                                        ";
        // line 66
        $context["bloque"] = "";
        // line 67
        echo "                                        ";
        $context["count"] = 1;
        // line 68
        echo "                                        ";
        $context["Q_Bloque"] = 0;
        // line 69
        echo "                                        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["getResumenGestionCompromisoHoyBloques"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["getResumenGestionCompromisoHoyBloques"] ?? null))) {
                // line 70
                echo "                                            ";
                if ((($context["bloque"] ?? null) != twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "HORARIO_COMPROMISO", array()))) {
                    // line 71
                    echo "                                                ";
                    if ((($context["count"] ?? null) > 1)) {
                        // line 72
                        echo "                                                                <tr>
                                                                    <td><span class=\"label label-info\" >TOTAL</span></td><td>";
                        // line 73
                        echo twig_escape_filter($this->env, ($context["Q_Bloque"] ?? null), "html", null, true);
                        echo "</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                ";
                    }
                    // line 79
                    echo "                                                ";
                    $context["count"] = 1;
                    // line 80
                    echo "                                                ";
                    $context["bloque"] = twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "HORARIO_COMPROMISO", array());
                    // line 81
                    echo "                                            ";
                }
                // line 82
                echo "
                                            ";
                // line 83
                if ((($context["count"] ?? null) == 1)) {
                    // line 84
                    echo "                                                <div class=\"col-lg-3\">
                                                    <label>";
                    // line 85
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "HORARIO_COMPROMISO", array()), "html", null, true);
                    echo "</label>
                                                    <table class=\"table table-bordered\">
                                                        <thead>
                                                            <th>ESTADO</th>
                                                            <th>Q</th>
                                                        </thead>
                                                        <tbody>
                                                        ";
                    // line 92
                    $context["Q_Bloque"] = 0;
                    // line 93
                    echo "                                            ";
                }
                // line 94
                echo "                                                            <tr>
                                                                <td>
                                                                    ";
                // line 96
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_actual", array()) == "ANULADA")) {
                    // line 97
                    echo "                                                                        <span class=\"label label-danger\">
                                                                    ";
                } elseif ((twig_get_attribute($this->env, $this->getSourceContext(),                 // line 98
$context["d"], "estado_actual", array()) == "FINALIZADA")) {
                    // line 99
                    echo "                                                                        <span class=\"label label-success\">
                                                                    ";
                } else {
                    // line 101
                    echo "                                                                        <span class=\"label label-warning\">
                                                                    ";
                }
                // line 103
                echo "                                                                    ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "estado_actual", array()), "html", null, true);
                echo "</span>
                                                                </td>
                                                                <td><a href=\"#\">";
                // line 105
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "q", array()), "html", null, true);
                echo "</a></td>
                                                                ";
                // line 106
                $context["Q_Bloque"] = (($context["Q_Bloque"] ?? null) + twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "q", array()));
                // line 107
                echo "                                                            </tr>

                                            ";
                // line 109
                $context["count"] = (($context["count"] ?? null) + 1);
                // line 110
                echo "                                        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 111
        echo "                                        ";
        if ((($context["count"] ?? null) > 1)) {
            // line 112
            echo "                                                        <tr>
                                                            <td><span class=\"label label-info\" >TOTAL</span></td><td>";
            // line 113
            echo twig_escape_filter($this->env, ($context["Q_Bloque"] ?? null), "html", null, true);
            echo "</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        ";
        }
        // line 119
        echo "                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"tab-pane\" id=\"tab_2-2\">
                            <div class=\"box\">
                                <div class=\"box-body\">
                                    <div class=\"col-md-12\">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

";
    }

    public function getTemplateName()
    {
        return "b2b/b2b.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  261 => 119,  252 => 113,  249 => 112,  246 => 111,  239 => 110,  237 => 109,  233 => 107,  231 => 106,  227 => 105,  221 => 103,  217 => 101,  213 => 99,  211 => 98,  208 => 97,  206 => 96,  202 => 94,  199 => 93,  197 => 92,  187 => 85,  184 => 84,  182 => 83,  179 => 82,  176 => 81,  173 => 80,  170 => 79,  161 => 73,  158 => 72,  155 => 71,  152 => 70,  146 => 69,  143 => 68,  140 => 67,  138 => 66,  122 => 54,  115 => 53,  113 => 52,  109 => 51,  103 => 48,  98 => 47,  95 => 46,  92 => 45,  89 => 44,  86 => 43,  83 => 42,  80 => 41,  78 => 40,  74 => 38,  68 => 37,  66 => 36,  31 => 3,  28 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appBody %}
    <section class=\"content-header\">
        <h1>
            B2B
            <small>Control panel</small>
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
                <div class=\"nav-tabs-custom\">
                    <ul class=\"nav nav-tabs pull-rigth\">
                        <li class=\"active\"><a href=\"#tab_1-1\" data-toggle=\"tab\">ALTAS</a></li>
                        <li><a href=\"#tab_2-2\" data-toggle=\"tab\" onclick=\"getTurnoSemanaCompleta();\">SSTT</a></li>
                    </ul>
                    <div class=\"tab-content\">
                        <div class=\"tab-pane active\" id=\"tab_1-1\">
                            <div class=\"row\">
                                <div class=\"col-lg-6\">
                                    <div class=\"box\">
                                        <div class=\"box-header\">
                                            <h3 class=\"box-title\">Resumen Gestion Compromiso Hoy</h3>
                                        </div>
                                        <div class=\"box-body\">
                                            <div class=\"col-lg-3\">
                                                <table class=\"table table-bordered\">
                                                    <tbody>
                                                        <tr>
                                                        {% set total = 0 %}
                                                        {% for d in getResumenGestionCompromisoHoy if false != getResumenGestionCompromisoHoy %}

                                                            <td>
                                                                {% if d.estado_actual == \"ANULADA\" %}
                                                                    {% set clase = 'label-danger' %}
                                                                {% elseif d.estado_actual == \"FINALIZADA\" %}
                                                                    {% set clase = 'label-success' %}
                                                                {% elseif d.estado_actual == \"PENDIENTE\" %}
                                                                    {% set clase = 'label-warning' %}
                                                                {% endif %}
                                                                <span class=\"label  {{ clase }}\">
                                                                    {{ d.estado_actual }}
                                                                </span>
                                                            </td>
                                                            <td> {{ d.q }}</td>
                                                            {% set total = total + d.q %}
                                                        {% endfor %}
                                                            <td><span class=\"label label-info\" >TOTAL</span></td><td>{{ total }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class=\"col-lg-6\">
                                    <div class=\"box\">
                                        <div id=\"div_lista_ejecutivos\"  class=\"box-body\">
                                        {% set bloque = '' %}
                                        {% set count = 1 %}
                                        {% set Q_Bloque = 0 %}
                                        {% for d in getResumenGestionCompromisoHoyBloques if false != getResumenGestionCompromisoHoyBloques %}
                                            {% if bloque != d.HORARIO_COMPROMISO %}
                                                {% if count > 1 %}
                                                                <tr>
                                                                    <td><span class=\"label label-info\" >TOTAL</span></td><td>{{ Q_Bloque }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                {% endif %}
                                                {% set count = 1 %}
                                                {% set bloque = d.HORARIO_COMPROMISO %}
                                            {% endif %}

                                            {% if count == 1 %}
                                                <div class=\"col-lg-3\">
                                                    <label>{{ d.HORARIO_COMPROMISO }}</label>
                                                    <table class=\"table table-bordered\">
                                                        <thead>
                                                            <th>ESTADO</th>
                                                            <th>Q</th>
                                                        </thead>
                                                        <tbody>
                                                        {% set Q_Bloque = 0 %}
                                            {% endif %}
                                                            <tr>
                                                                <td>
                                                                    {% if d.estado_actual == \"ANULADA\" %}
                                                                        <span class=\"label label-danger\">
                                                                    {% elseif d.estado_actual == \"FINALIZADA\" %}
                                                                        <span class=\"label label-success\">
                                                                    {% else  %}
                                                                        <span class=\"label label-warning\">
                                                                    {% endif %}
                                                                    {{ d.estado_actual }}</span>
                                                                </td>
                                                                <td><a href=\"#\">{{ d.q }}</a></td>
                                                                {% set Q_Bloque = Q_Bloque + d.q %}
                                                            </tr>

                                            {% set count = count + 1 %}
                                        {% endfor %}
                                        {% if count > 1 %}
                                                        <tr>
                                                            <td><span class=\"label label-info\" >TOTAL</span></td><td>{{ Q_Bloque }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        {% endif %}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"tab-pane\" id=\"tab_2-2\">
                            <div class=\"box\">
                                <div class=\"box-body\">
                                    <div class=\"col-md-12\">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

{% endblock %}
", "b2b/b2b.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\b2b\\b2b.twig");
    }
}
