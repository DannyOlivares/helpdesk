<?php

/* portal/header.twig */
class __TwigTemplate_673d23903d41f061265ac8309efe7eb59e5fb88e353ad9d14d36709fd072354f extends Twig_Template
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
        echo "<header class=\"main-header\">
    <!-- Logo -->
    <a href=\"portal\" class=\"logo\">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class=\"logo-mini\">H<b>D</b>A</span>
        <!-- logo for regular state and mobile devices -->
        <span class=\"logo-lg\">";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["config"] ?? null), "site", array()), "name", array()), "html", null, true);
        echo " <b>ADMIN</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class=\"navbar navbar-static-top\">
        <!-- Sidebar toggle button-->
        <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"push-menu\" role=\"button\">
          <span class=\"sr-only\">Toggle navigation</span>
        </a>
        <div class=\"navbar-custom-menu\" id=\"miDiv\">
            <ul class=\"nav navbar-nav\" >
                <input type=\"HIDDEN\" id=\"contador\">
                <li class=\"dropdown messages-menu\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        <i class=\"fa fa-envelope-o\"></i>
                        <span class=\"label label-success\"></span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li class=\"header\">Tienes 0 mensajes</li>
                        <li>                           
                             <ul class=\"menu\">

                            </ul>
                        </li>
                        <li class=\"footer\"><a href=\"#\">Ver todos los mensajes</a></li>
                    </ul>
                </li>   

                <li class=\"dropdown notifications-menu\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        <i class=\"fa fa-bell-o\"></i>
                        <span class=\"label label-warning\"></span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li class=\"header\">Tienes 0 notificaciones</li>
                        <li>                            
                            <ul class=\"menu\">

                            </ul>
                        </li>
                        <li class=\"footer\"><a href=\"escalamiento/ActividadesPorVencer\">Ver todo</a></li>
                    </ul>
                </li> 
                <!--FIXME:-->
                <li class=\"dropdown notifications-menu\">
                    ";
        // line 51
        if ((($context["data8"] ?? null) || (($context["data10"] ?? null) > 0))) {
            // line 52
            echo "                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" >
                       <i class=\"fa fa-eye activar\"></i>
                       <span class=\"label label-warning\">";
            // line 54
            echo twig_escape_filter($this->env, (($context["data8"] ?? null) + ($context["data10"] ?? null)), "html", null, true);
            echo "</span>
                    </a>
                    ";
        }
        // line 57
        echo "
                     ";
        // line 58
        if ((($context["data8"] ?? null) != 1)) {
            // line 59
            echo "                    <ul class=\"dropdown-menu\">
                        <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;";
            // line 60
            echo twig_escape_filter($this->env, ($context["data8"] ?? null), "html", null, true);
            echo " Actividades por vencer</li>
                        ";
            // line 61
            if ((($context["data10"] ?? null) > 1)) {
                // line 62
                echo "                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;";
                echo twig_escape_filter($this->env, ($context["data10"] ?? null), "html", null, true);
                echo " Compromisos por vencer</li>
                        ";
            } elseif ((            // line 63
($context["data10"] ?? null) == 1)) {
                // line 64
                echo "                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;";
                echo twig_escape_filter($this->env, ($context["data10"] ?? null), "html", null, true);
                echo " Compromiso por vencer</li>
                        ";
            } elseif ((            // line 65
($context["data10"] ?? null) == 0)) {
                // line 66
                echo "                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp; Sin compromisos por vencer</li>
                        ";
            }
            // line 68
            echo "                        <li>                             
                            <ul class=\"menu\">
                            </ul>
                        </li>
                        <li class=\"footer\">
                        </li>
                    </ul>

                    ";
        } elseif ((        // line 76
($context["data8"] ?? null) == 1)) {
            // line 77
            echo "                    <ul class=\"dropdown-menu\">
                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;";
            // line 78
            echo twig_escape_filter($this->env, ($context["data8"] ?? null), "html", null, true);
            echo " Actividad por vencer</li>
                        ";
            // line 79
            if ((($context["data10"] ?? null) > 1)) {
                // line 80
                echo "                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;";
                echo twig_escape_filter($this->env, ($context["data10"] ?? null), "html", null, true);
                echo " Compromisos por vencer</li>
                       ";
            } elseif ((            // line 81
($context["data10"] ?? null) == 1)) {
                // line 82
                echo "                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;";
                echo twig_escape_filter($this->env, ($context["data10"] ?? null), "html", null, true);
                echo " Compromiso por vencer</li>
                       ";
            } elseif ((            // line 83
($context["data10"] ?? null) == 0)) {
                // line 84
                echo "                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp; Sin compromisos por vencer</li>
                        ";
            }
            // line 86
            echo "                        <li>                             
                            <ul class=\"menu\">
                                
                            </ul>
                        </li>
                        <li class=\"footer\">
                        </li>
                    </ul>
                    ";
        } else {
            // line 94
            echo " 
                    <ul class=\"dropdown-menu\">
                        <li class=\"header\" >no hay actividades por vencer</li>
                        ";
            // line 97
            if ((($context["data10"] ?? null) > 1)) {
                // line 98
                echo "                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;";
                echo twig_escape_filter($this->env, ($context["data10"] ?? null), "html", null, true);
                echo " Compromisos por vencer</li>
                        ";
            } elseif ((            // line 99
($context["data10"] ?? null) == 1)) {
                // line 100
                echo "                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;";
                echo twig_escape_filter($this->env, ($context["data10"] ?? null), "html", null, true);
                echo " Compromiso por vencer</li>
                        ";
            } elseif ((            // line 101
($context["data10"] ?? null) == 0)) {
                // line 102
                echo "                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp; Sin compromisos por vencer</li>
                        ";
            }
            // line 104
            echo "                            <li>                             
                        <ul class=\"menu\">
                        </ul>
                        </li>
            
                    </ul>
                    ";
        }
        // line 111
        echo "                </li> 
                <!--FIXME:-->
                 <li class=\"dropdown tasks-menu\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        <i class=\"fa fa-flag-o\"></i>
                        <span class=\"label label-danger\"></span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li class=\"header\">Tienes 0 tareas</li>
                        <li>                         
                             <ul class=\"menu\">                               
                            </ul>
                        </li>
                        <li class=\"footer\">
                            <a href=\"#\">Ver todas las tareas</a>
                        </li>
                    </ul>
                </li> 
                <!-- User Account: style can be found in dropdown.less -->
                <li class=\"dropdown user user-menu\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                      ";
        // line 132
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "foto", array(), "array") == 1)) {
            // line 133
            echo "                        <img src=\"views/app/images/avatares/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name_foto", array(), "array"), "html", null, true);
            echo "\" class=\"user-image\" alt=\"User Image\">
                      ";
        } else {
            // line 135
            echo "                        <img src=\"//ssl.gstatic.com/accounts/ui/avatar_2x.png\" class=\"user-image\" alt=\"User Image\">
                      ";
        }
        // line 137
        echo "
                        <span class=\"hidden-xs\">";
        // line 138
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo "</span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <!-- User image -->
                        <li class=\"user-header\">

                            ";
        // line 144
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "foto", array(), "array") == 1)) {
            // line 145
            echo "                              <img src=\"views/app/images/avatares/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name_foto", array(), "array"), "html", null, true);
            echo "\" class=\"img-circle\" alt=\"User Image\">
                            ";
        } else {
            // line 147
            echo "                              <img src=\"//ssl.gstatic.com/accounts/ui/avatar_2x.png\" class=\"img-circle\" alt=\"User Image\">
                            ";
        }
        // line 149
        echo "                            <p>
                                ";
        // line 150
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "email", array(), "array"), "html", null, true);
        echo "
                                <small></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class=\"user-body\">
                            <div class=\"row\">
                                <div class=\"col-xs-4 text-center\">
                                    <a href=\"portal/perfil_usuario\">Perfil</a>
                                </div>
                                <div class=\"col-xs-4 text-center\">
                                    <a href=\"#\"></a>
                                </div>
                                <div class=\"col-xs-4 text-center\">
                                    <a href=\"#\"></a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class=\"user-footer\">
                            <div class=\"pull-left\">
                                <a href=\"#\" class=\"btn btn-default btn-flat\" data-toggle=\"modal\" data-target=\"#resetpass\">Reset Password</a>
                            </div>
                            <div class=\"pull-right\">
                                <a href=\"logout\" class=\"btn btn-default btn-flat\">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
