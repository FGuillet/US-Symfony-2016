<?php

/* USCatalogBundle:Catalog:formEditProduct.html.twig */
class __TwigTemplate_d7d540b7185e0a895112b05318dc21ab795c38ec5cae1b43b0d27adf64dc4bf7 extends Twig_Template
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
        $__internal_e4a540b4da32e3b4f182bcbd89211babf047438b5a345ee16835674efb605532 = $this->env->getExtension("native_profiler");
        $__internal_e4a540b4da32e3b4f182bcbd89211babf047438b5a345ee16835674efb605532->enter($__internal_e4a540b4da32e3b4f182bcbd89211babf047438b5a345ee16835674efb605532_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "USCatalogBundle:Catalog:formEditProduct.html.twig"));

        // line 1
        echo "<div id=\"formulaire\">
<div class=\"well\">
  ";
        // line 3
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("class" => "form-horizontal")));
        echo "

    ";
        // line 6
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "

    <div class=\"form-group\">
      ";
        // line 10
        echo "      ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Nom du produit"));
        echo "

      ";
        // line 13
        echo "      ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'errors');
        echo "

      <div class=\"col-sm-4\">
        ";
        // line 17
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
      </div>
    </div>

    <div class=\"form-group\">
      ";
        // line 23
        echo "      ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Description du produit"));
        echo "

      ";
        // line 26
        echo "      ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description", array()), 'errors');
        echo "

      <div class=\"col-sm-4\">
        ";
        // line 30
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
      </div>
    </div>

    <div class=\"form-group\">
      ";
        // line 36
        echo "      ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "category", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Famille du produit"));
        echo "

      ";
        // line 39
        echo "      ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "category", array()), 'errors');
        echo "

      <div class=\"col-sm-4\">
        ";
        // line 43
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "category", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
      </div>
    </div>

    ";
        // line 48
        echo "    ";
        if (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "propertyValues", array(), "any", true, true) &&  !(null === $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "propertyValues", array())))) {
            // line 49
            echo "    <p>";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "propertyValues", array()), 'label', array("label" => "Valeurs"));
            echo "</p>
    <div id=\"us_catalogbundle_product_propertyValues\">
      ";
            // line 51
            if ( !(null === $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "propertyValues", array()))) {
                // line 52
                echo "        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
                    // line 53
                    echo "          <p>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "name", array()), "html", null, true);
                    echo "</p>

          ";
                    // line 55
                    if ($this->getAttribute($context["property"], "isSelectable", array())) {
                        // line 56
                        echo "            <select id=\"us_catalogbundle_product_propertyValues_";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                        echo "_content\" name=\"propertyValues[]\" multiple=\"multiple\">
              ";
                        // line 57
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["property"], "propertyValues", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["propertyValue"]) {
                            // line 58
                            echo "                ";
                            if (twig_in_filter($context["propertyValue"], $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "propertyValues", array()))) {
                                // line 59
                                echo "                  <option value=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyValue"], "id", array()), "html", null, true);
                                echo "\" selected=\"selected\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyValue"], "content", array()), "html", null, true);
                                echo "</option>
                ";
                            } else {
                                // line 61
                                echo "                  <option value=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyValue"], "id", array()), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyValue"], "content", array()), "html", null, true);
                                echo "</option>
                ";
                            }
                            // line 63
                            echo "              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['propertyValue'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 64
                        echo "            </select>
          ";
                    } else {
                        // line 66
                        echo "            ";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "propertyValues", array()));
                        $context['loop'] = array(
                          'parent' => $context['_parent'],
                          'index0' => 0,
                          'index'  => 1,
                          'first'  => true,
                        );
                        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                            $length = count($context['_seq']);
                            $context['loop']['revindex0'] = $length - 1;
                            $context['loop']['revindex'] = $length;
                            $context['loop']['length'] = $length;
                            $context['loop']['last'] = 1 === $length;
                        }
                        foreach ($context['_seq'] as $context["_key"] => $context["propertyValue"]) {
                            // line 67
                            echo "              ";
                            if (($this->getAttribute($context["propertyValue"], "property", array()) == $context["property"])) {
                                // line 68
                                echo "                <textarea id=\"us_catalogbundle_product_propertyValues_";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index0", array()), "html", null, true);
                                echo "_content\" name=\"propertyValues\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyValue"], "content", array()), "html", null, true);
                                echo "</textarea>
              ";
                            }
                            // line 70
                            echo "            ";
                            ++$context['loop']['index0'];
                            ++$context['loop']['index'];
                            $context['loop']['first'] = false;
                            if (isset($context['loop']['length'])) {
                                --$context['loop']['revindex0'];
                                --$context['loop']['revindex'];
                                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['propertyValue'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 71
                        echo "          ";
                    }
                    // line 72
                    echo "
        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 74
                echo "      ";
            }
            // line 75
            echo "    </div>
    ";
            // line 86
            echo "
    ";
        }
        // line 88
        echo "

  ";
        // line 91
        echo "  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "save", array()), 'widget', array("attr" => array("class" => "btn btn-primary")));
        echo "

  ";
        // line 94
        echo "  ";
        // line 95
        echo "
  ";
        // line 97
        echo "  ";
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
</div>
  <a href=\"#\" id=\"addValue\">Add Value</a>
</div>
";
        
        $__internal_e4a540b4da32e3b4f182bcbd89211babf047438b5a345ee16835674efb605532->leave($__internal_e4a540b4da32e3b4f182bcbd89211babf047438b5a345ee16835674efb605532_prof);

    }

    public function getTemplateName()
    {
        return "USCatalogBundle:Catalog:formEditProduct.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  264 => 97,  261 => 95,  259 => 94,  253 => 91,  249 => 88,  245 => 86,  242 => 75,  239 => 74,  224 => 72,  221 => 71,  207 => 70,  199 => 68,  196 => 67,  178 => 66,  174 => 64,  168 => 63,  160 => 61,  152 => 59,  149 => 58,  145 => 57,  140 => 56,  138 => 55,  132 => 53,  114 => 52,  112 => 51,  106 => 49,  103 => 48,  95 => 43,  88 => 39,  82 => 36,  73 => 30,  66 => 26,  60 => 23,  51 => 17,  44 => 13,  38 => 10,  31 => 6,  26 => 3,  22 => 1,);
    }
}
