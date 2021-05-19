<?php

namespace Controllers;

class Reservation
{
	public function display()
	{
		$template='reservation.phtml';
		include 'views/layout.phtml'; 
	}
}