<?php

/* USCatalogBundle:Manage:editManage.html.twig */
class __TwigTemplate_d796f69cca095061c28a5fc85781b4d809c478c05e7605f79f2d5988927ff3f9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::manage.html.twig", "USCatalogBundle:Manage:editManage.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::manage.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_700538673a4052e161ac2c479751f20921c8ff04e3a7973cccc0ae455913d28b = $this->env->getExtension("native_profiler");
        $__internal_700538673a4052e161ac2c479751f20921c8ff04e3a7973cccc0ae455913d28b->enter($__internal_700538673a4052e161ac2c479751f20921c8ff04e3a7973cccc0ae455913d28b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "USCatalogBundle:Manage:editManage.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_700538673a4052e161ac2c479751f20921c8ff04e3a7973cccc0ae455913d28b->leave($__internal_700538673a4052e161ac2c479751f20921c8ff04e3a7973cccc0ae455913d28b_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_f41e143cdba3ce664f4e2813a21cfe94d74e52ad697d15452b4bbd11a754bae1 = $this->env->getExtension("native_profiler");
        $__internal_f41e143cdba3ce664f4e2813a21cfe94d74e52ad697d15452b4bbd11a754bae1->enter($__internal_f41e143cdba3ce664f4e2813a21cfe94d74e52ad697d15452b4bbd11a754bae1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Editer un produit - ";
        
        $__internal_f41e143cdba3ce664f4e2813a21cfe94d74e52ad697d15452b4bbd11a754bae1->leave($__internal_f41e143cdba3ce664f4e2813a21cfe94d74e52ad697d15452b4bbd11a754bae1_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_dfab7955e24d3d0560cf826985b11fdfdaadf06602547893d3829ad64d3ebdac = $this->env->getExtension("native_profiler");
        $__internal_dfab7955e24d3d0560cf826985b11fdfdaadf06602547893d3829ad64d3ebdac->enter($__internal_dfab7955e24d3d0560cf826985b11fdfdaadf06602547893d3829ad64d3ebdac_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <section class=\"container\">
        <h1>Editer le produit \"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "name", array()), "html", null, true);
        echo "\"</h1>

        ";
        // line 9
        echo twig_include($this->env, $context, "USCatalogBundle:Catalog:formEditProduct.html.twig");
        echo "
    </section>

    <script src=\"//code.jquery.com/jquery-1.11.3.min.js\"></script>
    <script type=\"text/javascript\">
        \$(document).ready(function ()
        {
            \$('.dataValues').remove();

            function seeValues(propertiesBloc, typeProduct)
            {
                \$.ajax(
                        {
                            url: Routing.generate('add_properties_for_product'),
                            type: 'POST',
                            data:
                                    {
                                        id: \$(\"#\" + typeProduct + \" option:selected\").val()
                                    },
                            dataType: 'json',
                            success: function (jsonResponse)
                            {
                                var num = 0;

                                \$('#' + propertiesBloc + '').empty();

                                var properties = jsonResponse.properties;

                                var i, j;
                                for (i in properties)
                                {
                                    if (properties[i].isSelectable)
                                    {
                                        \$('#' + propertiesBloc + '').append('<p><label>' + properties[i].name + '</label></p>');
                                        var list = '<select id=\"us_catalogbundle_product_values_' + (i) + '_content\" name=\"us_catalogbundle_product[values][' + (i) + '][content][]\" required=\"required\" multiple=\"multiple\">';

                                        for (j in properties[i].values)
                                        {
                                            list += '<option name=\"us_catalogbundle_product[values][' + (j) + '][content]\" value=\"' + (j) + '\">' + properties[i].values[j] + '</option>';
                                        }
                                        list += '</select>';
                                        \$('#' + propertiesBloc + '').append(list);

                                    } else
                                    {
                                        property = '<p><label>' + properties[i].name + '</label><textarea id=\"us_catalogbundle_product_values_' + (i) + '_content\" name=\"us_catalogbundle_product[values][' + (i) + '][content]\" required=\"required\"></textarea></p>';
                                        \$('#' + propertiesBloc + '').append(property);
                                    }

                                }


                            },
                            error: function ()
                            {
                                \$('#' + propertiesBloc + '').empty();
                            }
                        });
            }


            \$(\"#us_catalogbundle_product_type\").change(function () {
                seeValues('us_catalogbundle_product_values', 'us_catalogbundle_product_type');

            });

        });
    </script>

";
        
        $__internal_dfab7955e24d3d0560cf826985b11fdfdaadf06602547893d3829ad64d3ebdac->leave($__internal_dfab7955e24d3d0560cf826985b11fdfdaadf06602547893d3829ad64d3ebdac_prof);

    }

    public function getTemplateName()
    {
        return "USCatalogBundle:Manage:editManage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 9,  56 => 7,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}
