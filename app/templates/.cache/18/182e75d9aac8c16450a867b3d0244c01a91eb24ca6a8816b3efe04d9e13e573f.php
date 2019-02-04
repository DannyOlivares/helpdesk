<?php

/* evento/bienvenida.twig */
class __TwigTemplate_f68f36e86307633704017b790c994b9a2cbe3cac2cf2bd6dce698cdf3e27ea90 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "evento/bienvenida.twig", 1);
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
        // line 3
        echo "<link rel=\"stylesheet\" href=\"views\\app\\css\\misEstilos.css\">
    <link href=\"views/app/datedropper.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"views/app/template/dateDropper/datedropper.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"views/app/template/dateDropper/miDateDropper.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link rel=\"views/app/template/dateDropper/datedropper.js\" href=\"/css/master.css\">
    <script src=\"jquery.min.js\"></script>

";
    }

    // line 11
    public function block_appBody($context, array $blocks = array())
    {
        // line 12
        echo "

<section class=\"content-header menu\" id=\"menu\" >
    <h1>
        Eventos
        <small>Detalle de Evento</small>
    </h1>
    <ol class=\"breadcrumb\">
        <li>
            <a href=\"#\">
                <i class=\"fa fa-home\"></i>
                Home</a>
        </li>
        <li class=\"active\">Bienvenida</li>
        <li>
            <a href=\"evento/listar_evento\">Listado de Eventos</a>
        </li>
        <li class=\"active\">
            <!-- <a href=\"evento/agregarEvento\" class=\"btn btn-primary\">Agregar Evento</a> -->
            <button type=\"button\" name=\"button\" class=\"btn btn-primary\" onclick= location.href='evento/agregarEvento'>Agregar Evento</button>
        </li>
    </ol>
</section>
<div class=\"row\">
            <div class=\"col col-md-12\">
                <div class=\"box\">
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Resumen Totalizado Eventos</h3>
                    </div>
                    <div class=\"box-body\">
                        <div class=\"col col-md-12\">
                            <div class=\"box\">
                                <div class=\"box-header with-border\">
                                    <h3 class=\"box-title\">Resumen por Estados</h3>
                                </div>
                                <div class=\"box-body\">
                                    <table class=\"table\">
                                        <thead>
                                            <th>Estado</th>
                                            <th class=\"text-left\">Cantidad</th>
                                            <th>Fecha a Mostrar</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Finalizado</td>
                                                <td>";
        // line 57
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["fin"] ?? null), 0, array(), "array"), "html", null, true);
        echo "</td>
                                                <td><input onchange=\"obtenerEventosFecha()\" type=\"text\" class=\"text-center\" data-min-year='2018'  data-modal=\"false\" data-fx=\"true\" data-lang=\"es\" data-format=\"Y/m/d\" data-large-mode=\"true\" data-large-default=\"true\" data-lock=\"to\" class=\"fechaMostrar\" id=\"fechaMostrar\"/></td>
                                            </tr>
                                            <tr>
                                                <td>Pendiente</td>
                                                <td>";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["pen"] ?? null), 0, array(), "array"), "html", null, true);
        echo "</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
";
    }

    // line 75
    public function block_appScript($context, array $blocks = array())
    {
        // line 76
        echo "<script src=\"views/app/js/evento/evento.js\" type=\"text/javascript\"></script>
<script src=\"views/app/template/dateDropper/datedropper.js\"></script>

<script src=\"jquery.min.js\"></script>
<script>
    \$(\"#dataordenes\").dataTable({
        \"language\": {
            \"search\": \"Buscar:\",
            \"zeroRecords\": \"No hay datos para mostrar\",
            \"info\": \"Mostrando _END_ Registros, de un total de _TOTAL_ \",
            \"loadingRecords\": \"Cargando...\",
            \"processing\": \"Procesando...\",
            \"infoEmpty\": \"No hay entradas para mostrar\",
            \"lengthMenu\": \"Mostrar _MENU_ Filas\",
            \"paginate\": {
                \"first\": \"Primera\",
                \"last\": \"Ultima\",
                \"next\": \"Siguiente\",
                \"previous\": \"Anterior\"
            }
        },
        \"autoWidth\": true,
        \"scrollX\": true,
        \"bSort\": false
    });
