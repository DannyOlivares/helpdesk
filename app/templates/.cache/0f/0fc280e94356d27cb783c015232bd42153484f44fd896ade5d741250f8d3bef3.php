<?php

/* bitacora/agregarEvento.twig */
class __TwigTemplate_5771b8bb0a39eace48a0c3dd8306cead22d2a04b9eb87a88a6298fffb5f2adbd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "bitacora/agregarEvento.twig", 1);
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
            Eventos
            <small>Eventos a Registrar</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home</a>
            </li>
            <li>
                <a href=\"casilleros/listar_casilleros\">Listado de Evento</a>
            </li>
            <li class=\"active\">Agregar Evento</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class=\"content\">
        <form id=\"form_evento\" name=\"form_evento\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Agregar Evento</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col-md-12 text-center\">
                                <a data-toggle='tooltip' data-placement='top' name=\"agregarEvento\" id=\"agregarEvento\" class='btn btn-success' onclick=\"crearEvento()\">Agregar Evento
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Ingresado por:</label><input type=\"text\" name=\"nUsuario\" id=\"nUsuario\" class=\"form-control\"  value=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo " \" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Evento:</label><input type=\"DATE\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Descripción:</label>
                                  <input type=\"text\" name=\"iDescripcion\" id=\"iDescripcion\" class=\"form-control\" placeholder=\"Ingrese Descripción\" >
                              </div>
                            <div class=\"col-md-6\" id=\"diveps\" name=\"diveps\">
                                <label>Hora:</label>
                                <input type=\"time\" name=\"hora\" id=\"hora\" class=\"form-control\" VALUE=\"";
        // line 47
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["object"] ?? null), "date", array()), "H:i:s"), "html", null, true);
        echo "\" >
                            </div>



                            <div class=\"col-md-6\" id=\"appVue\">
                                <label>Responsable:</label>
                                <input type=\"text\" class=\"form-control\"  v-model=\"newKeep\" v-on:keyup.enter=\"addKeep\">
                                <select class=\"responsable_select form-control\" name=\"responsable_select\" id=\"responsable_select\" multiple>
                                        <option class=\"list-group-item\"
                                            v-for=\"(item,index) in lists\" @click=\"eliminarTarea(index)\">
                                            \${ item.keep }
                                        </option>
                                </select>
                                <input type=\"hidden\" name=\"responsable_input\" id=\"responsable_input\"  value=\"\">
                            </div>


                            <div class=\"col-md-6\" id=\"appVue1\">
                                <label>Área Contingencia:</label>
                                <input type=\"text\" class=\"form-control\" v-model=\"newKeep1\" v-on:keyup.enter=\"addKeep1\">
                                    <select class=\"areaContingencia_select form-control\" name=\"areaContingencia_select\" id=\"areaContingencia_select\" multiple>
                                        <option class=\"list-group-item\"
                                            v-for=\"(item,index) in lista\" @click=\"eliminarTarea(index)\">
                                            \${ item.keep1 }
                                        </option>
                                    </select>
                                    <input type=\"hidden\" name=\"areaContingencia_input\" id=\"areaContingencia_input\"  value=\"\" class=\"areaContingencia_input\">
                            </div>

                            <br>
                            <div class=\"col-md-12\">
                                <label>Observación:</label>
                                <textarea name=\"observacion\" id=\"observacion\" cols=\"30\" rows=\"3\" class=\"form-control\"></textarea>
                            </div>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"agregarEvento\" id=\"agregarEvento\" class='btn btn-success'>Agregar Evento
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    ";
    }

    // line 94
    public function block_appScript($context, array $blocks = array())
    {
        // line 95
        echo "        <script src=\"views/app/js/evento/vue.js\"></script>
        <script src=\"views/app/js/evento/evento.js\" type=\"text/javascript\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "bitacora/agregarEvento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 95,  135 => 94,  84 => 47,  73 => 39,  67 => 36,  32 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'portal/portal' %}
{% block appBody %}
    <section class=\"content-header\">
        <h1>
            Eventos
            <small>Eventos a Registrar</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home</a>
            </li>
            <li>
                <a href=\"casilleros/listar_casilleros\">Listado de Evento</a>
            </li>
            <li class=\"active\">Agregar Evento</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class=\"content\">
        <form id=\"form_evento\" name=\"form_evento\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header\">
                            <h3 class=\"box-title\">Agregar Evento</h3>
                        </div>
                        <div class=\"box-body\">
                            <div class=\"col-md-12 text-center\">
                                <a data-toggle='tooltip' data-placement='top' name=\"agregarEvento\" id=\"agregarEvento\" class='btn btn-success' onclick=\"crearEvento()\">Agregar Evento
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Ingresado por:</label><input type=\"text\" name=\"nUsuario\" id=\"nUsuario\" class=\"form-control\"  value=\"{{ owner_user['name'] }} \" >
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Evento:</label><input type=\"DATE\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"{{ \"now\"|date(\"Y-m-d\") }}\">
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Descripción:</label>
                                  <input type=\"text\" name=\"iDescripcion\" id=\"iDescripcion\" class=\"form-control\" placeholder=\"Ingrese Descripción\" >
                              </div>
                            <div class=\"col-md-6\" id=\"diveps\" name=\"diveps\">
                                <label>Hora:</label>
                                <input type=\"time\" name=\"hora\" id=\"hora\" class=\"form-control\" VALUE=\"{{ object.date|date('H:i:s') }}\" >
                            </div>



                            <div class=\"col-md-6\" id=\"appVue\">
                                <label>Responsable:</label>
                                <input type=\"text\" class=\"form-control\"  v-model=\"newKeep\" v-on:keyup.enter=\"addKeep\">
                                <select class=\"responsable_select form-control\" name=\"responsable_select\" id=\"responsable_select\" multiple>
                                        <option class=\"list-group-item\"
                                            v-for=\"(item,index) in lists\" @click=\"eliminarTarea(index)\">
                                            \${ item.keep }
                                        </option>
                                </select>
                                <input type=\"hidden\" name=\"responsable_input\" id=\"responsable_input\"  value=\"\">
                            </div>


                            <div class=\"col-md-6\" id=\"appVue1\">
                                <label>Área Contingencia:</label>
                                <input type=\"text\" class=\"form-control\" v-model=\"newKeep1\" v-on:keyup.enter=\"addKeep1\">
                                    <select class=\"areaContingencia_select form-control\" name=\"areaContingencia_select\" id=\"areaContingencia_select\" multiple>
                                        <option class=\"list-group-item\"
                                            v-for=\"(item,index) in lista\" @click=\"eliminarTarea(index)\">
                                            \${ item.keep1 }
                                        </option>
                                    </select>
                                    <input type=\"hidden\" name=\"areaContingencia_input\" id=\"areaContingencia_input\"  value=\"\" class=\"areaContingencia_input\">
                            </div>

                            <br>
                            <div class=\"col-md-12\">
                                <label>Observación:</label>
                                <textarea name=\"observacion\" id=\"observacion\" cols=\"30\" rows=\"3\" class=\"form-control\"></textarea>
                            </div>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"agregarEvento\" id=\"agregarEvento\" class='btn btn-success'>Agregar Evento
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    {% endblock %}
    {% block appScript %}
        <script src=\"views/app/js/evento/vue.js\"></script>
        <script src=\"views/app/js/evento/evento.js\" type=\"text/javascript\"></script>
    {% endblock %}
", "bitacora/agregarEvento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\bitacora\\agregarEvento.twig");
    }
}
