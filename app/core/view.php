<?php

class View {
	
	public function generate($content_view, $template_view, $data = NULL, $info = NULL) {

		include 'app/views/'.$template_view;
		
	}
}