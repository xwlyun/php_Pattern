<?php
/**
 * 策略模式
 * ==========================================================================
 * '策略'提供了一种用多个行为中的一个行为来配置一个类的方法：new 类(new 行为());
 * ==========================================================================
 * 一个类定义了多种行为 , 并且这些行为在这个类的操作中以多个条件语句的形式出现。
 * 将相关的条件分支移入它们各自的Strategy类中以代替这些条件语句
 * ==========================================================================
 * 提供了可以替换继承关系的办法
 * ==========================================================================
 */
header('Content-Type:text/html;charset=utf-8');

/**
 * Interface Strategy
 * 抽象策略角色：（Strategy），定义所有支持的算法的公共接口，通常由一个接口或者抽象类实现。
 */
interface Strategy{

	public function toDoSth();

}

/**
 * Class ConcreteStrategy1
 * 具体策略角色：（ConcreteStrategy）包装了相关的算法和行为，以Strategy接口实现某具体算法。
 */
class ConcreteStrategy1 implements Strategy{

	public function toDoSth(){
		return 'hello,ConcreteStrategy1.';
	}

}

/**
 * Class ConcreteStrategy2
 * 具体策略角色：（ConcreteStrategy）包装了相关的算法和行为，以Strategy接口实现某具体算法。
 */
class ConcreteStrategy2 implements Strategy{

	public function toDoSth()
	{
		return 'hello,ConcreteStrategy2.';
	}

}

/**
 * Class Context
 * 环境角色：（Context）持有一个策略类的引用，最终给客户端调用。
 */
class Context{

	protected $_strategy;

	public function __construct(Strategy $strategy)
	{
		$this->_strategy = $strategy;
	}

	public function doSth(){
		return $this->_strategy->toDoSth();
	}
}

// 调用环境角色‘class valueCheck’，选择具体策略角色‘class cEven’
$ms = new Context(new ConcreteStrategy2());
echo $ms->doSth();
