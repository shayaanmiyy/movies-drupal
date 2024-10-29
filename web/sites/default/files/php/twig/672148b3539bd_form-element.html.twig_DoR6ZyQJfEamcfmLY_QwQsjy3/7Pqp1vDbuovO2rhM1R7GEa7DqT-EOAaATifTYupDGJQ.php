<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/contrib/gin/templates/form/form-element.html.twig */
class __TwigTemplate_d83436510b1102565c7dba9c2a9ea31b extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 13
        $context["show_description_toggle"] = (($context["description_toggle"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 13));
        // line 15
        $context["classes"] = ["js-form-item", "form-item", ("js-form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 18
($context["type"] ?? null), 18, $this->source))), ("form-type--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 19
($context["type"] ?? null), 19, $this->source))), ((CoreExtension::inFilter(        // line 20
($context["type"] ?? null), ["checkbox", "radio"])) ? ("form-type--boolean") : ("")), ("js-form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 21
($context["name"] ?? null), 21, $this->source))), ("form-item--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 22
($context["name"] ?? null), 22, $this->source))), ((!CoreExtension::inFilter(        // line 23
($context["title_display"] ?? null), ["after", "before"])) ? ("form-item--no-label") : ("")), (((        // line 24
($context["disabled"] ?? null) == "disabled")) ? ("form-item--disabled") : ("")), ((        // line 25
($context["errors"] ?? null)) ? ("form-item--error") : ("")), ((        // line 26
($context["show_description_toggle"] ?? null)) ? ("help-icon__description-container") : (""))];
        // line 30
        $context["description_classes"] = ["form-item__description", (((        // line 32
($context["description_display"] ?? null) == "invisible")) ? ("visually-hidden") : (""))];
        // line 35
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 35), 35, $this->source), "html", null, true);
        yield ">
  ";
        // line 36
        if (CoreExtension::inFilter(($context["label_display"] ?? null), ["before", "invisible"])) {
            // line 37
            yield "    ";
            if (($context["show_description_toggle"] ?? null)) {
                // line 38
                yield "      <div class=\"help-icon\">
        ";
                // line 39
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 39, $this->source), "html", null, true);
                yield "
        ";
                // line 40
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("gin/gin_description_toggle"), "html", null, true);
                yield "
        <button class=\"help-icon__description-toggle\"></button>
      </div>
    ";
            } else {
                // line 44
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 44, $this->source), "html", null, true);
                yield "
    ";
            }
            // line 46
            yield "  ";
        }
        // line 47
        yield "  ";
        if (($context["show_description_toggle"] ?? null)) {
            // line 48
            yield "  <div class=\"help-icon__element-has-description\">
  ";
        }
        // line 50
        yield "  ";
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["prefix"] ?? null))) {
            // line 51
            yield "    <span class=\"form-item__prefix";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["disabled"] ?? null) == "disabled")) ? (" is-disabled") : ("")));
            yield "\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 51, $this->source), "html", null, true);
            yield "</span>
  ";
        }
        // line 53
        yield "  ";
        if (((($context["description_display"] ?? null) == "before") && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 53))) {
            // line 54
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 54), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 54), 54, $this->source), "html", null, true);
            yield ">
      ";
            // line 55
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 58
        yield "  ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 58, $this->source), "html", null, true);
        yield "
  ";
        // line 59
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["suffix"] ?? null))) {
            // line 60
            yield "    <span class=\"form-item__suffix";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["disabled"] ?? null) == "disabled")) ? (" is-disabled") : ("")));
            yield "\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null), 60, $this->source), "html", null, true);
            yield "</span>
  ";
        }
        // line 62
        yield "  ";
        if ((($context["label_display"] ?? null) == "after")) {
            // line 63
            yield "    ";
            if (($context["show_description_toggle"] ?? null)) {
                // line 64
                yield "      <div class=\"help-icon\">
        ";
                // line 65
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 65, $this->source), "html", null, true);
                yield "
        ";
                // line 66
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("gin/gin_description_toggle"), "html", null, true);
                yield "
        <button class=\"help-icon__description-toggle\"></button>
      </div>
    ";
            } else {
                // line 70
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 70, $this->source), "html", null, true);
                yield "
    ";
            }
            // line 72
            yield "  ";
        }
        // line 73
        yield "  ";
        if (($context["show_description_toggle"] ?? null)) {
            // line 74
            yield "  </div>
  ";
        }
        // line 76
        yield "  ";
        if (($context["errors"] ?? null)) {
            // line 77
            yield "    <div class=\"form-item__error-message\">
      ";
            // line 78
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 78, $this->source), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 81
        yield "  ";
        if ((CoreExtension::inFilter(($context["description_display"] ?? null), ["after", "invisible"]) && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 81))) {
            // line 82
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 82), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 82), 82, $this->source), "html", null, true);
            yield ">
      ";
            // line 83
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 86
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["description_toggle", "description", "type", "name", "title_display", "disabled", "errors", "description_display", "attributes", "label_display", "label", "prefix", "children", "suffix"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/gin/templates/form/form-element.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  202 => 86,  196 => 83,  191 => 82,  188 => 81,  182 => 78,  179 => 77,  176 => 76,  172 => 74,  169 => 73,  166 => 72,  160 => 70,  153 => 66,  149 => 65,  146 => 64,  143 => 63,  140 => 62,  132 => 60,  130 => 59,  125 => 58,  119 => 55,  114 => 54,  111 => 53,  103 => 51,  100 => 50,  96 => 48,  93 => 47,  90 => 46,  84 => 44,  77 => 40,  73 => 39,  70 => 38,  67 => 37,  65 => 36,  60 => 35,  58 => 32,  57 => 30,  55 => 26,  54 => 25,  53 => 24,  52 => 23,  51 => 22,  50 => 21,  49 => 20,  48 => 19,  47 => 18,  46 => 15,  44 => 13,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/gin/templates/form/form-element.html.twig", "/var/www/html/web/themes/contrib/gin/templates/form/form-element.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 13, "if" => 36);
        static $filters = array("clean_class" => 18, "escape" => 35);
        static $functions = array("attach_library" => 40);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
                ['attach_library'],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}