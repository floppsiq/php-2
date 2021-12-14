<?php 
trait SingletonTrait
{
	private static $instance;

	public static function getInstance()
	{
		if (empty(self::$instance)) self::$instance = new static();

		return self::$instance;
	}

	private function __construct()
	{
	}
	private function __clone()
	{
	}
	private function __wakeup()
	{
	}
}

class Foo
{
	use SingletonTrait;

	private $var = [];

	public function addVal($v)
	{
		$this->var[] = $v;
	}

	public function getVal()
	{
		return $this->var;
	}
}

echo '<pre>';

$foo1 = Foo::getInstance();

$foo1->addVal('first');
$foo1->addVal('second');

print_r($foo1->getVal()); 

$foo2 = Foo::getInstance();
print_r($foo2->getVal());

$foo1->addVal('new value');

print_r($foo1->getVal());

print_r($foo2->getVal());
?>