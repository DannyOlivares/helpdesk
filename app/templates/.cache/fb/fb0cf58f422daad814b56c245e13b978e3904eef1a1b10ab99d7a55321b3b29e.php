<?php

/* b2b/altas/reporteria.twig */
class __TwigTemplate_530500d60d6d5e786f9cea05245f74fc893072d9009fc42b2a7cda3c01a8bc1d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "b2b/altas/reporteria.twig", 1);
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
        echo "    <section class=\"content-header\">
        <h1>
            REPORTERIA
            <small>ALTAS</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-home\"></i> Home</a></li>
            <li><a href=\"b2b/b2b\">Principal B2B</a></li>
            <li><a href=\"b2b/altas\">Dashboard ALTAS</a></li>
            <li class=\"active\">Reporteria</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-lg-4\">
                <div class=\"box\">
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">SEGUIMIENTO HOY</h3>

                    </div>
                    <div class=\"box-body\">
                        <div class=\"info-box\">
                            <span class=\"info-box-icon bg-aqua\"><i class=\"ion ion-android-archive\"></i></span>
                            <div class=\"info-box-content\">
                                <span class=\"info-box-text\">Gestión</span>
                                <span class=\"info-box-text\">Hoy:</span>
                                <input id='hoy_n1' type='date' value='";
        // line 31
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "' >
                                <p />
                                <a onclick=\"exporta_excel_b2b_Altas_hoy('HOY',document.getElementById('hoy_n1').value)\" ><button class='btn btn-success btn-xs'> Exportar a Excel </button></a>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                        <div class=\"info-box\">
                            <span class=\"info-box-icon bg-aqua\"><i class=\"ion ion-android-archive\"></i></span>
                            <div class=\"info-box-content\">
                                <span class=\"info-box-text\">Agendamiento Cero</span>
                                <span class=\"info-box-text\">Hoy:</span>
                                <input id='hoy_Age_0' type='date' value='";
        // line 41
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "' >
                                <p />
                                <a onclick=\"exporta_excel_b2b_Altas_hoy('HOY_0',document.getElementById('hoy_Age_0').value)\" ><button class='btn btn-success btn-xs'> Exportar a Excel </button></a>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                        <div class=\"info-box\">
                           <span class=\"info-box-icon bg-aqua\"><i class=\"ion ion-android-archive\"></i></span>
                           <div class=\"info-box-content\">
                               <span class=\"info-box-text\">Riesgo Incumplimiento</span>
                               <span class=\"info-box-text\">Bloque actual:</span>
                               <input id='bloque_act_n1' type='text' value='";
        // line 51
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["bloque_act"] ?? null), 0, array(), "array"), "html", null, true);
        echo "' readonly>
                               <p />
                               <a onclick=\"exporta_excel_b2b_Altas_hoy('RIESGO',document.getElementById('bloque_act_n1').value)\" ><button class='btn btn-success btn-xs'> Exportar a Excel </button></a>
                           </div><!-- /.info-box-content -->
                       </div><!-- /.info-box -->

                       <div class=\"info-box\">
                           <span class=\"info-box-icon bg-aqua\"><i class=\"ion ion-android-archive\"></i></span>
                           <div class=\"info-box-content\">
                               <span class=\"info-box-text\">Incumplimiento</span>
                               <span class=\"info-box-text\">Bloque Anterior:</span>
                               <input id='bloque_ant_n1' type='text' value='";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["bloque_ant"] ?? null), 0, array(), "array"), "html", null, true);
        echo "' readonly>
                               <p />
                               <a onclick=\"exporta_excel_b2b_Altas_hoy('INCUMPLIMIENTO',document.getElementById('bloque_ant_n1').value)\" ><button class='btn btn-success btn-xs'> Exportar a Excel </button></a>
                           </div><!-- /.info-box-content -->
                       </div><!-- /.info-box -->
                    </div>
                </div>
            </div>
            <div class=\"col-lg-4\">
                <div class=\"box\">
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">ATRASADO</h3>

                    </div>
                    <div class=\"box-body\">
                        <div class=\"info-box\">
                            <span class=\"info-box-icon bg-aqua\"><i class=\"ion ion-android-archive\"></i></span>
                            <div class=\"info-box-content\">
                                <span class=\"info-box-text\">Revisión Pendiente</span>
                                <span class=\"info-box-text\">Hoy:</span>
                                ";
        // line 82
        $context["modify"] = "1";
        // line 83
        echo "                                ";
        $context["date"] = twig_date_format_filter($this->env, "now", "m/d/Y");
        // line 84
        echo "                                <input id='ayer_n1' type='date' value='";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_modify_filter($this->env, ($context["date"] ?? null), (("-" . ($context["modify"] ?? null)) . " day")), "Y-m-d"), "html", null, true);
        echo "' >
                                <p />
                                <a onclick=\"exporta_excel_b2b_Altas_hoy('ATRASADO_HASTA',document.getElementById('ayer_n1').value)\" ><button class='btn btn-success btn-xs'> Exportar a Excel </button></a>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                </div>
            </div>
            <div class=\"col-lg-4\">
                <div class=\"box\">
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">FINALIZADOS</h3>

                    </div>
                    <div class=\"box-body\">
                        <div class=\"info-box\">
                            <span class=\"info-box-icon bg-aqua\"><i class=\"ion ion-android-archive\"></i></span>
                            <div class=\"info-box-content\">
                                <span class=\"info-box-text\">Resultado Finalizadas</span>
                                <span class=\"info-box-text\">Hoy:</span>
                                ";
        // line 104
        $context["modify"] = "1";
        // line 105
        echo "                                ";
        $context["date"] = twig_date_format_filter($this->env, "now", "m/d/Y");
        // line 106
        echo "                                <input id='finaliza_in' type='date' value='";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_modify_filter($this->env, ($context["date"] ?? null), (("-" . ($context["modify"] ?? null)) . " day")), "Y-m"), "html", null, true);
        echo "-01' >
                                <input id='finaliza_fi' type='date' value='";
        // line 107
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "' >
                                <a onclick=\"exporta_excel_b2b_Altas_hoy('FINALIZADAS',document.getElementById('finaliza_in').value,document.getElementById('finaliza_fi').value)\" ><button class='btn btn-success btn-xs'> Exportar a Excel </button></a>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                </div>
            </div>
        </div><!-- /Nivel 1 -->
    </section>
    <!-- /.content -->

";
    }

    // line 119
    public function block_appScript($context, array $blocks = array())
    {
        // line 120
        echo "    <script src=\"views/app/js/b2b/altas.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "b2b/altas/reporteria.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 120,  180 => 119,  164 => 107,  159 => 106,  156 => 105,  154 => 104,  130 => 84,  127 => 83,  125 => 82,  102 => 62,  88 => 51,  75 => 41,  62 => 31,  32 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "b2b/altas/reporteria.twig", "C:\\xampp\\htdocs\\proyectos\\helpdesk\\app\\templates\\b2b\\altas\\reporteria.twig");
    }
}
