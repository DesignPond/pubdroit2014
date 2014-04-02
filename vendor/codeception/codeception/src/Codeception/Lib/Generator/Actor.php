<?php
namespace Codeception\Lib\Generator;

use Codeception\Codecept;
use Codeception\Util\Template;

class Actor
{
    protected $template = <<<EOF
<?php //[STAMP] {{hash}}

// This class was automatically generated by build task
// You should not change it manually as it will be overwritten on next build
// @codingStandardsIgnoreFile

{{namespace}}
{{use}}

/**
 * Inherited Methods
{{inheritedMethods}}
*/
class {{guy}} extends \Codeception\Actor
{
   {{methods}}
}

EOF;

    protected $methodTemplate = <<<EOF

    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     {{doc}}
     * @see \{{module}}::{{method}}()
     */
    public function {{action}}({{params}}) {
        return \$this->scenario->runStep(new \Codeception\Step\{{step}}('{{method}}', func_get_args()));
    }
EOF;

    protected $inheritedMethodTemplate = ' * @method void {{method}}({{params}})';

    protected $settings;
    protected $modules;
    protected $actions;
    protected $numMethods = 0;

    public function __construct($settings)
    {
        $this->settings = $settings;
        $this->modules = \Codeception\Configuration::modules($settings);
        $this->actions = \Codeception\Configuration::actions($this->modules);
    }

    public function produce()
    {
        $namespace = rtrim($this->settings['namespace'], '\\');

        $uses = [];
        foreach ($this->modules as $module) {
            $uses[] = "use " . get_class($module) . ";";
        }

        $methods = [];
        $code = [];
        foreach ($this->actions as $action => $moduleName) {
            if (in_array($action, $methods)) {
                continue;
            }
            $method = new \ReflectionMethod($this->modules[$moduleName], $action);
            $code[] = $this->addMethod($method);
            $methods[] = $action;
            $this->numMethods++;
        }

        return (new Template($this->template))
            ->place('namespace', $namespace ? "namespace $namespace;" : '')
            ->place('hash', self::genHash($this->actions, $this->settings))
            ->place('use', implode("\n", $uses))
            ->place('guy', $this->settings['class_name'])
            ->place('methods', implode("\n\n ", $code))
            ->place('inheritedMethods', $this->prependAbstractGuyDocBlocks())
            ->produce();
    }

    public static function genHash($actions, $settings)
    {
        return md5(Codecept::VERSION.serialize($actions).serialize($settings['modules']));
    }

    protected function addMethod(\ReflectionMethod $refMethod)
    {
        $class = $refMethod->getDeclaringClass();
        $params = $this->getParamsString($refMethod);
        $module = $class->getName();

        $body = '';
        $doc = $this->addDoc($class, $refMethod);
        $doc = str_replace('/**', '', $doc);
        $doc = trim(str_replace('*/', '', $doc));
        if (!$doc) {
            $doc = "*";
        }

        $conditionalDoc = $doc . "\n     * Conditional Assertion: Test won't be stopped on fail";

        $methodTemplate = (new Template($this->methodTemplate))
            ->place('module', $module)
            ->place('method', $refMethod->name)
            ->place('params', $params);

        // generate conditional assertions
        if (0 === strpos($refMethod->name, 'see')) {
            $type = 'Assertion';
            $body .= $methodTemplate
                ->place('doc', $conditionalDoc)
                ->place('action', 'can' . ucfirst($refMethod->name))
                ->place('step', 'ConditionalAssertion')
                ->produce();

        // generate negative assertion
        } elseif (0 === strpos($refMethod->name, 'dontSee')) {
            $type = 'Assertion';
            $body .= $methodTemplate
                ->place('doc', $conditionalDoc)
                ->place('action', str_replace('dont', 'cant', $refMethod->name))
                ->place('step', 'ConditionalAssertion')
                ->produce();

        } elseif (0 === strpos($refMethod->name, 'am')) {
            $type = 'Condition';
        } else {
            $type = 'Action';
        }

        $body .= $methodTemplate
            ->place('doc', $doc)
            ->place('action', $refMethod->name)
            ->place('step', $type)
            ->produce();

        return $body;
    }

    /**
     * @param \ReflectionMethod $refMethod
     * @return array
     */
    protected function getParamsString(\ReflectionMethod $refMethod)
    {
        $params = array();
        foreach ($refMethod->getParameters() as $param) {

            if ($param->isOptional()) {
                $params[] = '$' . $param->name . ' = null';
            } else {
                $params[] = '$' . $param->name;
            };

        }
        return implode(', ', $params);
    }

    /**
     * @param \ReflectionClass $class
     * @param \ReflectionMethod $refMethod
     * @return string
     */
    protected function addDoc(\ReflectionClass $class, \ReflectionMethod $refMethod)
    {
        $doc = $refMethod->getDocComment();

        if (!$doc) {
            $interfaces = $class->getInterfaces();
            foreach ($interfaces as $interface) {
                $i = new \ReflectionClass($interface->name);
                if ($i->hasMethod($refMethod->name)) {
                    $doc = $i->getMethod($refMethod->name)->getDocComment();
                    break;
                }
            }
        }

        if (!$doc and $class->getParentClass()) {
            $parent = new \ReflectionClass($class->getParentClass()->name);
            if ($parent->hasMethod($refMethod->name)) {
                $doc = $parent->getMethod($refMethod->name)->getDocComment();
                return $doc;
            }
            return $doc;
        }
        return $doc;
    }

    protected function prependAbstractGuyDocBlocks()
    {
        $inherited = array();

        $class = new \ReflectionClass('\Codeception\\Actor');
        $methods = $class->getMethods(\ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            if ($method->name == '__call') {
                continue;
            } // skipping magic
            if ($method->name == '__construct') {
                continue;
            } // skipping magic
            $params = $this->getParamsString($method);
            $inherited[] = (new Template($this->inheritedMethodTemplate))
                ->place('method', $method->name)
                ->place('params', $params)
                ->produce();
        }

        return implode("\n", $inherited);
    }

    public function getGuy()
    {
        return $this->settings['class_name'];
    }

    public function getModules()
    {
        return array_keys($this->modules);
    }

    public function getNumMethods()
    {
        return $this->numMethods;
    }


}