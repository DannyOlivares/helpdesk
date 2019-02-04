<?php

/* reagendamiento/modal_visualizar.twig */
class __TwigTemplate_00ad9ca63bfac91c7e1496dc59830669cf8f65afda4ea4f9b76c4b27ba6c36b4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "    <div id=\"modal_visualizar\" class=\"modal fade\" role=\"dialog\">
        <div class=\"modal-dialog modal-lg\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                    <h4 class=\"modal-title\">Ordenes Cargadas</h4>
                </div>
                <div class=\"modal-body \">
                    <table id='tblordenes' name='tblordenes' class='table table-bordered'>
                        <thead>
                            <th>ID_ORDEN</th>
                            <th>NUMERO_ORDEN</th>
                            <th>RUT_CLIENTE</th>
                            <th>ACTIVIDAD</th>
                            <th>COMUNA</th>
                            <th>CREACION</th>
                            <th>DIAS</th>
                        </thead>
                    </table>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "reagendamiento/modal_visualizar.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "reagendamiento/modal_visualizar.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\reagendamiento\\modal_visualizar.twig");
    }
}
