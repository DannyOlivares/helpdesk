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
                <li class=\"dropdown notifications-menu\">
                    ";
        // line 49
        if ((($context["data6"] ?? null) > 1)) {
            // line 50
            echo "                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" onclick=\"\" title=\"Hay ";
            echo twig_escape_filter($this->env, ($context["data6"] ?? null), "html", null, true);
            echo " Actividades por vencer\">
                         <i class=\"fa fa-eye activar\"></i>
                        ";
            // line 53
            echo "                        <span class=\"label label-warning\">";
            echo twig_escape_filter($this->env, ($context["data6"] ?? null), "html", null, true);
            echo "</span>
                    </a>
                    <ul class=\"dropdown-menu\">
                          <li class=\"header\" >Hay ";
            // line 56
            echo twig_escape_filter($this->env, ($context["data6"] ?? null), "html", null, true);
            echo " actividades por vencer</li>
                        <li>                             
                            <ul class=\"menu\">                               
                            </ul>
                        </li>
                        <li class=\"footer\">
                        </li>
                    </ul>
                    ";
        } elseif ((        // line 64
($context["data6"] ?? null) == 1)) {
            // line 65
            echo "                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" onclick=\"\" title=\"Hay ";
            echo twig_escape_filter($this->env, ($context["data6"] ?? null), "html", null, true);
            echo " Actividad por vencer\">
                         <i class=\"fa fa-eye activar\"></i>
                        ";
            // line 68
            echo "                        <span class=\"label label-warning\">";
            echo twig_escape_filter($this->env, ($context["data6"] ?? null), "html", null, true);
            echo "</span>
                    </a>
                    <ul class=\"dropdown-menu\">
                          <li class=\"header\" >Hay ";
            // line 71
            echo twig_escape_filter($this->env, ($context["data6"] ?? null), "html", null, true);
            echo " actividad por vencer</li>
                        <li>                             
                            <ul class=\"menu\">
                            </ul>
                        </li>
                        <li class=\"footer\">
                        </li>
                    </ul>
                    ";
        } else {
            // line 79
            echo " 

                   <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" onclick=cargarActividades(); title=\"No hay actividades por vencer\"> 
                        <i class=\"fa fa-eye\"></i>
                        <span class=\"label label-warning\" ></span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li class=\"header\" >no hay actividades por vencer</li>
                        <li>                             
                            <ul class=\"menu\">
                            </ul>
                        </li>
                    </ul>
                    ";
        }
        // line 93
        echo "                </li> 
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
        // line 113
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "foto", array(), "array") == 1)) {
            // line 114
            echo "                        <img src=\"views/app/images/avatares/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name_foto", array(), "array"), "html", null, true);
            echo "\" class=\"user-image\" alt=\"User Image\">
                      ";
        } else {
            // line 116
            echo "                        <img src=\"//ssl.gstatic.com/accounts/ui/avatar_2x.png\" class=\"user-image\" alt=\"User Image\">
                      ";
        }
        // line 118
        echo "
                        <span class=\"hidden-xs\">";
        // line 119
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name", array(), "array"), "html", null, true);
        echo "</span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <!-- User image -->
                        <li class=\"user-header\">

                            ";
        // line 125
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "foto", array(), "array") == 1)) {
            // line 126
            echo "                              <img src=\"views/app/images/avatares/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["owner_user"] ?? null), "name_foto", array(), "array"), "html", null, true);
            echo "\" class=\"img-circle\" alt=\"User Image\">
                            ";
        } else {
            // line 128
            echo "                              <img src=\"//ssl.gstatic.com/accounts/ui/avatar_2x.png\" class=\"img-circle\" alt=\"User Image\">
                            ";
        }
        // line 130
        echo "                            <p>
                                ";
        // line 131
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
        return array (  202 => 131,  199 => 130,  195 => 128,  189 => 126,  187 => 125,  178 => 119,  175 => 118,  171 => 116,  165 => 114,  163 => 113,  141 => 93,  125 => 79,  113 => 71,  106 => 68,  100 => 65,  98 => 64,  87 => 56,  80 => 53,  74 => 50,  72 => 49,  27 => 7,  19 => 1,);
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
                <li class=\"dropdown notifications-menu\">
                    {% if data6 > 1  %}
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" onclick=\"\" title=\"Hay {{ data6 }} Actividades por vencer\">
                         <i class=\"fa fa-eye activar\"></i>
                        {# <i class=\"fa fa-warning activar\" style=\"font-size:12px;color:red\"></i> #}
                        <span class=\"label label-warning\">{{ data6 }}</span>
                    </a>
                    <ul class=\"dropdown-menu\">
                          <li class=\"header\" >Hay {{ data6 }} actividades por vencer</li>
                        <li>                             
                            <ul class=\"menu\">                               
                            </ul>
                        </li>
                        <li class=\"footer\">
                        </li>
                    </ul>
                    {% elseif data6 == 1 %}
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" onclick=\"\" title=\"Hay {{ data6 }} Actividad por vencer\">
                         <i class=\"fa fa-eye activar\"></i>
                        {# <i class=\"fa fa-warning activar\" style=\"font-size:12px;color:red\"></i> #}
                        <span class=\"label label-warning\">{{ data6 }}</span>
                    </a>
                    <ul class=\"dropdown-menu\">
                          <li class=\"header\" >Hay {{ data6 }} actividad por vencer</li>
                        <li>                             
                            <ul class=\"menu\">
                            </ul>
                        </li>
                        <li class=\"footer\">
                        </li>
                    </ul>
                    {% else %} 

                   <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" onclick=cargarActividades(); title=\"No hay actividades por vencer\"> 
                        <i class=\"fa fa-eye\"></i>
                        <span class=\"label label-warning\" ></span>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li class=\"header\" >no hay actividades por vencer</li>
                        <li>                             
                            <ul class=\"menu\">
                            </ul>
                        </li>
                    </ul>
                    {% endif %}
                </li> 
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
