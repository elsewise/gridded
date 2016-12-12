<?php
/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/9/30
 * Time: 10:07
 */

namespace Gridded\Kit;


class EditOptions extends Basic {

	/**
	 * @return array
	 */
	protected function _default_configure() {
		return array();
	}


	public function readonly() {
		$this->configure("readonly", "");
		return $this;
	}

	public function css($css_class) {
		$configures = $this->toArray();
		$old        = "";
		if (!empty($configures['class'])) {
			$old = $configures['class'];
		}
		$this->configure("class", $old . " $css_class");
		return $this;
	}

	public function click($fun) {
		$this->configure("onClick", $fun);
		return $this;
	}

	public function my97DatePricker($dateFmt) {
		$config = array("dateFmt" => $dateFmt);
		$this->click('WdatePicker(' . json_encode($config) . ')');
		$this->css('Wdate');
		return $this;
	}

}