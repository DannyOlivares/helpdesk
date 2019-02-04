<?php

/* avar/distribucion/distribuir_blindaje.twig */
class __TwigTemplate_94a8de39c79c3644c145fdaf5d7bcf9cea751b1fe3d5a9af5775b695c21d2352 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "avar/distribucion/distribuir_blindaje.twig", 1);
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
            AVAR
            <small>PROCESO AVAR DISTRIBUCIÓN</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\"><i class=\"fa fa-home\"></i>Home</a>
            </li>
            <li class=\"active\">Distribución de Ordenes</li>
        </ol>
    </section>

    <section class=\"content\">
        <div class=\"nav-tabs-custom\">
            <ul class=\"nav nav-tabs\">
                <li class=\"active\"><a href=\"#tab_1-1\" data-toggle=\"tab\">NIVEL 1 - AVAR REACTIVO DIA</a></li>
                <li><a href=\"#tab_2-2\" data-toggle=\"tab\">NIVEL 2 - AVAR REACTIVO ESCALAMIENTO</a></li>
                <li><a href=\"#tab_3-3\" data-toggle=\"tab\">NIVEL 3 - AVAR REACTIVO REDES</a></li>
                <li><a href=\"#tab_4-4\" data-toggle=\"tab\">NIVEL 4 - AVAR PROACTIVO</a></li>
            </ul>
            <div class=\"tab-content\">
                <div class=\"tab-pane active\" id=\"tab_1-1\">
                    <div class=\"row\">
                        <div class=\"col-lg-6\">
                            <div class=\"box\">
                                <div class=\"box-header\">
                                    <h3 class=\"box-title\">Seleccione a bloque
                                        <select name=\"bloqueAvR\" id=\"bloqueAvR\">
                                            <option value=\"--\" selected=\"selected\">--</option>
                                            ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["bloque"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            if ((false != ($context["bloque"] ?? null))) {
                // line 35
                echo "                                                <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["b"], "bloque", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["b"], "bloque", array()), "html", null, true);
                echo "</option>
                                            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                                        </select>
                                    </h3>
                                </div>
                                <div class=\"box-body\" id=\"listar_bloque_ejecutivo\">
                                </div>
                            </div>
                        </div>


                        <div class=\"col-lg-6\">
                            <div class=\"box\">
                                <div class=\"box-header\">
                                    <h3 class=\"box-title\">Ordenes para Distribuir</h3>
                                </div>
                                <div class=\"box-body\" id=\"listar_pendiente_ordenes_n1\">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=\"tab-pane\" id=\"tab_2-2\">
                    <div class=\"col-md-4\">
                        <h4>Seleccione Comuna</h4>
                        <select name=\"comunaAv2\" id=\"comunaAv2\" class=\"form-control\">
                            <option value=\"--\" selected=\"selected\">--</option>
                            ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["comunas"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            if ((false != ($context["comunas"] ?? null))) {
                // line 64
                echo "                                <option value=\"";
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
        // line 66
        echo "                        </select>
                    </div>
                </div>
                <div class=\"tab-pane\" id=\"tab_3-3\">
                    <div class=\"col-md-4\">
                        <h4>Seleccione Comuna</h4>
                        <select name=\"comunaAv3\" id=\"comunaAv3\" class=\"form-control\">
                            <option value=\"--\">--</option>
                            <option value=\"TODAS\">TODAS</option>
                        </select>
                    </div>
                </div>
                <div class=\"tab-pane\" id=\"tab_4-4\">
                    <div class=\"col-md-4\">
                        <h4>Seleccione Comuna</h4>
                        <select name=\"comunaAv4\" id=\"comunaAv4\" class=\"form-control\">
                            <option value=\"--\" selected=\"selected\">--</option>
                            ";
        // line 83
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["comunas"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            if ((false != ($context["comunas"] ?? null))) {
                // line 84
                echo "                                <option value=\"";
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
        // line 86
        echo "                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

";
    }

    // line 94
    public function block_appScript($context, array $blocks = array())
    {
        // line 95
        echo "    <script src=\"views/app/js/avar/avar.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "avar/distribucion/distribuir_blindaje.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 95,  174 => 94,  163 => 86,  151 => 84,  146 => 83,  127 => 66,  115 => 64,  110 => 63,  82 => 37,  70 => 35,  65 => 34,  32 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appBody %}

    <section class=\"content-header\">
        <h1>
            AVAR
            <small>PROCESO AVAR DISTRIBUCIÓN</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\"><i class=\"fa fa-home\"></i>Home</a>
            </li>
            <li class=\"active\">Distribución de Ordenes</li>
        </ol>
    </section>

    <section class=\"content\">
        <div class=\"nav-tabs-custom\">
            <ul class=\"nav nav-tabs\">
                <li class=\"active\"><a href=\"#tab_1-1\" data-toggle=\"tab\">NIVEL 1 - AVAR REACTIVO DIA</a></li>
                <li><a href=\"#tab_2-2\" data-toggle=\"tab\">NIVEL 2 - AVAR REACTIVO ESCALAMIENTO</a></li>
                <li><a href=\"#tab_3-3\" data-toggle=\"tab\">NIVEL 3 - AVAR REACTIVO REDES</a></li>
                <li><a href=\"#tab_4-4\" data-toggle=\"tab\">NIVEL 4 - AVAR PROACTIVO</a></li>
            </ul>
            <div class=\"tab-content\">
                <div class=\"tab-pane active\" id=\"tab_1-1\">
                    <div class=\"row\">
                        <div class=\"col-lg-6\">
                            <div class=\"box\">
                                <div class=\"box-header\">
                                    <h3 class=\"box-title\">Seleccione a bloque
                                        <select name=\"bloqueAvR\" id=\"bloqueAvR\">
                                            <option value=\"--\" selected=\"selected\">--</option>
                                            {% for b in bloque if false != bloque %}
                                                <option value=\"{{ b.bloque }}\">{{ b.bloque }}</option>
                                            {% endfor %}
                                        </select>
                                    </h3>
                                </div>
                                <div class=\"box-body\" id=\"listar_bloque_ejecutivo\">
                                </div>
                            </div>
                        </div>


                        <div class=\"col-lg-6\">
                            <div class=\"box\">
                                <div class=\"box-header\">
                                    <h3 class=\"box-title\">Ordenes para Distribuir</h3>
                                </div>
                                <div class=\"box-body\" id=\"listar_pendiente_ordenes_n1\">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=\"tab-pane\" id=\"tab_2-2\">
                    <div class=\"col-md-4\">
                        <h4>Seleccione Comuna</h4>
                        <select name=\"comunaAv2\" id=\"comunaAv2\" class=\"form-control\">
                            <option value=\"--\" selected=\"selected\">--</option>
                            {% for c in comunas if false != comunas %}
                                <option value=\"{{c.id_comuna}}\">{{ c.descripcion }}</option>
                            {% endfor %}
                        </select>
                    </div>
                </div>
                <div class=\"tab-pane\" id=\"tab_3-3\">
                    <div class=\"col-md-4\">
                        <h4>Seleccione Comuna</h4>
                        <select name=\"comunaAv3\" id=\"comunaAv3\" class=\"form-control\">
                            <option value=\"--\">--</option>
                            <option value=\"TODAS\">TODAS</option>
                        </select>
                    </div>
                </div>
                <div class=\"tab-pane\" id=\"tab_4-4\">
                    <div class=\"col-md-4\">
                        <h4>Seleccione Comuna</h4>
                        <select name=\"comunaAv4\" id=\"comunaAv4\" class=\"form-control\">
                            <option value=\"--\" selected=\"selected\">--</option>
                            {% for c in comunas if false != comunas %}
                                <option value=\"{{c.id_comuna}}\">{{ c.descripcion }}</option>
                            {% endfor %}
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

{% endblock %}
{% block appScript %}
    <script src=\"views/app/js/avar/avar.js\"></script>
{% endblock %}
", "avar/distribucion/distribuir_blindaje.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\avar\\distribucion\\distribuir_blindaje.twig");
    }
}
