<?php

/* b2b/altas/master_motivoincumplimiento/nuevo_motivoincumplimiento.twig */
class __TwigTemplate_fb0be2ce68ef4f17937b4f55beca65de915d4ec98dc336ec7d47e502750c67a2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "b2b/altas/master_motivoincumplimiento/nuevo_motivoincumplimiento.twig", 1);
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
            <li class=\"active\">Agregar Nuevo Motivo</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <form id=\"register_motivoincumplimiento_form\" action=\"\" method=\"POST\">
                        <div class=\"box-body col-sm-4\"></div>
                        <div class=\"box-body col-sm-4\">
                            <div class=\"form-group\">
                                Responsable:
                                <select name=\"grupo\" id=\"grupo\" class=\"form-control\">
                                    <option value=\"CLIENTE\">CLIENTE</option>
                                    <option value=\"COMERCIAL\">COMERCIAL</option>
                                    <option value=\"EPS\">EPS</option>
                                    <option value=\"REDES\">REDES</option>
                                    <option value=\"SISTEMA\">SISTEMA</option>
                                </select>
                            </div>
                            <div class=\"form-group\">
                                Descripción:
                                <input class=\"form-control\" name=\"descripcion\" id=\"descripcion\" type=\"text\" placeholder=\"Ingrese Descripción Motivo Incumplimiento\" required=\"required\"/>
                            </div>
                            <div class=\"form-group\">
                                <button type=\"button\" id=\"register_motivoincumplimiento\" class=\"btn btn-default\">Grabar</button>
                                <button type=\"reset\" id=\"limpiar\" class=\"btn btn-default\">Limpiar</button>
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

    // line 53
    public function block_appScript($context, array $blocks = array())
    {
        // line 54
        echo "    <script src=\"views/app/js/b2b/altas.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "b2b/altas/master_motivoincumplimiento/nuevo_motivoincumplimiento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 54,  90 => 53,  38 => 4,  35 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "b2b/altas/master_motivoincumplimiento/nuevo_motivoincumplimiento.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\b2b\\altas\\master_motivoincumplimiento\\nuevo_motivoincumplimiento.twig");
    }
}
