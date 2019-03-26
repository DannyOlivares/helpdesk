<?php

/* portal/portal.twig */
class __TwigTemplate_be61ea1f71d59e42b31dd955476876cbfe92bf79b1780c6d4253864708ff51b1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'appStylos' => array($this, 'block_appStylos'),
            'appHeader' => array($this, 'block_appHeader'),
            'appHead' => array($this, 'block_appHead'),
            'appside' => array($this, 'block_appside'),
            'appBody' => array($this, 'block_appBody'),
            'appFooter' => array($this, 'block_appFooter'),
            'appScript' => array($this, 'block_appScript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"es\">
  <head>
    ";
        // line 5
        echo "    ";
        echo $this->env->getExtension('Ocrend\Kernel\Helpers\Functions')->base_assets();
        // line 7
        echo "
    <meta charset=\"utf-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />

    <!-- Tell the browser to be responsive to screen width -->
    <meta
      content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\"
      name=\"viewport\"
    />
    <!-- Bootstrap 3.3.7 -->
    <link
      rel=\"stylesheet\"
      href=\"views/app/template/bootstrap/dist/css/bootstrap.min.css\"
    />
    <!-- Font Awesome -->
    <link
      rel=\"stylesheet\"
      href=\"views/app/template/font-awesome/css/font-awesome.min.css\"
    />
    <!-- Ionicons -->
    <link
      rel=\"stylesheet\"
      href=\"views/app/template/Ionicons/css/ionicons.min.css\"
    />
    <!-- Theme style -->
    <link rel=\"stylesheet\" href=\"views/app/template/AdminLTE.min.css\" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel=\"stylesheet\" href=\"views/app/template/skins/_all-skins.min.css\" />
    <!-- Alertas -->
    <link
      rel=\"stylesheet\"
      href=\"views/app/template/jquery-confirm/jquery-confirm.min.css\"
    />
    <!-- Pace style -->
    <link rel=\"stylesheet\" href=\"views/app/template/PACE/pace.min.css\" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link
      rel=\"stylesheet\"
      href=\"views/app/template/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css\"
    />

    <style>
      .activar {
        transition: 0.125s;
      }

      .rotate-left {
        -webkit-transform: rotate(30deg);
        -moz-transform: rotate(30deg);
        -o-transform: rotate(30deg);
        transform: rotate(30deg);
        color: lightblue;
      }
      .rotate-right {
        -webkit-transform: rotate(-30deg);
        -moz-transform: rotate(-30deg);
        -o-transform: rotate(-30deg);
        transform: rotate(-30deg);
        color:lightgreen;
      }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->

    <!-- Google Font -->
    <!-- <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic\"> -->
    ";
        // line 79
        $this->displayBlock('appStylos', $context, $blocks);
        // line 80
        echo "    <link
      href=\"views/app/images/favicon.ico\"
      rel=\"shortcut icon\"
      type=\"image/x-icon\"
    />
    ";
        // line 86
        echo "    <title>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["config"] ?? null), "site", array()), "name", array()), "html", null, true);
        echo "</title>
    ";
        // line 87
        echo " ";
        $this->displayBlock('appHeader', $context, $blocks);
        // line 90
        echo "  </head>
  <body class=\"hold-transition skin-green sidebar-mini\" onLoad=\"setInterval('contador()',1000);\">
    <!--<body class=\"hold-transition skin-blue sidebar-mini\">-->
    <div class=\"wrapper\">
      <div style=\"display: none;\" id=\"cargador\" align=\"center\">
        <br />
        <label style=\"color:#FFF; background-color:#ABB6BA; text-align:center\"
          >&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label
        >
        <img
          src=\"views/app/images/cargando.gif\"
          align=\"middle\"
          alt=\"cargador\"
        />
        &nbsp;<label style=\"color:#ABB6BA\"
          >Realizando tarea solicitada ...</label
        >
        <br />
        <hr style=\"color:#003\" width=\"30%\" />
        <br />
      </div>
      ";
        // line 111
        $this->displayBlock('appHead', $context, $blocks);
        echo " ";
        $this->displayBlock('appside', $context, $blocks);
        // line 112
        echo " ";
        // line 113
        echo "      <div class=\"content-wrapper\">
        ";
        // line 114
        $this->displayBlock('appBody', $context, $blocks);
        // line 115
        echo "      </div>

      ";
        // line 117
        echo " ";
        $this->displayBlock('appFooter', $context, $blocks);
        // line 118
        echo " ";
        $this->loadTemplate("portal/resetpass", "portal/portal.twig", 118)->display($context);
        // line 119
        echo "    </div>
    ";
        // line 120
        echo " ";
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["config"] ?? null), "framework", array()), "debug", array())) {
            echo " ";
            // line 122
            echo "    <script src=\"views/app/js/jdev.min.js\"></script>
    ";
        } else {
            // line 123
            echo " ";
            // line 125
            echo "    <script src=\"views/app/template/jquery/dist/jquery.min.js\"></script>
    ";
        }
        // line 127
        echo "
    <!-- jQuery UI 1.11.4 -->
    <script src=\"views/app/template/jquery-ui/jquery-ui.min.js\"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      \$.widget.bridge(\"uibutton\", \$.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src=\"views/app/template/bootstrap/dist/js/bootstrap.min.js\"></script>
    <!-- Slimscroll -->
    <script src=\"views/app/template/jquery-slimscroll/jquery.slimscroll.min.js\"></script>
    <!-- FastClick -->
    <script src=\"views/app/template/fastclick/lib/fastclick.js\"></script>
    <!-- AdminLTE App -->
    <script src=\"views/app/template/adminlte.min.js\"></script>
    <!-- AdminLTE for demo purposes -->
    <script src=\"views/app/template/demo.js\"></script>
    <!-- PACE -->
    <script src=\"views/app/template/PACE/pace.min.js\"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src=\"views/app/template/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js\"></script>

    <!-- Alertas -->
    <script src=\"views/app/template/jquery-confirm/jquery-confirm.min.js\"></script>

    <script src=\"views/app/js/portal/portal.js\"></script>
    <script>
      var width = \$(document).width();
      if (width > 770) {
        \$(\"body\").addClass(\"sidebar-collapse\");
      }
      \$(window).resize(function() {
        if (width <= 770) {
          \$(\"body\").removeClass(\"sidebar-collapse\");
        }
      });

      \$(document).ajaxStart(function() {
        Pace.restart();
      });

      setInterval(function() {
        \$(\".activar\").addClass(\"rotate-left\");
        \$(\".activar\").removeClass(\"rotate-right\");
      }, 125);

      setInterval(function() {
        \$(\".activar\").addClass(\"rotate-right\");
        \$(\".activar\").removeClass(\"rotate-left\");
      }, 250);
    </script>
    <script>
      if( ";
        // line 179
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["user_resetpass"] ?? null), "reset", array(), "array"), "html", null, true);
        echo " == 1 ){
          \$.alert({
              icon: \"fa fa-warning\",
              title: \"Contraseña Vencida\",
              content: 'Su contraseña se encuentra vencida y por seguridad es necesario cambiarla.',
              type: \"orange\",
              typeAnimated: true,
              buttons: {
              ok: function() {
                  \$('#resetpass').modal('show');
              }
              }
          });
      }
    </script>
    <script type=\"text/javascript\">
      notificacion_emergente('";
        // line 195
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["config"] ?? null), "site", array()), "name", array()), "html", null, true);
        echo "','";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "id_user", array(), "array"), "html", null, true);
        echo "');
    </script>
    <script type=\"text/javascript\">
      notificacion_emergente('";
        // line 198
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["config"] ?? null), "site", array()), "name", array()), "html", null, true);
        echo "','";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "id_user", array(), "array"), "html", null, true);
        echo "');
    </script>
    <!--FIXME:-->
    <script type=\"text/javascript\">
        var cont = 0;
                function contador(){
                var contador = document.getElementById(\"contador\");
                contador.value = cont;
                cont++;
    
         if(cont == 1){ 
            \$.ajax({
                url: \"api/TotalAlertasActividades\",
                method: \"POST\",
                async: true,
                success: function(response) {
                    \$(\"#miDiv\").load(\"escalamiento/escalamiento #miDiv\");
            }
        });
    } 
  
                 if(cont == 1){ 
            \$.ajax({
              url: \"api/TotalAlertasCompromiso\",
              method: \"POST\",
              async: true,
              success: function(response) {
                \$(\"#miDiv\").load(\"escalamiento/escalamiento #miDiv\");
            }
          });
          }   
  
  
          if(cont % 30== 0){ 
            \$.ajax({
              url: \"api/TotalAlertasActividades\",
              method: \"POST\",
              async: true,
              success: function(response) {
                \$(\"#miDiv\").load(\"escalamiento/escalamiento #miDiv\");
            }
          });
          }    
      }
      </script>
    ";
        // line 243
        echo " ";
        $this->displayBlock('appScript', $context, $blocks);
        // line 244
        echo "
  </body>
</html>
";
    }

    // line 79
    public function block_appStylos($context, array $blocks = array())
    {
        echo " ";
    }

    // line 87
    public function block_appHeader($context, array $blocks = array())
    {
        // line 88
        echo "    <!-- :) -->
    ";
    }

    // line 111
    public function block_appHead($context, array $blocks = array())
    {
        echo " ";
        $this->loadTemplate("portal/header", "portal/portal.twig", 111)->display($context);
        echo " ";
    }

    public function block_appside($context, array $blocks = array())
    {
        // line 112
        echo " ";
        $this->loadTemplate("portal/menu", "portal/portal.twig", 112)->display($context);
        echo " ";
    }

    // line 114
    public function block_appBody($context, array $blocks = array())
    {
        echo " ";
    }

    // line 117
    public function block_appFooter($context, array $blocks = array())
    {
        echo " ";
        $this->loadTemplate("portal/footer", "portal/portal.twig", 117)->display($context);
        echo " ";
    }

    // line 243
    public function block_appScript($context, array $blocks = array())
    {
        echo " ";
    }

    public function getTemplateName()
    {
        return "portal/portal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  371 => 243,  363 => 117,  357 => 114,  351 => 112,  341 => 111,  336 => 88,  333 => 87,  327 => 79,  320 => 244,  317 => 243,  267 => 198,  259 => 195,  240 => 179,  186 => 127,  182 => 125,  180 => 123,  176 => 122,  172 => 120,  169 => 119,  166 => 118,  163 => 117,  159 => 115,  157 => 114,  154 => 113,  152 => 112,  148 => 111,  125 => 90,  122 => 87,  117 => 86,  110 => 80,  108 => 79,  34 => 7,  31 => 5,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"es\">
  <head>
    {# Formato #}
    {{
      base_assets() | raw
    }}
    <meta charset=\"utf-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />

    <!-- Tell the browser to be responsive to screen width -->
    <meta
      content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\"
      name=\"viewport\"
    />
    <!-- Bootstrap 3.3.7 -->
    <link
      rel=\"stylesheet\"
      href=\"views/app/template/bootstrap/dist/css/bootstrap.min.css\"
    />
    <!-- Font Awesome -->
    <link
      rel=\"stylesheet\"
      href=\"views/app/template/font-awesome/css/font-awesome.min.css\"
    />
    <!-- Ionicons -->
    <link
      rel=\"stylesheet\"
      href=\"views/app/template/Ionicons/css/ionicons.min.css\"
    />
    <!-- Theme style -->
    <link rel=\"stylesheet\" href=\"views/app/template/AdminLTE.min.css\" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel=\"stylesheet\" href=\"views/app/template/skins/_all-skins.min.css\" />
    <!-- Alertas -->
    <link
      rel=\"stylesheet\"
      href=\"views/app/template/jquery-confirm/jquery-confirm.min.css\"
    />
    <!-- Pace style -->
    <link rel=\"stylesheet\" href=\"views/app/template/PACE/pace.min.css\" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link
      rel=\"stylesheet\"
      href=\"views/app/template/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css\"
    />

    <style>
      .activar {
        transition: 0.125s;
      }

      .rotate-left {
        -webkit-transform: rotate(30deg);
        -moz-transform: rotate(30deg);
        -o-transform: rotate(30deg);
        transform: rotate(30deg);
        color: lightblue;
      }
      .rotate-right {
        -webkit-transform: rotate(-30deg);
        -moz-transform: rotate(-30deg);
        -o-transform: rotate(-30deg);
        transform: rotate(-30deg);
        color:lightgreen;
      }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->

    <!-- Google Font -->
    <!-- <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic\"> -->
    {% block appStylos %} {% endblock %}
    <link
      href=\"views/app/images/favicon.ico\"
      rel=\"shortcut icon\"
      type=\"image/x-icon\"
    />
    {# Título #}
    <title>{{ config.site.name }}</title>
    {# Extras en el header #} {% block appHeader %}
    <!-- :) -->
    {% endblock %}
  </head>
  <body class=\"hold-transition skin-green sidebar-mini\" onLoad=\"setInterval('contador()',1000);\">
    <!--<body class=\"hold-transition skin-blue sidebar-mini\">-->
    <div class=\"wrapper\">
      <div style=\"display: none;\" id=\"cargador\" align=\"center\">
        <br />
        <label style=\"color:#FFF; background-color:#ABB6BA; text-align:center\"
          >&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label
        >
        <img
          src=\"views/app/images/cargando.gif\"
          align=\"middle\"
          alt=\"cargador\"
        />
        &nbsp;<label style=\"color:#ABB6BA\"
          >Realizando tarea solicitada ...</label
        >
        <br />
        <hr style=\"color:#003\" width=\"30%\" />
        <br />
      </div>
      {% block appHead %} {% include 'portal/header' %} {% endblock %} {% block
      appside %} {% include 'portal/menu' %} {% endblock %} {# Contenido real #}
      <div class=\"content-wrapper\">
        {% block appBody %} {% endblock %}
      </div>

      {# Footer #} {% block appFooter %} {% include 'portal/footer' %} {%
      endblock %} {% include 'portal/resetpass' %}
    </div>
    {# Carga de jQuery #} {% if config.framework.debug %} {# jQuery para ver
    errores de ajax vía consola, no eliminar #}
    <script src=\"views/app/js/jdev.min.js\"></script>
    {% else %} {# jQuery para su plantilla, este puede ser modificado a voluntad
    #}
    <script src=\"views/app/template/jquery/dist/jquery.min.js\"></script>
    {% endif %}

    <!-- jQuery UI 1.11.4 -->
    <script src=\"views/app/template/jquery-ui/jquery-ui.min.js\"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      \$.widget.bridge(\"uibutton\", \$.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src=\"views/app/template/bootstrap/dist/js/bootstrap.min.js\"></script>
    <!-- Slimscroll -->
    <script src=\"views/app/template/jquery-slimscroll/jquery.slimscroll.min.js\"></script>
    <!-- FastClick -->
    <script src=\"views/app/template/fastclick/lib/fastclick.js\"></script>
    <!-- AdminLTE App -->
    <script src=\"views/app/template/adminlte.min.js\"></script>
    <!-- AdminLTE for demo purposes -->
    <script src=\"views/app/template/demo.js\"></script>
    <!-- PACE -->
    <script src=\"views/app/template/PACE/pace.min.js\"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src=\"views/app/template/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js\"></script>

    <!-- Alertas -->
    <script src=\"views/app/template/jquery-confirm/jquery-confirm.min.js\"></script>

    <script src=\"views/app/js/portal/portal.js\"></script>
    <script>
      var width = \$(document).width();
      if (width > 770) {
        \$(\"body\").addClass(\"sidebar-collapse\");
      }
      \$(window).resize(function() {
        if (width <= 770) {
          \$(\"body\").removeClass(\"sidebar-collapse\");
        }
      });

      \$(document).ajaxStart(function() {
        Pace.restart();
      });

      setInterval(function() {
        \$(\".activar\").addClass(\"rotate-left\");
        \$(\".activar\").removeClass(\"rotate-right\");
      }, 125);

      setInterval(function() {
        \$(\".activar\").addClass(\"rotate-right\");
        \$(\".activar\").removeClass(\"rotate-left\");
      }, 250);
    </script>
    <script>
      if( {{ user_resetpass['reset'] }} == 1 ){
          \$.alert({
              icon: \"fa fa-warning\",
              title: \"Contraseña Vencida\",
              content: 'Su contraseña se encuentra vencida y por seguridad es necesario cambiarla.',
              type: \"orange\",
              typeAnimated: true,
              buttons: {
              ok: function() {
                  \$('#resetpass').modal('show');
              }
              }
          });
      }
    </script>
    <script type=\"text/javascript\">
      notificacion_emergente('{{ config.site.name }}','{{ owner_user['id_user'] }}');
    </script>
    <script type=\"text/javascript\">
      notificacion_emergente('{{ config.site.name }}','{{ owner_user['id_user'] }}');
    </script>
    <!--FIXME:-->
    <script type=\"text/javascript\">
        var cont = 0;
                function contador(){
                var contador = document.getElementById(\"contador\");
                contador.value = cont;
                cont++;
    
         if(cont == 1){ 
            \$.ajax({
                url: \"api/TotalAlertasActividades\",
                method: \"POST\",
                async: true,
                success: function(response) {
                    \$(\"#miDiv\").load(\"escalamiento/escalamiento #miDiv\");
            }
        });
    } 
  
                 if(cont == 1){ 
            \$.ajax({
              url: \"api/TotalAlertasCompromiso\",
              method: \"POST\",
              async: true,
              success: function(response) {
                \$(\"#miDiv\").load(\"escalamiento/escalamiento #miDiv\");
            }
          });
          }   
  
  
          if(cont % 30== 0){ 
            \$.ajax({
              url: \"api/TotalAlertasActividades\",
              method: \"POST\",
              async: true,
              success: function(response) {
                \$(\"#miDiv\").load(\"escalamiento/escalamiento #miDiv\");
            }
          });
          }    
      }
      </script>
    {# Scripts globales #} {% block appScript %} {% endblock %}

  </body>
</html>
", "portal/portal.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\portal\\portal.twig");
    }
}
