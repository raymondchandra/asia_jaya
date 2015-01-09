<?php

use Carbon\Carbon;

class StrukController extends \BaseController {
	
	public function get()
	{
		if(Struk::find(1) == null)
		{
			$struk = new Struk();
			$struk->date = Carbon::Now();
			$struk->no_struk = 1;
			$struk->save();
			
			return 1;
		}
		else
		{
			$struk = Struk::find(1);
			
			if(Carbon::create($struk->date)->diffInDays(Carbon::Now()) >= 1)
			{
				$struk->date= Carbon::Now();
				$struk->no_struk = 1;
				$struk->save();
				
				return 1;
			}
			else
			{
				
				$nmr = $struk->no_struk;
				$struk->no_struk = $nmr+1;
				$struk->save();
				
				return $nmr;
			}
		}
	}
	
}