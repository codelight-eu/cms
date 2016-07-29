<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\app\web\twig\variables;

use Craft;
use craft\app\helpers\Url;
use yii\web\Cookie;

/**
 * Request functions.
 *
 * @author     Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since      3.0
 * @deprecated in 3.0
 */
class HttpRequest
{
    // Public Methods
    // =========================================================================

    /**
     * Constructor
     */
    public function __construct()
    {
        Craft::$app->getDeprecator()->log('craft.request', 'craft.request has been deprecated. Use craft.app.request instead.');
    }

    /**
     * Returns whether this is a GET request.
     *
     * @return bool Whether this is a GET request
     */
    public function isGet()
    {
        return Craft::$app->getRequest()->getIsGet();
    }

    /**
     * Returns whether this is a POST request.
     *
     * @return bool Whether this is a POST request
     */
    public function isPost()
    {
        return Craft::$app->getRequest()->getIsPost();
    }

    /**
     * Returns whether this is a DELETE request.
     *
     * @return bool Whether this is a DELETE request
     */
    public function isDelete()
    {
        return Craft::$app->getRequest()->getIsDelete();
    }

    /**
     * Returns whether this is a PUT request.
     *
     * @return bool Whether this is a PUT request
     */
    public function isPut()
    {
        return Craft::$app->getRequest()->getIsPut();
    }

    /**
     * Returns whether this is an Ajax request.
     *
     * @return boolean
     */
    public function isAjax()
    {
        return Craft::$app->getRequest()->getIsAjax();
    }

    /**
     * Returns whether this is a secure connection.
     *
     * @return boolean
     */
    public function isSecure()
    {
        return Craft::$app->getRequest()->getIsSecureConnection();
    }

    /**
     * Returns whether this is a Live Preview request.
     *
     * @return boolean
     */
    public function isLivePreview()
    {
        return Craft::$app->getRequest()->getIsLivePreview();
    }

    /**
     * Returns the script name used to access Craft.
     *
     * @return string
     */
    public function getScriptName()
    {
        return Craft::$app->getRequest()->getScriptFilename();
    }

    /**
     * Returns the request's URI.
     *
     * @return mixed
     */
    public function getPath()
    {
        return Craft::$app->getRequest()->getPathInfo();
    }

    /**
     * Returns the request's full URL.
     *
     * @return mixed
     */
    public function getUrl()
    {
        $uri = Craft::$app->getRequest()->getPathInfo();

        return Url::getUrl($uri);
    }

    /**
     * Returns all URI segments.
     *
     * @return array
     */
    public function getSegments()
    {
        return Craft::$app->getRequest()->getSegments();
    }

    /**
     * Returns a specific URI segment, or null if the segment doesn't exist.
     *
     * @param integer $num
     *
     * @return string|null
     */
    public function getSegment($num)
    {
        return Craft::$app->getRequest()->getSegment($num);
    }

    /**
     * Returns the first URI segment.
     *
     * @return string|null
     */
    public function getFirstSegment()
    {
        return Craft::$app->getRequest()->getSegment(1);
    }

    /**
     * Returns the last URL segment.
     *
     * @return string|null
     */
    public function getLastSegment()
    {
        return Craft::$app->getRequest()->getSegment(-1);
    }

    /**
     * Returns a variable from either the query string or the post data.
     *
     * @param string      $name
     * @param string|null $default
     *
     * @return mixed
     */
    public function getParam($name, $default = null)
    {
        return Craft::$app->getRequest()->getParam($name, $default);
    }

    /**
     * Returns a [[Cookie]] if it exists, otherwise, null.
     *
     * @param $name
     *
     * @return Cookie|null
     */
    public function getCookie($name)
    {
        return Craft::$app->getRequest()->getCookies()->get($name);
    }

    /**
     * Returns the server name.
     *
     * @return string
     */
    public function getServerName()
    {
        return Craft::$app->getRequest()->getServerName();
    }

    /**
     * Returns which URL format we're using (PATH_INFO or the query string)
     *
     * @return string
     */
    public function getUrlFormat()
    {
        if (Craft::$app->getConfig()->usePathInfo()) {
            return 'pathinfo';
        }

        return 'querystring';
    }

    /**
     * Returns whether the request is coming from a mobile browser.
     *
     * @param boolean $detectTablets
     *
     * @return boolean
     */
    public function isMobileBrowser($detectTablets = false)
    {
        return Craft::$app->getRequest()->isMobileBrowser($detectTablets);
    }

