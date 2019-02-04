<?php

/* bitacora/agregarBitacora.twig */
class __TwigTemplate_c34551c5c08994cfaa7150bab38aeaff390c43f994bda5ca3a3733eba44fd561 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "bitacora/agregarBitacora.twig", 1);
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
         Bitacora
        <small>Guardar Bitacoras    </small>
    </h1>
    <ol class=\"breadcrumb\">
    <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
    <li class=\"active\"><a class=\"btn btn-social btn-primary\" onclick=\"crearBitacora()\"><i class=\"fa fa-plus\"></i>Guardar Bitacora</a></li>
    </ol>
</section>

    <form name=\"form_registro\" id=\"form_registro\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body\">
                        <table id=\"table_bitacora\" name=\"table_bitacora\" class=\"table table-bordered\">
                            <tr>
                                <td>Detalle Actividad</td>
                                <td><input type=\"text\" name=\"iDetalle\" id=\"iDetalle\" placeholder=\"Ingrese detalle\"</td>
                            </tr>

                            <tr>
                                <td>Descripcion</td>
                                <td><input type=\"text\" name=\"iDescripcion\" id=\"iDescripcion\" placeholder=\"Ingrese descripcion\"></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <a href=\"bitacora/mostrarBitacora\">Listado de Bitacoras</a>
";
    }

    // line 39
    public function block_appScript($context, array $blocks = array())
    {
        // line 40
        echo "    <script src=\"views/app/js/bitacora/bitacora.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "bitacora/agregarBitacora.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 40,  71 => 39,  32 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "bitacora/agregarBitacora.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\bitacora\\agregarBitacora.twig");
    }
}
