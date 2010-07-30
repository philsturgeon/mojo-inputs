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
		$this->input =& load_class('Input');
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
	 * Get
	 *
	 * Get a $_GET variable.
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
	 * Get
	 *
	 * Get a $_GET variable.
	 *
	 * @access	public
	 * @param	array
	 * @return	string
	 */
	function cookie($template_data = array())
	{
		$params =& $template_data['parameters'];

		return isset($params['name']) ? $this->input->cookie($params['name']) : '';
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
	function set_cookie($template_data = array())
	{
		$params =& $template_data['parameters'];

		if ( ! isset($params['name']) OR ! isset($params['value']))
		{
			return;
		}

		$expire = isset($params['expire']) ? $params['expire'] : '';

		$this->input->set_cookie($params['name'], $params['value'], $expire);
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
	function server($template_data = array())
	{
		$params =& $template_data['parameters'];

		return isset($params['name']) ? $this->input->server(strtoupper($params['name'])) : '';
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
	function ip_address()
	{
		return $this->input->ip_address();
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
	function user_agent()
	{
		return $this->input->user_agent();
	}

}

/* End of file robots.php */
/* Location: system/mojomotor/third_party/robots/libraries/robots.php */