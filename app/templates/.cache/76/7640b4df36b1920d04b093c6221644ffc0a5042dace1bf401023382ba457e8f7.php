<?php

/* bitacora/editar.twig */
class __TwigTemplate_2f148423fd85cd6f0cb34b875ba44c02d04482b11c1f6b6c43a2fcc5a943b320 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "bitacora/editar.twig", 1);
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
        echo "<section class=\"content-header\">
    <h1>
        Bitacora
        <small>Editar Bitacoras</small>
    </h1>
    <ol class=\"breadcrumb\">
    <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
    <li class=\"active\"><a class=\"btn btn-social btn-primary\" onclick=\"editar()\"><i class=\"fa fa-edit\"></i>modificar</a></li>
    </ol>

</section>
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"box box-primary\">
                <div class=\"box-body\">
                    <form name=\"form_regi\" id=\"form_regi\">
                        <table class=\"table table-bordered\">
                            <thead>
                                <th>Descripcion</th>
                                <th>Detalle</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input id=\"descripcion\" name=\"descripcion\"  value=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "descripcion", array()), "html", null, true);
        echo "\"></td>
                                    <td><input id=\"detalle\"     name=\"detalle\"      value=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "detalle", array()), "html", null, true);
        echo "\"></td>
                                </tr>
                            </tbody>
                        </table>
                        <input id=\"idVitacora\"  name=\"idBitacora\"   value=\"";
        // line 31
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["data"] ?? null), "idBitacora", array()), "html", null, true);
        echo "\" type=\"hidden\">
                    </form>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 38
    public function block_appScript($context, array $blocks = array())
    {
        // line 39
        echo "    <script src=\"views/app/js/bitacora/bitacora.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "bitacora/editar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 39,  79 => 38,  68 => 31,  61 => 27,  57 => 26,  32 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "bitacora/editar.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\bitacora\\editar.twig");
    }
}
