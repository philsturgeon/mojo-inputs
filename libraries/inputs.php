<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Inputs addon
 *
 * Set variables in your layout file or anywhere throughout Mojo Regions then
 * use them again anywhere.
 *
 * @package		MojoMotor
 * @subpackage	Addons
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/mojomotor/inputs
 */
class Inputs
{
	public $addon;
	public $addon_version = '1.0';

	// --------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		$this->addon =& get_instance();
		$this->input =& $this->addon->input;
	}

	// --------------------------------------------------------------------

	/**
	 * Get
	 *
	 * Get a $_GET variable.
	 *
	 * @access	public
	 * @param	array
	 * @return	string
	 */
	function get($template_data = array())
	{
		$params =& $template_data['parameters'];

		parse_str($_SERVER['QUERY_STRING'], $_GET);
		return isset($params['name']) ? $this->input->get($params['name']) : '';
	}

	// --------------------------------------------------------------------

	/**
	 * Post
	 *
	 * Get a $_POST variable.
	 *
	 * @access	public
	 * @param	array
	 * @return	string
	 */
	function post($template_data = array())
	{
		$params =& $template_data['parameters'];

		return isset($params['name']) ? $this->input->post($params['name']) : '';
	}

	// --------------------------------------------------------------------

	/**
	 * Session
	 *
	 * Set or get a variable to the CodeIgniter/Mojo session.
	 *
	 * @access	public
	 * @param	array
	 * @return	string
	 */
	function session($template_data = array())
	{
		$params =& $template_data['parameters'];
		
		$this->addon->load->library('session');

		if ( isset($params['name']) AND isset($params['value']))
		{
			$this->addon->session->set_userdata($params['name'], $params['value']);
		}

		else
		{
			return isset($params['name']) ? $this->addon->session->userdata($params['name']) : '';
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Set cookie
	 *
	 * Set a $_COOKIE variable.
	 *
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	function cookie($template_data = array())
	{
		$params =& $template_data['parameters'];

		if ( isset($params['name']) AND isset($params['value']))
		{
			$expire = isset($params['expire']) ? $params['expire'] : '';

			$this->input->set_cookie($params['name'], $params['value'], $expire);
		}

		else
		{
			return isset($params['name']) ? $this->input->cookie($params['name']) : '';
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Server
	 *
	 * Get a $_SERVER variable.
	 *
	 * @access	public
	 * @param	array
	 * @return	string
	 */
	function server($template_data = array())
	{
		$params =& $template_data['parameters'];

		return isset($params['name']) ? $this->input->server(strtoupper($params['name'])) : '';
	}

	// --------------------------------------------------------------------

	/**
	 * IP Address
	 *
	 * Get the users IP Address
	 *
	 * @access	public
	 * @param	array
	 * @return	string
	 */
	function ip_address()
	{
		return $this->input->ip_address();
	}

	// --------------------------------------------------------------------

	/**
	 * User Agent
	 *
	 * Get the users user agent.
	 *
	 * @access	public
	 * @param	array
	 * @return	string
	 */
	function user_agent()
	{
		return $this->input->user_agent();
	}

}

/* End of file robots.php */
/* Location: system/mojomotor/third_party/robots/libraries/robots.php */