<?php

class Place extends Eloquent  {

	public function status()
	{
		$votes = array(
			'fixed' => $this->fixed,
			'beingfixed' => $this->beingfixed,
			'broken' => $this->broken,
		);

		arsort($votes);

		return key($votes);
	}
}
