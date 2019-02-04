<?php

/* reagendamiento/reagendamiento.twig */
class __TwigTemplate_4226c90a89aa318fc7675be8940feeed7dd00430c1d461aa71e45585d30f20e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "reagendamiento/reagendamiento.twig", 1);
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
            REAGENDAMIENTO
            <small>Control panel</small>
        </h1>
        <ol class=\"breadcrumb\">
        <li><a href=\"#\"><i class=\"fa fa-home\"></i> Home</a></li>
        <li class=\"active\">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class=\"content\">
    </section>
    <!-- /.content -->

";
    }

    public function getTemplateName()
    {
        return "reagendamiento/reagendamiento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "reagendamiento/reagendamiento.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\reagendamiento\\reagendamiento.twig");
    }
}
