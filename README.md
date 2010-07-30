# Mojo Inputs

Get access to GET, POST and Cookie data. Also gives you the users ip address and user agent.

## Installation

1. Download the files and place in a folder named "inputs" in:

	system/mojomotor/third_party/

2. Open system/mojomotor/config/config.php and set:

	$config['uri_protocol']	= "PATH_INFO";

	Notice: If you skip this step you will get a 404 whenever you try to add a query string to your URL.

## Usage

At the moment it seems you can only use these tags inside of Layouts.

### Mojo Tags

    Server (HTTP_HOST): {mojo:inputs:server name="http_host"}<br/>
    Get value ?foo=: {mojo:inputs:get name="foo"}<br/>

    {mojo:inputs:set_cookie name="some_cookie" value="cookie value"}
    Cookie value: {mojo:inputs:cookie name="some_cookie"}<br/>

    {mojo:inputs:session name="some_session" value="session value"}
    Session value: {mojo:inputs:session name="some_session"}<br/>

    IP Address: {mojo:inputs:ip_address}<br/>
    User Agent: {mojo:inputs:user_agent}

### Output

    Server (HTTP_HOST): localhost
    Get value ?foo=: bar
    
    Cookie value: (this is broke atm)

    Session value: session value

    IP Address: 127.0.0.1
    User Agent: Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_4; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.99 Safari/533.4