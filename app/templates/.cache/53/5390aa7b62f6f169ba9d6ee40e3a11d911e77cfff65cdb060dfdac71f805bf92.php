<?php

/* b2b/altas/master_motivoincumplimiento/editar_motivoincumplimiento.twig */
class __TwigTemplate_970b490995da767031b03981f39592e353ae703b547bf457101e7cf6ec665362 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "b2b/altas/master_motivoincumplimiento/editar_motivoincumplimiento.twig", 1);
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
    }

    // line 3
    public function block_appBody($context, array $blocks = array())
    {
        // line 4
        echo "    <section class=\"content-header\">
        <h1>
            B2B - Altas
            <small>Agregar Motivo Incumplimiento</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-home\"></i> Home</a></li>
            <li><a href=\"b2b/b2b\">Principal B2B</a></li>
            <li><a href=\"b2b/altas\">Dashboard ALTAS</a></li>
            <li><a href=\"b2b/listar_motivoincumplimiento\">Listado de Motivos Incumplimiento</a></li>
            <li class=\"active\">Editar Motivo</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <form id=\"editar_motivoincumplimiento_form\" action=\"\" method=\"POST\">
                        <div class=\"box-body col-sm-4\"></div>
                        <div class=\"box-body col-sm-4\">
                            <input type='hidden' name='id_motivoincumplimiento' id='id_motivoincumplimiento' value='";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_motivoincumplimiento"] ?? null), "id", array()), "html", null, true);
        echo "'/>
                            <div class=\"form-group\">
                                Responsable:
                                <select name=\"grupo\" id=\"grupo\" class=\"form-control\">
                                    <option value=\"";
        // line 30
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_motivoincumplimiento"] ?? null), "grupo", array()), "html", null, true);
        echo "\" selected=\"selected\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_motivoincumplimiento"] ?? null), "grupo", array()), "html", null, true);
        echo "</option>
                                    <option value=\"CLIENTE\">CLIENTE</option>
                                    <option value=\"COMERCIAL\">COMERCIAL</option>
                                    <option value=\"EPS\">EPS</option>
                                    <option value=\"REDES\">REDES</option>
                                    <option value=\"SISTEMA\">SISTEMA</option>
                                </select>
                            </div>
                            <div class=\"form-group\">
                                Descripción
                                <input class=\"form-control\" name=\"descripcion\" id=\"descripcion\" type=\"text\" placeholder=\"Ingrese nombre completo de la comuna\" value='";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_motivoincumplimiento"] ?? null), "descripcion", array()), "html", null, true);
        echo "' required=\"required\"/>
                            </div>
                            <div class=\"panel-footer text-center\">
                                <button type=\"button\" id=\"update_motivoincumplimiento\" class=\"btn btn-default\">Grabar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

";
    }

    // line 54
    public function block_appScript($context, array $blocks = array())
    {
        // line 55
        echo "    <script src=\"views/app/js/b2b/altas.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "b2b/altas/master_motivoincumplimiento/editar_motivoincumplimiento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 55,  102 => 54,  84 => 40,  69 => 30,  62 => 26,  38 => 4,  35 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "b2b/altas/master_motivoincumplimiento/editar_motivoincumplimiento.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\b2b\\altas\\master_motivoincumplimiento\\editar_motivoincumplimiento.twig");
    }
}
