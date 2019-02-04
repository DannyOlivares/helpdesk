<?php

/* b2b/altas/master_motivopendiente/nuevo_motivopendiente.twig */
class __TwigTemplate_22d16998e8e693840bc2d434079d7468b4ff2e8558d2f815d07ca877f6e648f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "b2b/altas/master_motivopendiente/nuevo_motivopendiente.twig", 1);
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
            <small>Agregar Motivo Pendiente</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-home\"></i> Home</a></li>
            <li><a href=\"b2b/b2b\">Principal B2B</a></li>
            <li><a href=\"b2b/altas\">Dashboard ALTAS</a></li>
            <li><a href=\"b2b/listar_motivopendiente\">Listado de Motivos Pendientes</a></li>
            <li class=\"active\">Agregar Nuevo Motivo</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <form id=\"register_motivopendiente_form\" action=\"\" method=\"POST\">
                        <div class=\"box-body col-sm-4\"></div>
                        <div class=\"box-body col-sm-4\">
                            <div class=\"form-group\">
                                Descripción
                                <input class=\"form-control\" name=\"descripcion\" id=\"descripcion\" type=\"text\" placeholder=\"Ingrese Descripción Motivo Pendiente\" required=\"required\"/>
                            </div>
                            <div class=\"form-group\">
                                <button type=\"button\" id=\"register_motivopendiente\" class=\"btn btn-default\">Grabar</button>
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

    // line 43
    public function block_appScript($context, array $blocks = array())
    {
        // line 44
        echo "    <script src=\"views/app/js/b2b/altas.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "b2b/altas/master_motivopendiente/nuevo_motivopendiente.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 44,  80 => 43,  38 => 4,  35 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "b2b/altas/master_motivopendiente/nuevo_motivopendiente.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\b2b\\altas\\master_motivopendiente\\nuevo_motivopendiente.twig");
    }
}
