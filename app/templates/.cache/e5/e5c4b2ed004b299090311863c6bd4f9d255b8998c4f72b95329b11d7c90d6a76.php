<?php

/* error/error.twig */
class __TwigTemplate_a4334e49a4d44fee47a6567d7afae25994abbbf7b97596a519304950c0199078 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("overall/layout", "error/error.twig", 1);
        $this->blocks = array(
            'appBody' => array($this, 'block_appBody'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "overall/layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_appBody($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"container\">
        <div class=\"ocrend ocrend-as-html\">
            <table class=\"ocrend-details\">
                <thead class=\"ocrend-head\"><tr><th>
                    <h3 class=\"ocrend-class\">
                        <span>ERROR 404</span>
                    </h3>
                </th></tr></thead>
                <tbody>
                    <tr>
                        <td>
                            <span class=\"block ocrend-file-path\">El controlador solicitado no ha sido encontrado.</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
   </div>
";
    }

    public function getTemplateName()
    {
        return "error/error.twig";
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
        return new Twig_Source("", "error/error.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\error\\error.twig");
    }
}
