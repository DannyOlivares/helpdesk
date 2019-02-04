<?php

/* casilleros/nuevo_casillero.twig */
class __TwigTemplate_540d8642c6f05fba0b0c4a12af226269cbda1c0d82eaba0fc2033b3d77b21294 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "casilleros/nuevo_casillero.twig", 1);
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
            Casilleros
            <small>Casillero A Registrar</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home</a>
            </li>
            <li>
                <a href=\"casilleros/listar_casilleros\">Listado de Casilleros</a>
            </li>
            <li class=\"active\">Agregar Casillero</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class=\"content\">
        <form id=\"form_casillero\" name=\"form_casillero\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Agregar Casillero</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col-md-12 text-center\">
                                <a data-toggle='tooltip' data-placement='top' name=\"agregarCasillero\" id=\"agregarCasillero\" class='btn btn-success'>Agregar Casillero
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Numero de Orden:</label><input type=\"text\" name=\"nOrden\" id=\"nOrden\" class=\"form-control\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>RUT:</label><input type=\"text\" name=\"rut\" id=\"rut\" class=\"form-control\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Comuna:</label>
                                  <input type=\"text\" name=\"comuna\" id=\"comuna\" class=\"form-control\" placeholder=\"CODIGO COMUNA\" onfocusout=\"cargardeeps()\">
                              </div>
                              <div class=\"col-md-6\" id=\"diveps\" name=\"diveps\">
                                  <label>EPS:</label>
                                  <select class=\"form-control\" id=\"opcioneps\" name=\"opcioneps\">
                                    <option value=\"0\">--</option>
                                  </select>
                              </div>
                            <div class=\"col-md-6\">
                                <label>Actividad:</label>
                                <select name=\"actividad\" id=\"actividad\" class=\"form-control\">
                                    <option value=\"--\" selected=\"selected\">--</option>
                                    ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["actividad"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["ac"]) {
            // line 56
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, $context["ac"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["ac"], "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ac'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "                                </select>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Acción:</label>
                                <select name=\"accion\" id=\"accion\" class=\"form-control\" onchange=\"carga_motivo_casillero();\">
                                    <option value=\"--\" selected=\"selected\">--</option>
                                    ";
        // line 64
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["accion"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
            // line 65
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, $context["a"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["a"], "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "                                </select>
                            </div>
                            <div class=\"col-md-6\" id=\"div_motivo\">

                            </div>
                            <div class=\"col-md-6\">
                                <label>Casillero:</label>
                                <input type=\"text\" class=\"form-control\" id=\"casillero\" name=\"casillero\" placeholder=\"Ingrese el nombre del casillero\" value='";
        // line 74
        echo twig_escape_filter($this->env, ($context["casillero"] ?? null), "html", null, true);
        echo "'>
                            </div>
                            <br>
                            <div class=\"col-md-12\">
                                <label>Observación:</label>
                                <textarea name=\"observacion\" id=\"observacion\" cols=\"30\" rows=\"3\" class=\"form-control\"></textarea>
                            </div>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"agregarCasillero\" id=\"agregarCasillero_abajo\" class='btn btn-success'>Agregar Casillero
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    ";
    }

    // line 93
    public function block_appScript($context, array $blocks = array())
    {
        // line 94
        echo "        <script src=\"views/app/js/casilleros/casilleros.js\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "casilleros/nuevo_casillero.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 94,  156 => 93,  133 => 74,  124 => 67,  113 => 65,  109 => 64,  101 => 58,  90 => 56,  86 => 55,  32 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "casilleros/nuevo_casillero.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\casilleros\\nuevo_casillero.twig");
    }
}
