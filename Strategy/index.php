<?php
/**
 * 策略模式
 */
header('Content-Type:text/html;charset=utf-8');

/**
 * Interface iCheck
 * 抽象策略角色： 策略类，通常由一个接口或者抽象类实现。
 */
interface iCheck{

	public function isValid($value);

	public function show($bool);
}

/**
 * Class cPositive
 * 具体策略角色：包装了相关的算法和行为。
 */
class cPositive implements iCheck{

	public function isValid($value){
		return $value>0;
	}

	public function show($bool){
		echo $bool?'是正数':'不是正数';
	}
}

/**
 * Class cEven
 * 具体策略角色：包装了相关的算法和行为。
 */
class cEven implements iCheck{

	public function isValid($value)
	{
		return $value%2==0;
	}

	public function show($bool){
		echo $bool?'是偶数':'不是偶数';
	}
}

/**
 * Class valueCheck
 * 环境角色：持有一个策略类的引用，最终给客户端调用。
 */
class valueCheck{

	protected $_rule;

	public function __construct(iCheck $rule)
	{
		$this->_rule = $rule;
	}

	public function check($numbers){
		foreach($numbers as $number){
			$bool = $this->_rule->isValid($number);
			echo $number.':'.$this->_rule->show($bool).'<br/>';
		}
	}
}

// 调用环境角色‘class valueCheck’，选择具体策略角色‘class cEven’
$ms = new valueCheck(new cEven());
$ms->check(array(1,2,3,4,5));