";
    }

    public function getTemplateName()
    {
        return "portal/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  264 => 150,  261 => 149,  257 => 147,  251 => 145,  249 => 144,  240 => 138,  237 => 137,  233 => 135,  227 => 133,  225 => 132,  202 => 111,  193 => 104,  189 => 102,  187 => 101,  182 => 100,  180 => 99,  175 => 98,  173 => 97,  168 => 94,  157 => 86,  153 => 84,  151 => 83,  146 => 82,  144 => 81,  139 => 80,  137 => 79,  133 => 78,  130 => 77,  128 => 76,  118 => 68,  114 => 66,  112 => 65,  107 => 64,  105 => 63,  100 => 62,  98 => 61,  94 => 60,  91 => 59,  89 => 58,  86 => 57,  80 => 54,  76 => 52,  74 => 51,  27 => 7,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<header class=\"main-header\">
    <!-- Logo -->
    <a href=\"portal\" class=\"logo\">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class=\"logo-mini\">H<b>D</b>A</span>
        <!-- logo for regular state and mobile devices -->
        <span class=\"logo-lg\">{{ config.site.name }} <b>ADMIN</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class=\"navbar navbar-static-top\">
        <!-- Sidebar toggle button-->
        <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"push-menu\" role=\"button\">
          <span class=\"sr-only\">Toggle navigation</span>
        </a>
        <div class=\"navbar-custom-menu\" id=\"miDiv\">
            <ul class=\"nav navbar-nav\" >
                <input type=\"HIDDEN\" id=\"contador\">
                <li class=\"dropdown messages-menu\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        <i class=\"fa fa-envelope-o\"></i>
                        <span class=\"label label-success\"></span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li class=\"header\">Tienes 0 mensajes</li>
                        <li>                           
                             <ul class=\"menu\">

                            </ul>
                        </li>
                        <li class=\"footer\"><a href=\"#\">Ver todos los mensajes</a></li>
                    </ul>
                </li>   

                <li class=\"dropdown notifications-menu\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        <i class=\"fa fa-bell-o\"></i>
                        <span class=\"label label-warning\"></span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li class=\"header\">Tienes 0 notificaciones</li>
                        <li>                            
                            <ul class=\"menu\">

                            </ul>
                        </li>
                        <li class=\"footer\"><a href=\"escalamiento/ActividadesPorVencer\">Ver todo</a></li>
                    </ul>
                </li> 
                <!--FIXME:-->
                <li class=\"dropdown notifications-menu\">
                    {% if data8 or data10 > 0  %}
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" >
                       <i class=\"fa fa-eye activar\"></i>
                       <span class=\"label label-warning\">{{ data8 + data10 }}</span>
                    </a>
                    {% endif  %}

                     {% if data8 != 1  %}
                    <ul class=\"dropdown-menu\">
                        <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;{{ data8 }} Actividades por vencer</li>
                        {% if data10 > 1  %}
                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;{{ data10 }} Compromisos por vencer</li>
                        {% elseif data10 == 1 %}
                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;{{ data10 }} Compromiso por vencer</li>
                        {% elseif data10 == 0 %}
                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp; Sin compromisos por vencer</li>
                        {% endif  %}
                        <li>                             
                            <ul class=\"menu\">
                            </ul>
                        </li>
                        <li class=\"footer\">
                        </li>
                    </ul>

                    {% elseif data8 == 1 %}
                    <ul class=\"dropdown-menu\">
                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;{{ data8 }} Actividad por vencer</li>
                        {% if data10 > 1  %}
                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;{{ data10 }} Compromisos por vencer</li>
                       {% elseif data10 == 1 %}
                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;{{ data10 }} Compromiso por vencer</li>
                       {% elseif data10 == 0 %}
                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp; Sin compromisos por vencer</li>
                        {% endif  %}
                        <li>                             
                            <ul class=\"menu\">
                                
                            </ul>
                        </li>
                        <li class=\"footer\">
                        </li>
                    </ul>
                    {% else %} 
                    <ul class=\"dropdown-menu\">
                        <li class=\"header\" >no hay actividades por vencer</li>
                        {% if data10 > 1  %}
                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;{{ data10 }} Compromisos por vencer</li>
                        {% elseif data10 == 1 %}
                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp;{{ data10 }} Compromiso por vencer</li>
                        {% elseif data10 == 0 %}
                            <li class=\"header\" ><i class=\"fa fa-warning activar\"></i>&nbsp;&nbsp;&nbsp; Sin compromisos por vencer</li>
                        {% endif  %}
                            <li>                             
                        <ul class=\"menu\">
                        </ul>
                        </li>
            
                    </ul>
                    {% endif %}
                </li> 
                <!--FIXME:-->
                 <li class=\"dropdown tasks-menu\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        <i class=\"fa fa-flag-o\"></i>
                        <span class=\"label label-danger\"></span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li class=\"header\">Tienes 0 tareas</li>
                        <li>                         
                             <ul class=\"menu\">                               
                            </ul>
                        </li>
                        <li class=\"footer\">
                            <a href=\"#\">Ver todas las tareas</a>
                        </li>
                    </ul>
                </li> 
                <!-- User Account: style can be found in dropdown.less -->
                <li class=\"dropdown user user-menu\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                      {% if owner_user['foto'] == 1 %}
                        <img src=\"views/app/images/avatares/{{ owner_user['name_foto'] }}\" class=\"user-image\" alt=\"User Image\">
                      {% else %}
                        <img src=\"//ssl.gstatic.com/accounts/ui/avatar_2x.png\" class=\"user-image\" alt=\"User Image\">
                      {% endif %}

                        <span class=\"hidden-xs\">{{ owner_user['name'] }}</span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <!-- User image -->
                        <li class=\"user-header\">

                            {% if owner_user['foto'] == 1 %}
                              <img src=\"views/app/images/avatares/{{ owner_user['name_foto'] }}\" class=\"img-circle\" alt=\"User Image\">
                            {% else %}
                              <img src=\"//ssl.gstatic.com/accounts/ui/avatar_2x.png\" class=\"img-circle\" alt=\"User Image\">
                            {% endif %}
                            <p>
                                {{ owner_user['email'] }}
                                <small></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class=\"user-body\">
                            <div class=\"row\">
                                <div class=\"col-xs-4 text-center\">
                                    <a href=\"portal/perfil_usuario\">Perfil</a>
                                </div>
                                <div class=\"col-xs-4 text-center\">
                                    <a href=\"#\"></a>
                                </div>
                                <div class=\"col-xs-4 text-center\">
                                    <a href=\"#\"></a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class=\"user-footer\">
                            <div class=\"pull-left\">
                                <a href=\"#\" class=\"btn btn-default btn-flat\" data-toggle=\"modal\" data-target=\"#resetpass\">Reset Password</a>
                            </div>
                            <div class=\"pull-right\">
                                <a href=\"logout\" class=\"btn btn-default btn-flat\">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
", "portal/header.twig", "C:\\xampp\\htdocs\\helpdesk\\app\\templates\\portal\\header.twig");
    }
}