    /**
     * Returns the page number if this is a paginated request.
     *
     * @return integer
     */
    public function getPageNum()
    {
        return Craft::$app->getRequest()->getPageNum();
    }

    /**
     * Returns the schema and host part of the application URL.  The returned URL does not have an ending slash. By
     * default this is determined based on the user request information.
     *
     * @return string
     */
    public function getHostInfo()
    {
        return Craft::$app->getRequest()->getHostInfo();
    }

    /**
     * Returns the relative URL of the entry script.
     *
     * @return string
     */
    public function getScriptUrl()
    {
        return Craft::$app->getRequest()->getScriptUrl();
    }

    /**
     * Returns the path info of the currently requested URL. This refers to the part that is after the entry script and
     * before the question mark. The starting and ending slashes are stripped off.
     *
     * @return string
     */
    public function getPathInfo()
    {
        return Craft::$app->getRequest()->getPathInfo(true);
    }

    /**
     * Returns the request URI portion for the currently requested URL. This refers to the portion that is after the
     * host info part. It includes the query string part if any.
     *
     * @return string
     */
    public function getRequestUri()
    {
        return Craft::$app->getRequest()->getUrl();
    }

    /**
     * Returns the server port number.
     *
     * @return integer
     */
    public function getServerPort()
    {
        return Craft::$app->getRequest()->getServerPort();
    }

    /**
     * Returns the URL referrer or null if not present.
     *
     * @return string
     */
    public function getUrlReferrer()
    {
        return Craft::$app->getRequest()->getReferrer();
    }

    /**
     * Returns the user agent or null if not present.
     *
     * @return string
     */
    public function getUserAgent()
    {
        return Craft::$app->getRequest()->getUserAgent();
    }

    /**
     * Returns the user host name or null if it cannot be determined.
     *
     * @return string
     */
    public function getUserHost()
    {
        return Craft::$app->getRequest()->getUserHost();
    }

    /**
     * Returns the port to use for insecure requests. Defaults to 80, or the port specified by the server if the current
     * request is insecure.
     *
     * @return integer
     */
    public function getPort()
    {
        return Craft::$app->getRequest()->getPort();
    }

    /**
     * Returns the random token used to perform CSRF validation.
     *
     * The token will be read from cookie first. If not found, a new token will be generated.
     *
     * @return string The random token for CSRF validation.
     */
    public function getCsrfToken()
    {
        return Craft::$app->getRequest()->getCsrfToken();
    }

    /**
     * Returns part of the request URL that is after the question mark.
     *
     * @return string The part of the request URL that is after the question mark.
     */
    public function getQueryString()
    {
        return Craft::$app->getRequest()->getQueryString();
    }

    /**
     * Returns the request’s query string, without the p= parameter.
     *
     * @return string The query string.
     */
    public function getQueryStringWithoutPath()
    {
        return Craft::$app->getRequest()->getQueryStringWithoutPath();
    }

    /**
     * Returns a variable from the query string.
     *
     * @param string|null $name
     * @param string|null $default
     *
     * @return mixed
     */
    public function getQuery($name = null, $default = null)
    {
        return Craft::$app->getRequest()->getQueryParam($name, $default);
    }

    /**
     * Returns a value from post data.
     *
     * @param string|null $name
     * @param string|null $default
     *
     * @return mixed
     */
    public function getPost($name = null, $default = null)
    {
        return Craft::$app->getRequest()->getBodyParam($name, $default);
    }

    /**
     * Returns the user IP address.
     *
     * @return string
     */
    public function getUserHostAddress()
    {
        return Craft::$app->getRequest()->getUserIP();
    }

    /**
     * Retrieves the best guess of the client’s actual IP address taking into account numerous HTTP proxy headers due to
     * variations in how different ISPs handle IP addresses in headers between hops.
     *
     * Considering any of these server vars besides REMOTE_ADDR can be spoofed, this method should not be used when you
     * need a trusted source for the IP address. Use `$_SERVER['REMOTE_ADDR']` instead.
     *
     * @return string The IP address.
     */
    public function getIpAddress()
    {
        return Craft::$app->getRequest()->getUserIP();
    }

    /**
     * Returns whether the client is running "Windows", "Mac", "Linux" or "Other", based on the
     * browser's UserAgent string.
     *
     * @return string The OS the client is running.
     */
    public function getClientOs()
    {
        return Craft::$app->getRequest()->getClientOs();
    }
}