</script>
<script>
\$('input').dateDropper();
</script>

</script>
";
    }

    public function getTemplateName()
    {
        return "evento/bienvenida.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 76,  118 => 75,  102 => 62,  94 => 57,  47 => 12,  44 => 11,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appStylos %}
<link rel=\"stylesheet\" href=\"views\\app\\css\\misEstilos.css\">
    <link href=\"views/app/datedropper.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"views/app/template/dateDropper/datedropper.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"views/app/template/dateDropper/miDateDropper.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link rel=\"views/app/template/dateDropper/datedropper.js\" href=\"/css/master.css\">
    <script src=\"jquery.min.js\"></script>

{% endblock %}
{% block appBody %}


<section class=\"content-header menu\" id=\"menu\" >
    <h1>
        Eventos
        <small>Detalle de Evento</small>
    </h1>
    <ol class=\"breadcrumb\">
        <li>
            <a href=\"#\">
                <i class=\"fa fa-home\"></i>
                Home</a>
        </li>
        <li class=\"active\">Bienvenida</li>
        <li>
            <a href=\"evento/listar_evento\">Listado de Eventos</a>
        </li>
        <li class=\"active\">
            <!-- <a href=\"evento/agregarEvento\" class=\"btn btn-primary\">Agregar Evento</a> -->
            <button type=\"button\" name=\"button\" class=\"btn btn-primary\" onclick= location.href='evento/agregarEvento'>Agregar Evento</button>
        </li>
    </ol>
</section>
<div class=\"row\">
            <div class=\"col col-md-12\">
                <div class=\"box\">
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Resumen Totalizado Eventos</h3>
                    </div>
                    <div class=\"box-body\">
                        <div class=\"col col-md-12\">
                            <div class=\"box\">
                                <div class=\"box-header with-border\">
                                    <h3 class=\"box-title\">Resumen por Estados</h3>
                                </div>
                                <div class=\"box-body\">
                                    <table class=\"table\">
                                        <thead>
                                            <th>Estado</th>
                                            <th class=\"text-left\">Cantidad</th>
                                            <th>Fecha a Mostrar</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Finalizado</td>
                                                <td>{{fin[0]}}</td>
                                                <td><input onchange=\"obtenerEventosFecha()\" type=\"text\" class=\"text-center\" data-min-year='2018'  data-modal=\"false\" data-fx=\"true\" data-lang=\"es\" data-format=\"Y/m/d\" data-large-mode=\"true\" data-large-default=\"true\" data-lock=\"to\" class=\"fechaMostrar\" id=\"fechaMostrar\"/></td>
                                            </tr>
                                            <tr>
                                                <td>Pendiente</td>
                                                <td>{{pen[0]}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
{% endblock %}

{% block appScript %}
<script src=\"views/app/js/evento/evento.js\" type=\"text/javascript\"></script>
<script src=\"views/app/template/dateDropper/datedropper.js\"></script>

<script src=\"jquery.min.js\"></script>
<script>
    \$(\"#dataordenes\").dataTable({
        \"language\": {
            \"search\": \"Buscar:\",
            \"zeroRecords\": \"No hay datos para mostrar\",
            \"info\": \"Mostrando _END_ Registros, de un total de _TOTAL_ \",
            \"loadingRecords\": \"Cargando...\",
            \"processing\": \"Procesando...\",
            \"infoEmpty\": \"No hay entradas para mostrar\",
            \"lengthMenu\": \"Mostrar _MENU_ Filas\",
            \"paginate\": {
                \"first\": \"Primera\",
                \"last\": \"Ultima\",
                \"next\": \"Siguiente\",
                \"previous\": \"Anterior\"
            }
        },
        \"autoWidth\": true,
        \"scrollX\": true,
        \"bSort\": false
    });
</script>
<script>
\$('input').dateDropper();
</script>

</script>
{% endblock %}
", "evento/bienvenida.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\evento\\bienvenida.twig");
    }
}
