<?php

/* ::manage.html.twig */
class __TwigTemplate_e92555080ff71ea881190db2bbbb555131d716b4eac3dff4931315947d424ae3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e18b59846f5d4968c373867280b92b92114925721340215259bc88115f39f1c3 = $this->env->getExtension("native_profiler");
        $__internal_e18b59846f5d4968c373867280b92b92114925721340215259bc88115f39f1c3->enter($__internal_e18b59846f5d4968c373867280b92b92114925721340215259bc88115f39f1c3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::manage.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "Manage - Univers Styl</title>
    <meta charset=\"utf-8\"/>
    <link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==\" crossorigin=\"anonymous\">
    <!--<link rel=\"stylesheet\" href=\"bootstrap-3.3.4/css/bootstrap.min.css\"/>-->
    ";
        // line 8
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "33a7130_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_33a7130_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/33a7130_part_1_styles_1.css");
            // line 10
            echo "      <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" />
    ";
        } else {
            // asset "33a7130"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_33a7130") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/33a7130.css");
            echo "      <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" />
    ";
        }
        unset($context["asset_url"]);
        // line 12
        echo "
    ";
        // line 13
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "bcbb3cd_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_bcbb3cd_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/bcbb3cd_modernizr.custom.14671_1.js");
            // line 15
            echo "      <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "bcbb3cd"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_bcbb3cd") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/bcbb3cd.js");
            echo "      <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 17
        echo "
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />


  </head>
  <body class=\"body\">
    <header>
      <nav class=\"navbar navbar-default\">
        <div class=\"container-fluid\">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
              <span class=\"sr-only\">Toggle navigation</span>
              <span class=\"icon-bar\"></span>
              <span class=\"icon-bar\"></span>
              <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("manage_index");
        echo "\">Manage - Univers Styl</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
            <ul class=\"nav navbar-nav\">
              <li><a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("manage_index");
        echo "\">Articles</a></li>
              <li class=\"dropdown\">
                <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Catalogue <span class=\"caret\"></span></a>
                <ul class=\"dropdown-menu\">
                  <li><a href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("product_index_manage");
        echo "\">Produits</a></li>
                  <li><a href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("category_index_manage");
        echo "\">Catégories</a></li>
                  <li><a href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("property_index_manage");
        echo "\">Propriétés</a></li>
                </ul>
              </li>
              <li><a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("us_news_index");
        echo "\">Actualités</a></li>
              <li><a href=\"";
        // line 50
        echo $this->env->getExtension('routing')->getPath("image_index");
        echo "\">Ressources</a></li>
              <li><a href=\"";
        // line 51
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">Deconnexion</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
      ";
        // line 57
        $this->displayBlock('body', $context, $blocks);
        // line 58
        echo "
      <script src=\"//code.jquery.com/jquery-1.11.3.min.js\"></script>
      <script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
      <script src=\"";
        // line 61
        echo $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>
      <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js\" integrity=\"sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==\" crossorigin=\"anonymous\"></script>
      ";
        // line 63
        $this->displayBlock('javascripts', $context, $blocks);
        // line 64
        echo "  </body>
</html>
";
        
        $__internal_e18b59846f5d4968c373867280b92b92114925721340215259bc88115f39f1c3->leave($__internal_e18b59846f5d4968c373867280b92b92114925721340215259bc88115f39f1c3_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_9edceaffd1087edfd05a30f5056a6e992384a00b846be95f37871b971ab9956a = $this->env->getExtension("native_profiler");
        $__internal_9edceaffd1087edfd05a30f5056a6e992384a00b846be95f37871b971ab9956a->enter($__internal_9edceaffd1087edfd05a30f5056a6e992384a00b846be95f37871b971ab9956a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_9edceaffd1087edfd05a30f5056a6e992384a00b846be95f37871b971ab9956a->leave($__internal_9edceaffd1087edfd05a30f5056a6e992384a00b846be95f37871b971ab9956a_prof);

    }

    // line 57
    public function block_body($context, array $blocks = array())
    {
        $__internal_63f2333e440ba86b35bb4a0cd31a029452fb3e6c455599159244305b6dac4912 = $this->env->getExtension("native_profiler");
        $__internal_63f2333e440ba86b35bb4a0cd31a029452fb3e6c455599159244305b6dac4912->enter($__internal_63f2333e440ba86b35bb4a0cd31a029452fb3e6c455599159244305b6dac4912_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_63f2333e440ba86b35bb4a0cd31a029452fb3e6c455599159244305b6dac4912->leave($__internal_63f2333e440ba86b35bb4a0cd31a029452fb3e6c455599159244305b6dac4912_prof);

    }

    // line 63
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_5379fe21ad939ece31e3b085d6911326b64d2e760083ded506d171354841d954 = $this->env->getExtension("native_profiler");
        $__internal_5379fe21ad939ece31e3b085d6911326b64d2e760083ded506d171354841d954->enter($__internal_5379fe21ad939ece31e3b085d6911326b64d2e760083ded506d171354841d954_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_5379fe21ad939ece31e3b085d6911326b64d2e760083ded506d171354841d954->leave($__internal_5379fe21ad939ece31e3b085d6911326b64d2e760083ded506d171354841d954_prof);

    }

    public function getTemplateName()
    {
        return "::manage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 63,  182 => 57,  171 => 4,  162 => 64,  160 => 63,  155 => 61,  151 => 60,  147 => 58,  145 => 57,  136 => 51,  132 => 50,  128 => 49,  122 => 46,  118 => 45,  114 => 44,  107 => 40,  98 => 34,  79 => 18,  76 => 17,  62 => 15,  58 => 13,  55 => 12,  41 => 10,  37 => 8,  30 => 4,  25 => 1,);
    }
}
