#Overview

This is a simple Foursquare component that can be used in CakePHP applications.

#Usage

Include the file in app/controllers/components

Example controller code snippet. Make sure to take care of any errror handling.

<?php

/* Your Controller code
...
*/

var $components = array('Foursquare');

/*Function that accepts POST params*/

function login()
{
	if(!empty($this->data))
	{	
		$user=$this->data['User']['username'];
		$pwd = $this->data['User']['password'];
		$this->Foursquare->username = $user; //Make sure u use an email or phone number here 
		$this->Foursquare->password = $password;
		
		//Grab user data
		$foursquare_user= $this->Foursquare->user_verifyCredentials();
	}
}

/**
$foursquare_user will be a user object. Here is example of my foursquare user dump:

stdClass Object
(
    [user] => stdClass Object
        (
            [id] => 25978
            [firstname] => Emmanuel
            [lastname] => P
            [photo] => http://playfoursquare.s3.amazonaws.com/userpix_thumbs/4a6f021e559d0.jpg
            [gender] => male
            [phone] => 3052974366
            [email] => pontifex1003@gmail.com
            [facebook] => 18700987
            [settings] => stdClass Object
                (
                    [pings] => off
                    [sendtotwitter] => 
                    [sendtofacebook] => 
                )

            [status] => stdClass Object
                (
                    [friendrequests] => 1
                )

            [checkin] => stdClass Object
                (
                    [id] => 10744219
                    [created] => Tue, 16 Feb 10 19:36:34 +0000
                    [timezone] => America/New_York
                    [ismayor] => true
                    [venue] => stdClass Object
                        (
                            [id] => 430350
                            [name] => Florida International University-Modesto Maidique Campus
                            [address] => 11200 SW 8th Street
                            [city] => Miami
                            [state] => FL
                            [zip] => 33199
                            [geolat] => 25.7543094629
                            [geolong] => -80.3701400757
                        )

                    [display] => Emmanuel P. @ Florida International University-Modesto Maidique Campus
                )

        )

)
*/

?>

