<?php 
    App::import('Core', array('HttpSocket')); 
    /*
      FOURSQUARE CAKEPHP JSON Component.
      For more information on required and optional function parameters see 
      http://groups.google.com/group/foursquare-api/web/api-documentation
      BY: Emmanuel P 
    */
    class FoursquareComponent extends Object {
		var $username = '';
        var $password = '';
        var $Http = null;
		
		function __construct() {
            $this->Http =& new HttpSocket();
        }
		/**
	 * Returns a list of recent checkins from friends. If you pass in a geolat/geolong pair (optional, but recommended), we'll send you back a <distance> inside each <checkin> object that you can use to sort your results.
	 * HTTP Method(s): GET
	 * Requires Authentication: Yes
	 */ 
        function checkins($params) {
            $url = "http://api.foursquare.com/v1/checkins.json";
            return $this->deJSON($this->Http->get($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Allows you to check-in to a place.
		 * HTTP Method(s): POST
		 * Requires Authentication: Yes
		 */ 
        function checkin($params) {
            $url = "http://api.foursquare.com/v1/checkin.json";
            return $this->deJSON($this->Http->post($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Returns a history of checkins for the authenticated user.
		 * HTTP Method(s): GET
		 * Requires Authentication: Yes
		 */ 
	     function checkin_history($params=NULL) {
	         $url = "http://api.foursquare.com/v1/history.json";
	         return $this->deJSON($this->Http->get($url, $params, $this->__getAuthHeader()));                        
	     }
        /**
		 * Returns profile information (badges, etc) for a given user. If the user has recent check-in data (ie, if the user is self or is a friend of the authenticating user), this data will be returned as well in a checkin block.
		 * HTTP Method(s): GET
		 * Requires Authentication: Yes
		 */ 
        function user_verifyCredentials() {
            $url = "http://api.foursquare.com/v1/user.json";
            return $this->deJSON($this->Http->get($url, NULL, $this->__getAuthHeader()));                        
        }
		/**
		 * Returns a list of friends. If the friend has allowed it, you'll also see links to their Twitter and Facebook accounts.
		 * HTTP Method(s): GET
		 * Requires Authentication: Yes
		 */ 
        function user_friends() {
            $url = "http://api.foursquare.com/v1/friends.json";
            return $this->deJSON($this->Http->get($url, NULL, $this->__getAuthHeader()));                        
        }
        /**
		 * Returns a list of venues near the area specified or that match the search term. (The distance returned is in meters). If you authenticate, the method will return venue meta-data related to you and your friends. If you do not authenticate, you will not get this data.
		 * HTTP Method(s): GET
		 * Requires Authentication: Recommended (I enforced it.)
		 */
		function venue_search($params) {
            $url = "http://api.foursquare.com/v1/venues.json";
            return $this->deJSON($this->Http->get($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Returns venue data, including mayorship, tips/to-dos and tags.
		 * HTTP Method(s): GET
		 * Requires Authentication: Recommended Recommended (I enforced it.)
		 */
		function venue_details($params) {
            $url = "http://api.foursquare.com/v1/venue.json";
            return $this->deJSON($this->Http->get($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Allows you to add a new venue.
		 * HTTP Method(s): POST
		 * Requires Authentication: YES
		 */
		function venue_add($params) {
            $url = "http://api.foursquare.com/v1/addvenue.json";
            return $this->deJSON($this->Http->post($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Allows you to propose a venue edit.
		 * HTTP Method(s): POST
		 * Requires Authentication: YES
		 */
		function venue_edit($params) {
            $url = "http://api.foursquare.com/v1/venue/proposeedit.json";
            return $this->deJSON($this->Http->post($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Allows you to flag a venue as closed.
		 * HTTP Method(s): POST
		 * Requires Authentication: YES
		 */
		function venue_flag($params) {
            $url = "http://api.foursquare.com/v1/venue/flagclosed.json";
            return $this->deJSON($this->Http->post($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Returns a list of tips near the area specified. (The distance returned is in meters).
		 * HTTP Method(s): GET
		 * Requires Authentication: Recommended Recommended (I enforced it.)
		 */
		function tip_search($params) {
            $url = "http://api.foursquare.com/v1/tips.json";
            return $this->deJSON($this->Http->get($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Allows you to add a new tip or to-do at a venue.
		 * HTTP Method(s): POST
		 * Requires Authentication: Yes
		 */
		function tip_add($params) {
            $url = "http://api.foursquare.com/v1/addtip.json";
            return $this->deJSON($this->Http->post($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Allows you to mark a tip as a to-do item.
		 * HTTP Method(s): POST
		 * Requires Authentication: Yes
		 */
		function tip_markTodo($params) {
            $url = "http://api.foursquare.com/v1/tip/marktodo.json";
            return $this->deJSON($this->Http->post($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Allows you to mark a tip as done.
		 * HTTP Method(s): POST
		 * Requires Authentication: Yes
		 */
		function tip_markDone($params) {
            $url = "http://api.foursquare.com/v1/tip/markdone.json";
            return $this->deJSON($this->Http->post($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Shows you a list of users with whom you have a pending friend request (ie, they've requested to add you as a friend, but you have not approved).
		 * HTTP Method(s): GET
		 * Requires Authentication: Yes
		 */
		function friend_requests() {
            $url = "http://api.foursquare.com/v1/friend/requests.json";
            return $this->deJSON($this->Http->get($url, NULL, $this->__getAuthHeader()));                        
        }
		/**
		 * Approves a pending friend request from another user. On success, returns the <user> object.
		 * HTTP Method(s): POST
		 * Requires Authentication: Yes
		 */
		function friend_approve($params) {
            $url = "http://api.foursquare.com/v1/friend/approve.json";
            return $this->deJSON($this->Http->post($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Denies a pending friend request from another user. On success, returns the <user> object.
		 * HTTP Method(s): POST
		 * Requires Authentication: Yes
		 */
		function friend_deny($params) {
            $url = "http://api.foursquare.com/v1/friend/deny.json";
            return $this->deJSON($this->Http->post($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * When passed a free-form text string, returns a list of matching <user> objects. The method only returns matches of people with whom you are not already friends.
		 * HTTP Method(s): GET
		 * Requires Authentication: Yes
		 */
		function friend_findByName($params) {
            $url = "http://api.foursquare.com/v1/findfriends/byname.json";
            return $this->deJSON($this->Http->get($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * When passed phone number(s), returns a list of matching <user> objects. The method only returns matches of people with whom you are not already friends. You can pass a single number as a parameter, or you can pass multiple numbers separated by commas.
		 * HTTP Method(s): GET
		 * Requires Authentication: Yes
		 */
		function friend_findByPhone($params) {
            $url = "http://api.foursquare.com/v1/findfriends/byphone.json";
            return $this->deJSON($this->Http->get($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * When passed a Twitter name (user A), returns a list of matching <user> objects that correspond to user A's friends on Twitter. The method only returns matches of people with whom you are not already friends. If you don't pass in a Twitter name, it will attempt to use the Twitter name associated with the authenticating user.
		 * HTTP Method(s): GET
		 * Requires Authentication: Yes
		 */
		function friend_findByTwitter($params) {
            $url = "http://api.foursquare.com/v1/findfriends/bytwitter.json";
            return $this->deJSON($this->Http->get($url, $params, $this->__getAuthHeader()));                        
        }
		/**
		 * Allows you to change notification options for yourself (self) globally as well as for each individual friend (identified by their uid).
		 * HTTP Method(s): POST
		 * Requires Authentication: Yes
		 */
		function settings_setPings($params) {
            $url = "http://api.foursquare.com/v1/settings/setpings.json";
            return $this->deJSON($this->Http->post($url, $params, $this->__getAuthHeader()));                        
        }
		
        /* Private helper functions*/
        /**
		* Returns a PHP array representation of the JSON returned data.
		*/
		private function deJSON($response) {
		
			return json_decode($response);
        }
        /**
		* Forms the standard Authorization header to be sent with endpoints requiring authentication.
		*/        
        function __getAuthHeader() {
            return array('auth' => array('method' => 'Basic',
                      'user' => $this->username,
                      'pass' => $this->password
                )
            );
		}
   }
?>