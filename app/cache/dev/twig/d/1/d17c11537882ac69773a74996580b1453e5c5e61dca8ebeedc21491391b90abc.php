<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_d17c11537882ac69773a74996580b1453e5c5e61dca8ebeedc21491391b90abc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b2f5557b4b2cb76a4b5fa09d4e0b2e57f87f0b831dfc5e9facd635e9fa6d1402 = $this->env->getExtension("native_profiler");
        $__internal_b2f5557b4b2cb76a4b5fa09d4e0b2e57f87f0b831dfc5e9facd635e9fa6d1402->enter($__internal_b2f5557b4b2cb76a4b5fa09d4e0b2e57f87f0b831dfc5e9facd635e9fa6d1402_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b2f5557b4b2cb76a4b5fa09d4e0b2e57f87f0b831dfc5e9facd635e9fa6d1402->leave($__internal_b2f5557b4b2cb76a4b5fa09d4e0b2e57f87f0b831dfc5e9facd635e9fa6d1402_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_d0c24b37695ec1b6d4ede854da17a8ef34eedbeb85f7307cd570d8f622900b2c = $this->env->getExtension("native_profiler");
        $__internal_d0c24b37695ec1b6d4ede854da17a8ef34eedbeb85f7307cd570d8f622900b2c->enter($__internal_d0c24b37695ec1b6d4ede854da17a8ef34eedbeb85f7307cd570d8f622900b2c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_d0c24b37695ec1b6d4ede854da17a8ef34eedbeb85f7307cd570d8f622900b2c->leave($__internal_d0c24b37695ec1b6d4ede854da17a8ef34eedbeb85f7307cd570d8f622900b2c_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_4b77fc4108c00ca077a0d6c443ae1fa19526592fe4fc71f648adfb6359e99ff3 = $this->env->getExtension("native_profiler");
        $__internal_4b77fc4108c00ca077a0d6c443ae1fa19526592fe4fc71f648adfb6359e99ff3->enter($__internal_4b77fc4108c00ca077a0d6c443ae1fa19526592fe4fc71f648adfb6359e99ff3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_4b77fc4108c00ca077a0d6c443ae1fa19526592fe4fc71f648adfb6359e99ff3->leave($__internal_4b77fc4108c00ca077a0d6c443ae1fa19526592fe4fc71f648adfb6359e99ff3_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_475110ffee67153ab1110190c01b9f3b65b8508c599fecc4bc38e81e29720594 = $this->env->getExtension("native_profiler");
        $__internal_475110ffee67153ab1110190c01b9f3b65b8508c599fecc4bc38e81e29720594->enter($__internal_475110ffee67153ab1110190c01b9f3b65b8508c599fecc4bc38e81e29720594_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_475110ffee67153ab1110190c01b9f3b65b8508c599fecc4bc38e81e29720594->leave($__internal_475110ffee67153ab1110190c01b9f3b65b8508c599fecc4bc38e81e29720594_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
