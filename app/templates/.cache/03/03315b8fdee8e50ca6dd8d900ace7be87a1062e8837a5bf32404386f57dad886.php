<?php

/* reagendamiento/informes/reporte_gestiones.twig */
class __TwigTemplate_b3183f0a3e010f2769dff9a9133acf5a40961b9764d7daf572e7f4228d2eea38 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "reagendamiento/informes/reporte_gestiones.twig", 1);
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
        echo "    <div class=\"row\">
        <div class=\"col-lg-12\">
            <section class=\"content-header\">
                <h1>
                    Informes
                    <small>Produccion Ejecutivos</small>
                    <div class=\"pull-right col-lg-7\">
                      <div class=\"pull-right\">
                        <h4>
                          <label>Fecha Desde:
                          </label>
                          <label>&nbsp;</label>
                          <input type=\"date\" id=\"textdesde\" name=\"textdesde\" value='";
        // line 15
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "'>
                          <label>&nbsp;</label>
                          <label>Fecha Hasta:
                          </label>
                          <label>&nbsp;</label>
                          <input type=\"date\" id=\"texthasta\" name=\"texthasta\" value='";
        // line 20
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "'>
                          <label>&nbsp;</label>
                          <button type=\"button\" name=\"btnbuscar\" id=\"btnbuscar\" onclick=\"revisar_produccion_ejecutivos()\" class=\"btn btn-primary\">Aplicar Filtrar</button>
                          <button type=\"button\" name=\"btngestiones\" id=\"btngestiones\" onclick=\"descargargestiones()\" class=\"btn btn-success\">Descargar Gestiones</button>
                        </h4>
                      </div>
                    </div>
                </h1>
            </section>
        </div>
    </div>
      <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"col-lg-12\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Datos</h3>
                        </div>
                        <div class=\"box-body\">
                            <div id=\"tblgestiones\" name=\"tblgestiones\"></div>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-12\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Grafica</h3>
                        </div>
                        <div class=\"box-body\">
                            <div id=\"tblgestiongraficos\" name=\"tblgestiongraficos\"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    // line 58
    public function block_appScript($context, array $blocks = array())
    {
        // line 59
        echo "  <script src=\"views/app/template/highcharts/highstock.js\"></script>
  <script src=\"views/app/template/highcharts/exporting.js\"></script>
  <script src=\"views/app/js/reagendamiento/reagendamiento.js\"></script>
  <script>
      \$(document).ready(function() {
          revisar_produccion_ejecutivos();
      });
  </script>
";
    }

    public function getTemplateName()
    {
        return "reagendamiento/informes/reporte_gestiones.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 59,  96 => 58,  54 => 20,  46 => 15,  32 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "reagendamiento/informes/reporte_gestiones.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\reagendamiento\\informes\\reporte_gestiones.twig");
    }
}
