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
		$flamedesk->template["helloworld"] = "<b>Hello World</b>";
		//Adds the HelloWorld template to the top of the Header template
		$flamedesk->template["header"] = "{$flamedesk->template[\"helloworld\"]}\n".$flamedesk->template["header"];
	}
	public function Deactivate()
	{
		global $flamedesk;
		//Removes HelloWorld template
		$flamedesk->template["helloworld"]->remove();
		//searches and replaces in the header
		$flamedesk->template["helloworld"]->replace("{$flamedesk->template[\"helloworld\"]}", "");
	}
}
?>