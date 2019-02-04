<?php

/* b2b/altas/master_motivopendiente/editar_motivopendiente.twig */
class __TwigTemplate_0acf2aae5bdc1900602d91f8e6ed35aa51fc4ef9ca1e71684aa729e669c49fe9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "b2b/altas/master_motivopendiente/editar_motivopendiente.twig", 1);
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
            <li class=\"active\">Editar Motivo</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <form id=\"editar_motivopendiente_form\" action=\"\" method=\"POST\">
                        <div class=\"box-body col-sm-4\"></div>
                        <div class=\"box-body col-sm-4\">
                            <input type='hidden' name='id_motivopendiente' id='id_motivopendiente' value='";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_motivopendiente"] ?? null), "id", array()), "html", null, true);
        echo "'/>
                            <div class=\"form-group\">
                                Descripción
                                <input class=\"form-control\" name=\"descripcion\" id=\"descripcion\" type=\"text\" placeholder=\"Ingrese nombre completo de la comuna\" value='";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["db_motivopendiente"] ?? null), "descripcion", array()), "html", null, true);
        echo "' required=\"required\"/>
                            </div>
                            <div class=\"panel-footer text-center\">
                                <button type=\"button\" id=\"update_motivopendiente\" class=\"btn btn-default\">Grabar</button>
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
        return "b2b/altas/master_motivopendiente/editar_motivopendiente.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 44,  86 => 43,  68 => 29,  62 => 26,  38 => 4,  35 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "b2b/altas/master_motivopendiente/editar_motivopendiente.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\b2b\\altas\\master_motivopendiente\\editar_motivopendiente.twig");
    }
}
