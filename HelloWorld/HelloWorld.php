<?php
class HelloWorld
{
	var $HelloWorld = array();
	public __construct()
	{
		//Information about the plugin
		$HelloWorld["name"] = "HelloWorld";
		$HelloWorld["author"] = "Kenneth";
		$HelloWorld["website"] = "https://github.com/FlameDesk/ExamplePlugins";
	}
	public function Activate()
	{
		global $flamedesk;
		//Registers HelloWorld template
		$flamedesk->template["HelloWorld"] = "<b>Helo World</b>";
		//Adds the HelloWorld template to the top of the Header template
		$flamedesk->template["Header"] = "{$flamedesk->template["HelloWorld"]}\n".$flamedesk->template["Header"];
	}
	public function Deactivate()
	{
		global $flamedesk;
		//Removes HelloWorld template
		$flamedesk->template["HelloWorld"]->remove();
		//searches and replaces in the header
		$flamedesk->template["HelloWorld"]->replace("{$flamedesk->template["HelloWorld"]}", "");
	}
}
?>