<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Returns the sidebar in the theme
 * 
 * @param string team name
 * @author Woxxy
 * @return string facebook widget for the team
 */
if(!function_exists('get_sidebar'))
{
	function get_sidebar()
	{
		$echo = '';
		$echo .= '<ul class="sidebar">';
		if(get_setting_irc())$echo .= '<li>'. get_irc_widget() .'</li>';
		if(get_setting_twitter())$echo .= '<li>'. get_twitter_widget() .'</li>';
		if(get_setting_facebook())$echo .= '<li>'. get_facebook_widget() .'</li>';
		$echo .= '</ul>';
		$echo .= '<div class="clearer_l"></div>';
		return $echo;
	}
}

/**
 * Returns twitter for the team
 * If $team is not set, it returns the home team's twitter
 * 
 * @param string team name
 * @author Woxxy
 * @return string twitter for the team
 */
if(!function_exists('get_setting_twitter'))
{
	function get_setting_twitter($team = NULL)
	{
		if(is_null($team)) return get_home_team()->twitter;
		$team = new Team();
		$team->where('name', $team)->limit(1)->get();
		return $team->twitter;
	}
}

/**
 * Returns IRC widget for the team
 * If $team is not set, it returns the home team's twitter widget
 * 
 * @param string team name
 * @author Woxxy
 * @return string twitter for the team
 */
if(!function_exists('get_twitter_widget'))
{
	function get_twitter_widget($team = NULL)
	{
		$twitter = get_setting_twitter($team);
		$echo = sprintf(_('%sFollow us%s on Twitter'),'<a href="http://twitter.com/intent/user?screen_name='.urlencode($twitter).'">', '<img src="'.site_url().'assets/images/bird_16_blue.png" /></a>' );
		return $echo;
	}
}

/**
 * Returns IRC for the team
 * If $team is not set, it returns the home team's irc
 * 
 * @param string team name
 * @author Woxxy
 * @return string irc for the team
 */
if(!function_exists('get_setting_irc'))
{
	function get_setting_irc($team = NULL)
	{
		if(is_null($team)) return get_home_team()->irc;
		$team = new Team();
		$team->where('name', $team)->limit(1)->get();
		return $team->irc;
	}
}

/**
 * Returns IRC widget for the team
 * If $team is not set, it returns the home team's irc widget
 * 
 * @param string team name
 * @author Woxxy
 * @return string irc widget for the team
 */
if(!function_exists('get_irc_widget'))
{
	function get_irc_widget($team = NULL)
	{
		$irc = get_setting_irc($team);
		
		$echo = _('Come chatting with us on') . ' <a href="'.parse_irc($irc).'">' . $irc . '</a>';
		return $echo;
	}
}

/**
 * Returns facebook url for the team
 * If $team is not set, it returns the home team's facebook
 * 
 * @param string team name
 * @author Woxxy
 * @return string facebook for the team
 */
if(!function_exists('get_setting_facebook'))
{
	function get_setting_facebook($team = NULL)
	{
		$hometeam = get_setting('fs_gen_default_team');
		$team = new Team();
		$team->where('name', $hometeam)->limit(1)->get();
		return $team->facebook;
	}
}

/**
 * Returns facebook widget for the team
 * If $team is not set, it returns the home team's facebook widget
 * 
 * @param string team name
 * @author Woxxy
 * @return string facebook widget for the team
 */
if(!function_exists('get_facebook_widget'))
{
	function get_facebook_widget($team = NULL)
	{
		$facebook = get_setting_facebook($team);
		
		$echo = "<iframe src='http://www.facebook.com/plugins/likebox.php?href=".urlencode($facebook)."&amp;width=222&amp;colorscheme=light&amp;show_faces=false&amp;stream=true&amp;header=true&amp;height=387' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:222px; height:387px; background:#fff; background:rgba(255,255,255,0.7)' allowTransparency='true'></iframe>";
		return $echo;
	}
}