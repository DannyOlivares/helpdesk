<?php

/* escalamiento/escalamiento.twig */
class __TwigTemplate_266d19d624eabe4f7231e125394eed61b8e1a4757b574f4fe6bbd23719fe2a68 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "escalamiento/escalamiento.twig", 1);
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
            Escalamiento
            <small>Resumen Actividades</small>
        </h1>
        <ol class=\"breadcrumb\">
        <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
        <li class=\"active\">Dashboard</li>
        </ol>
    </section>

    <section class=\"content\">
        <div class=\"row\">
                <div class=\"col col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header with-border\">
                            <h3 class=\"box-title\">Mirada Global</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Gestionadas</h3>
                                    </div>
                                    <div class=\"box-body\">
                                        <table class=\"table\">
                                            <thead>
                                                <th>Estado</th>
                                                <th class=\"text-center\">Cantidad</th>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>
                                                            ñfgkñd
                                                        </td>
                                                        <td class=\"text-right\">kjdshf</td>
                                                        ";
        // line 39
        $context["total_pendiente"] = (($context["total_pendiente"] ?? null) + twig_get_attribute($this->env, $this->getSourceContext(), ($context["row"] ?? null), "q", array(), "array"));
        // line 40
        echo "                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Gestionadas: ";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data1"] ?? null), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>
                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Pendientes</h3>
                                    </div>
                                        <div class=\"box-body\">
                                            <table class=\"table\">
                                                <thead>
                                                    <th>Estado</th>
                                                    <th class=\"text-center\">Cantidad</th>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td>
                                                                ñfgkñd
                                                            </td>
                                                            <td class=\"text-right\">kjdshf</td>
                                                            ";
        // line 66
        $context["total_pendiente"] = (($context["total_pendiente"] ?? null) + twig_get_attribute($this->env, $this->getSourceContext(), ($context["row"] ?? null), "q", array(), "array"));
        // line 67
        echo "                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    <div class=\"box-footer\">
                                        Total Pendientes: ";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data2"] ?? null), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>

                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Seguimiento</h3>
                                    </div>
                                    <div class=\"box-body\">
                                        <table class=\"table\">
                                            <thead>
                                                <th>Estado</th>
                                                <th class=\"text-center\">Cantidad</th>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>
                                                            ñfgkñd
                                                        </td>
                                                        <td class=\"text-right\">kjdshf</td>

                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Seguimiento: ";
        // line 100
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data3"] ?? null), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>

                            <div class=\"col col-md-3\">
                                <div class=\"box\">
                                    <div class=\"box-header with-border\">
                                        <h3 class=\"box-title\">Resumen Actividades Seguimiento</h3>
                                    </div>
                                    <div class=\"box-body\">
                                        <table class=\"table\">
                                            <thead>
                                                <th>Estado</th>
                                                <th class=\"text-center\">Cantidad</th>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>
                                                            ñfgkñd
                                                        </td>
                                                        <td class=\"text-right\">kjdshf</td>

                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class=\"box-footer\">
                                        Total Finalizadas Hoy: ";
        // line 128
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["data3"] ?? null), 0, array(), "array"), 0, array(), "array"), "html", null, true);
        echo "
                                    </div>
                                </div>
                            </div>
                        </div>
                        hola
                    </div>

                </div>

            </div>

    </section>
    <!-- /.content -->

";
    }

    public function getTemplateName()
    {
        return "escalamiento/escalamiento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 128,  142 => 100,  111 => 72,  104 => 67,  102 => 66,  78 => 45,  71 => 40,  69 => 39,  31 => 3,  28 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "escalamiento/escalamiento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\escalamiento\\escalamiento.twig");
    }
}
