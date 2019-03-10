<?php

/* portal/portal.twig */
class __TwigTemplate_6da69170c8e4186162644daf0348988b58e01287f902c33adb3c5bcd79f7a9eb extends Twig_Template
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
      .fa-eye {
        transition: 0.125s;
      }

      .rotate-left {
        -webkit-transform: rotate(35deg);
        -moz-transform: rotate(35deg);
        -o-transform: rotate(35deg);
        transform: rotate(35deg);
        color: red;
      }
      .rotate-right {
        -webkit-transform: rotate(-35deg);
        -moz-transform: rotate(-35deg);
        -o-transform: rotate(-35deg);
        transform: rotate(-35deg);
        color: blue;
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
        // line 80
        $this->displayBlock('appStylos', $context, $blocks);
        // line 81
        echo "
    <link
      href=\"views/app/images/favicon.ico\"
      rel=\"shortcut icon\"
      type=\"image/x-icon\"
    />
    ";
        // line 88
        echo "    <title>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["config"] ?? null), "site", array()), "name", array()), "html", null, true);
        echo "</title>

    ";
        // line 90
        echo " ";
        $this->displayBlock('appHeader', $context, $blocks);
        // line 93
        echo "  </head>
  <body class=\"hold-transition skin-green sidebar-mini\">
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
        // line 116
        $this->displayBlock('appHead', $context, $blocks);
        echo " ";
        $this->displayBlock('appside', $context, $blocks);
        // line 117
        echo " ";
        // line 118
        echo "      <div class=\"content-wrapper\">
        ";
        // line 119
        $this->displayBlock('appBody', $context, $blocks);
        // line 120
        echo "      </div>

      ";
        // line 122
        echo " ";
        $this->displayBlock('appFooter', $context, $blocks);
        // line 123
        echo " ";
        $this->loadTemplate("portal/resetpass", "portal/portal.twig", 123)->display($context);
        // line 124
        echo "    </div>
    ";
        // line 125
        echo " ";
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["config"] ?? null), "framework", array()), "debug", array())) {
            echo " ";
            // line 127
            echo "    <script src=\"views/app/js/jdev.min.js\"></script>
    ";
        } else {
            // line 128
            echo " ";
            // line 130
            echo "    <script src=\"views/app/template/jquery/dist/jquery.min.js\"></script>
    ";
        }
        // line 132
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
        \$(\".fa-eye\").addClass(\"rotate-left\");
        \$(\".fa-eye\").removeClass(\"rotate-right\");
      }, 125);

      setInterval(function() {
        \$(\".fa-eye\").addClass(\"rotate-right\");
        \$(\".fa-eye\").removeClass(\"rotate-left\");
      }, 250);
    </script>
    <script>
      if( ";
        // line 184
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
        // line 200
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["config"] ?? null), "site", array()), "name", array()), "html", null, true);
        echo "','";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "id_user", array(), "array"), "html", null, true);
        echo "');
    </script>

    ";
        // line 203
        echo " ";
        $this->displayBlock('appScript', $context, $blocks);
        // line 204
        echo "  </body>
</html>
";
    }

    // line 80
    public function block_appStylos($context, array $blocks = array())
    {
        echo " ";
    }

    // line 90
    public function block_appHeader($context, array $blocks = array())
    {
        // line 91
        echo "    <!-- :) -->
    ";
    }

    // line 116
    public function block_appHead($context, array $blocks = array())
    {
        echo " ";
        $this->loadTemplate("portal/header", "portal/portal.twig", 116)->display($context);
        echo " ";
    }

    public function block_appside($context, array $blocks = array())
    {
        // line 117
        echo " ";
        $this->loadTemplate("portal/menu", "portal/portal.twig", 117)->display($context);
        echo " ";
    }

    // line 119
    public function block_appBody($context, array $blocks = array())
    {
        echo " ";
    }

    // line 122
    public function block_appFooter($context, array $blocks = array())
    {
        echo " ";
        $this->loadTemplate("portal/footer", "portal/portal.twig", 122)->display($context);
        echo " ";
    }

    // line 203
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
        return array (  325 => 203,  317 => 122,  311 => 119,  305 => 117,  295 => 116,  290 => 91,  287 => 90,  281 => 80,  275 => 204,  272 => 203,  264 => 200,  245 => 184,  191 => 132,  187 => 130,  185 => 128,  181 => 127,  177 => 125,  174 => 124,  171 => 123,  168 => 122,  164 => 120,  162 => 119,  159 => 118,  157 => 117,  153 => 116,  128 => 93,  125 => 90,  119 => 88,  111 => 81,  109 => 80,  34 => 7,  31 => 5,  26 => 1,);
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
      .fa-eye {
        transition: 0.125s;
      }

      .rotate-left {
        -webkit-transform: rotate(35deg);
        -moz-transform: rotate(35deg);
        -o-transform: rotate(35deg);
        transform: rotate(35deg);
        color: red;
      }
      .rotate-right {
        -webkit-transform: rotate(-35deg);
        -moz-transform: rotate(-35deg);
        -o-transform: rotate(-35deg);
        transform: rotate(-35deg);
        color: blue;
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
  <body class=\"hold-transition skin-green sidebar-mini\">
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
        \$(\".fa-eye\").addClass(\"rotate-left\");
        \$(\".fa-eye\").removeClass(\"rotate-right\");
      }, 125);

      setInterval(function() {
        \$(\".fa-eye\").addClass(\"rotate-right\");
        \$(\".fa-eye\").removeClass(\"rotate-left\");
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

    {# Scripts globales #} {% block appScript %} {% endblock %}
  </body>
</html>
", "portal/portal.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\portal\\portal.twig");
    }
}
