<?php

/* evento/agregarEvento.twig */
class __TwigTemplate_e1cab488f37ea3cc00ebd1580bf9c485c4fe7ed6783b089ca461c3c5fc7a74c1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("portal/portal", "evento/agregarEvento.twig", 1);
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
        echo "    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css\">
";
    }

    // line 6
    public function block_appBody($context, array $blocks = array())
    {
        // line 7
        echo "    <section class=\"content-header\">
        <h1>
            Eventos
            <small>Eventos a Registrar</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li>
                <a href=\"#\">
                    <i class=\"fa fa-home\"></i>
                    Home
                </a>
            </li>
            <li>
                <a href=\"evento/bienvenida\">Bienvenida</a>
            </li>
            <li>
                <a href=\"evento/listar_evento\">Listado de Evento</a>
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
                                <a data-toggle='tooltip' data-placement='top' name=\"btnCrearEvento\" id=\"btnCrearEvento\" class='btn btn-success' onclick=\"crearEvento()\">Agregar Evento
                                </a>
                                <input type=\"reset\" class=\"btn btn-warning\">
                            </div>
                            <div class=\"col-md-6\">
                                <label>Ingresado por:</label><input type=\"text\" name=\"nUsuario\" id=\"nUsuario\" class=\"form-control\"  value=\"";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo " \" disabled>
                            </div>
                            <div class=\"col-md-6\">
                                <label>Fecha Evento:</label><input type=\"DATE\" name=\"fecha\" id=\"fecha\" class=\"form-control\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\">
                                <input type=\"text\" name=\"fechaCierre\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\" id=\"fechaCierre\" hidden>
                            </div>
                            <div class=\"col-md-6\">
                                  <label>Descripción:</label>
                                  <input type=\"text\" name=\"iDescripcion\" id=\"iDescripcion\" class=\"form-control\" placeholder=\"Ingrese Descripción\" >
                              </div>
                            <div class=\"col-md-6\" id=\"diveps\" name=\"diveps\">
                                <label>Hora:</label>
                                <input type=\"time\" name=\"hora\" id=\"hora\" class=\"form-control\" VALUE=\"";
        // line 56
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["object"] ?? null), "date", array()), "H:i:s"), "html", null, true);
        echo "\" >
                            </div>

                            <div class=\"col-md-6\" id=\"appVue\">
                                <label>Responsable:</label>
                                <input type=\"text\" class=\"form-control\"  v-model=\"newKeep\" v-on:keyup.enter=\"addKeep\" id=\"id_responsable\" name=\"id_responsable\">
                                <select class=\"responsable_select form-control\" name=\"responsable_select\" id=\"responsable_select\" multiple>
                                        <option class=\"list-group-item\"
                                            v-for=\"(item,index) in lists\" @click=\"eliminarTarea(index)\">
                                            \${ item.keep }
                                        </option>
                                </select>
                                <input type=\"hidden\" name=\"responsable_input\" id=\"responsable_input\"  value=\"responsable_input\">
                            </div>

                            <div class=\"col-md-6\" id=\"appVue1\">
                                <label>Área Contingencia:</label>
                                <input type=\"text\" class=\"form-control\" v-model=\"newKeep1\" id=\"area_contingencia\" v-on:keyup.enter=\"addKeep1\">
                                    <select class=\"areaContingencia_select form-control\" name=\"areaContingencia_select\" id=\"areaContingencia_select\" multiple>
                                        <option class=\"list-group-item\"
                                            v-for=\"(item,index) in lista\"  @click=\"eliminarTarea(index)\">
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

                            <div class=\"col-md-12\">
                                <label>Estado:</label>
                                <select class=\"estado_select form-control\" name=\"estado_select\" id=\"estado_select\">
                                    <option selected=\"true\" disabled>Seleccione estado Evento</option>
                                    <option value=\"1\">Finalizada</option>
                                    <option value=\"2\">Pendiente</option>
                                </select>
                            </div>
                            <div class=\"col-md-12 text-center\">
                                <br>
                                <a data-toggle='tooltip' data-placement='top' name=\"btnCrearEvento\" id=\"btnCrearEvento\" class='btn btn-success' onclick=\"crearEvento()\">Agregar Evento
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

    // line 108
    public function block_appScript($context, array $blocks = array())
    {
        // line 109
        echo "        <script src=\"views/app/js/evento/evento.js\" type=\"text/javascript\"></script>
        <script src=\"//code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>

        <script>
             \$(function(){
               var dbdatos = [
                 ";
        // line 115
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["data"] ?? null))) {
                // line 116
                echo "                 '";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "responsable", array()), "html", null, true);
                echo "',
                 ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 118
        echo "               ];
               \$('#id_responsable').autocomplete({
                 source: dbdatos
               });
             });
             </script>
                </script>
                <script>
                  \$(function(){
                    var dbdatos = [
                      ";
        // line 128
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dato"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            if ((false != ($context["dato"] ?? null))) {
                // line 129
                echo "                      '";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["d"], "areas", array()), "html", null, true);
                echo "',
                      ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 131
        echo "                    ];
                    \$('#area_contingencia').autocomplete({
                      source: dbdatos
                    });
                  });
                  </script>
                </script>

                <script>
                var app = new Vue({
                    el:'#appVue',
                    delimiters: ['\${', '}'],
                    data:{
                        lists:  [
                                    ],
                                    newKeep : '',

                        },
                    methods:    {
                        addKeep: function (){
                            if(this.newKeep == \"\"){
                                \$.alert({
                                    icon: \"fa fa-warning\",
                                    title: \"ERROR\",
                                    content: \"ESTE CAMPO NO PUEDE ESTAR VACÍO\",
                                    type: \"red\",
                                    typeAnimated: true
                                  });
                            }else{
                                var arrValor = new Array ();
                                \$(\"#responsable_select\").find('option').each( function() {
                                    arrValor.push(\$.trim(\$(this).val().toLowerCase()));
                                });
                                var ctrl = jQuery.inArray(this.newKeep.toLowerCase(), arrValor);
                                //console.log(arrValor);
                                if (ctrl !== -1) {
                                    \$.alert({
                                        icon: \"fa fa-warning\",
                                        title: \"ERROR\",
                                        content: \"ESTE VALOR YA SE ENCUENTRA EN EL SELECT\",
                                        type: \"red\",
                                        typeAnimated: true,
                                      });
                                } else {
                                    this.lists.push({keep:this.newKeep, completed: false});
                                    this.newKeep = '';
                                }
                            }
                        },
                        eliminarTarea: function(index){
                            this.lists.splice(index,1);
                        }
                    }
                });

                var app1 = new Vue({
                    el:'#appVue1',
                    delimiters: ['\${', '}'],
                    data:{
                        lista:  [
                                    ],
                                    newKeep1 : '',
                         },
                    methods:    {
                        addKeep1: function (){
                            if(this.newKeep1 == \"\"){
                                \$.alert({
                                    icon: \"fa fa-warning\",
                                    title: \"ERROR\",
                                    content: \"ESTE CAMPO NO PUEDE ESTAR VACÍO\",
                                    type: \"red\",
                                    typeAnimated: true
                                  });
                            }else{
                                var arrValor = new Array ();
                                \$(\"#areaContingencia_select\").find('option').each( function() {
                                    arrValor.push(\$.trim(\$(this).val().toLowerCase()));
                                });
                                var ctrl = jQuery.inArray(this.newKeep1.toLowerCase(), arrValor);
                                //console.log(arrValor);
                                if (ctrl !== -1) {
                                    \$.alert({
                                        icon: \"fa fa-warning\",
                                        title: \"ERROR\",
                                        content: \"ESTE VALOR YA SE ENCUENTRA EN EL SELECT\",
                                        type: \"red\",
                                        typeAnimated: true,
                                      });
                                } else {
                                    this.lista.push({keep1:this.newKeep1, completed: false});
                                    this.newKeep1 = '';
                                }
                            }
                        },
                        eliminarTarea: function(index){
                            this.lista.splice(index,1);
                        }
                    }
                });

                var app2     = new Vue({

                    el:'#app2',
                    delimiters: ['\${', '}'],
                    data:{
                        selected: \"84\",
                        listas:  [],
                        newKeep1:'',
                    },
                    beforeMount: function() {
                        this.listas = JSON.parse(this.\$el.attributes['data-array'].value.replace(/&quot;/ig, '\"'));
                    },
                    methods: {
                        eliminarTarea: function(index){
                            this.listas.splice(index,1);
                        },
                        addKeep1: function(){
                            if(this.newKeep1 == \"\"){
                                \$.alert({
                                    icon: \"fa fa-warning\",
                                    title: \"ERROR\",
                                    content: \"ESTE CAMPO NO PUEDE ESTAR VACÍO\",
                                    type: \"red\",
                                    typeAnimated: true
                                  });
                            } else {
                                var arrValor = new Array ();
                                \$(\"#areaModificada\").find('option').each( function() {
                                    arrValor.push(\$.trim(\$(this).val().toLowerCase()));
                                });
                                var ctrl = jQuery.inArray(this.newKeep1.toLowerCase(), arrValor);
                                //console.log(arrValor);
                                if (ctrl !== -1) {
                                    \$.alert({
                                        icon: \"fa fa-warning\",
                                        title: \"ERROR\",
                                        content: \"ESTE VALOR YA SE ENCUENTRA EN EL SELECT\",
                                        type: \"red\",
                                        typeAnimated: true,
                                      });
                                } else {
                                    this.listas.push({areas:this.newKeep1});
                                    this.newKeep1 = '';
                                }
                            }
                        }
                    }
                });

                var app3     = new Vue({
                    el:'#app3',
                    delimiters: ['\${', '}'],
                    data:{
                        selected: \"84\",
                        lists:  [],
                        newKeep:'',
                    },
                    beforeMount: function() {
                        this.lists = JSON.parse(this.\$el.attributes['data-arr'].value.replace(/&quot;/ig, '\"'));
                    },
                    methods:{
                        eliminarTarea:  function(index){
                            this.lists.splice(index,1);
                        },
                        addKeep: function(){
                            if(this. newKeep == \"\"){
                                \$.alert({
                                    icon: \"fa fa-warning\",
                                    title: \"ERROR\",
                                    content: \"ESTE CAMPO NO PUEDE ESTAR VACÍO\",
                                    type: \"red\",
                                    typeAnimated: true
                                  });
                            }else{
                                var arrValor = new Array ();
                                \$(\"#responsableModificado\").find('option').each( function() {
                                    arrValor.push(\$.trim(\$(this).val().toLowerCase()));
                                });
                                var ctrl = jQuery.inArray(this.newKeep.toLowerCase(), arrValor);
                                //console.log(ctrl);
                                if (ctrl !== -1) {
                                    \$.alert({
                                        icon: \"fa fa-warning\",
                                        title: \"ERROR\",
                                        content: \"ESTE VALOR YA SE ENCUENTRA EN EL SELECT\",
                                        type: \"red\",
                                        typeAnimated: true,
                                      });
                                } else {
                                    this.lists.push({responsable:this.newKeep});
                                    this.newKeep = '';
                                }
                            }
                        }
                    }
                });
                </script>
    ";
    }

    public function getTemplateName()
    {
        return "evento/agregarEvento.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 131,  200 => 129,  195 => 128,  183 => 118,  173 => 116,  168 => 115,  160 => 109,  157 => 108,  101 => 56,  90 => 48,  86 => 47,  80 => 44,  41 => 7,  38 => 6,  33 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "evento/agregarEvento.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\evento\\agregarEvento.twig");
    }
}
