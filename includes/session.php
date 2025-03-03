<?php
// A class to help work with Sessions
// In our case, primarily to manage logging users in and out

// Keep in mind when working with sessions that it is generally 
// inadvisable to store DB-related objects in sessions

// Useful php.ini file settings:
// session.cookie_lifetime = 0
// session.cookie_secure = 1
// session.cookie_httponly = 1
// session.use_only_cookies = 1
// session.entropy_file = "/dev/urandom"

// Must have already called:
// session_start();

class Session
{

    private $logged_in = false;
    public $user_id;
    public $message;
    public $OK = null;

    public $ip;
    public $user_agent;
    public $last_login;

    public $referrer;
    public $count;

    public function set_referrer()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $this->referrer = $_SERVER['HTTP_REFERER'];
        }
    }

    function __construct()
    {
        // Set session parameters
        ini_set('session.cookie_lifetime', 86400); // 24 hours in seconds
        ini_set('session.gc_maxlifetime', 86400);  // 24 hours in seconds


//      session_save_path(SESSION_PATH);
//      session_name('rajah');
        session_start();
        $this->visitor_count();
        $this->check_message();
        $this->check_login();
        $this->check_info();
        $this->set_referrer();

//        echo $this->user_id;
//        $username=User::find_by_id($this->user_id);
//        log_views("Views ".$_SERVER['PHP_SELF'],"User: ".$this->user_id.$username->username);

        if ($this->logged_in) {
            // actions to take right away if user is logged in
            log_views("Views | " . $_SERVER['PHP_SELF'], "UserId: " . $this->user_id);
        } else {
            // actions to take right away if user is not logged in
            $ip = $_SERVER['REMOTE_ADDR'];
            log_views("Views | " . $_SERVER['PHP_SELF'], "IP ({$ip}) UserId: Not logged in");
        }
    }


    public function visitor_count()
    {
        if (isset($_SESSION['count'])) {
            return $this->count = $_SESSION["count"]++;
        } else {
            return $_SESSION['count'] = 1;
        }
    }


    public function end_session()
    {
        // Use both for compatibility with all browsers
        // and all versions of PHP.
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->logged_in = false;
        $_SESSION = [];
//        if (isset($_COOKIE[session_name()])) {
//            session_set_cookie_params(session_name(), '', time() - 4200, '/');
//        }

//        new in php8
//        $params = session_get_cookie_params();
//        $params['lifetime'] = time() - 4200;
//        $params['path'] = '/';
//        $params['secure'] = false;
//        $params['httponly'] = false;
//        session_set_cookie_params($params['lifetime'], $params['path'], $params['domain'], $params['secure'], $params['httponly']);



        session_unset();
        session_destroy();
    }


    // Does the request IP match the stored value?
    private function request_ip_matches_session()
    {
        // return false if either value is not set
        if (!isset($_SESSION['ip']) || !isset($_SERVER['REMOTE_ADDR'])) {
            return false;
        }
        if ($_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            return true;
        } else {
            return false;
        }
    }


    // Does the request user agent match the stored value?
    private function request_user_agent_matches_session()
    {
        // return false if either value is not set
        if (!isset($_SESSION['user_agent']) || !isset($_SERVER['HTTP_USER_AGENT'])) {
            return false;
        }
        if ($_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']) {
            return true;
        } else {
            return false;
        }
    }

// Has too much time passed since the last login?
    private function last_login_is_recent()
    {
        $max_elapsed = 60 * 60 * 24; // 1 day
        // return false if value is not set
        if (!isset($_SESSION['last_login'])) {
            return false;
        }
        if (($_SESSION['last_login'] + $max_elapsed) >= time()) {
            return true;
        } else {
            return false;
        }
    }

// Should the session be considered valid?
    private function is_session_valid()
    {
        $check_ip = true;
        $check_user_agent = true;
        $check_last_login = true;

        if ($check_ip && !$this->request_ip_matches_session()) {
            return false;
        }
        if ($check_user_agent && !$this->request_user_agent_matches_session()) {
            return false;
        }
        if ($check_last_login && !$this->last_login_is_recent()) {
            return false;
        }
        return true;
    }


    public function is_logged_in()
    {
        return $this->logged_in;
    }

    public function login($user)
    {
        // database should find user based on username/password
        if ($user) {
//      $this->user_id = $_SESSION['user_id'] = $user->id;
//      $this->logged_in = true;

            // Regenerate session ID to invalidate the old one.
            // Super important to prevent session hijacking/fixation.

            session_regenerate_id();

            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->logged_in = true;

            // Save these values in the session, even when checks aren't enabled
            $this->ip = $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $this->user_agent = $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            $this->last_login = $_SESSION['last_login'] = time();

        }
    }

    public function logout()
    {

        //  session_destroy();
        $this->end_session();
    }

    //todo conflict of local message and session message
    public function message($msg = "")
    {
        if (!empty($msg)) {
            // then this is "set message"
            // make sure you understand why $this->message=$msg wouldn't work
            $_SESSION['message'] = $msg;
        } else {
            // then this is "get message"
            return $this->message;
        }
    }

    public function ok($OK = false)
    {
        if (($OK)) {
            // then this is "set message"
            // make sure you understand why $this->message=$msg wouldn't work
            $_SESSION["OK"] = true;
        }
    }


    private function check_message()
    {
        if (isset($_SESSION["message"])) {
            //$output = "<div class=\"message\" >";
            if (isset($_SESSION["OK"])) {
                $output = "<div class=\"alert alert-success  fade in\"  role='alert' >";
                $output .= "<a href='#' class='close' data-dismiss='alert'>&times;</a>";
                $output .= "<span class=\"glyphicon glyphicon-ok\" aria-hidden='true'></span>";
                $output .= "<span class=\"sr-only\">Success:</span>";
            } else {
                $output = "<div class=\"alert alert-danger fade in\" role='alert' >";
                $output .= "<a href='#' class='close' data-dismiss='alert'>&times;</a>";
                $output .= "<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden='true'></span>";
                $output .= "<span class=\"sr-only\">Error:</span>";
            }
            $output .= " &nbsp;" . htmlentities($_SESSION["message"], ENT_COMPAT, 'utf-8');
            $output .= "</div>";
            // clear message after use
            $this->message = $output;
            unset($_SESSION['message']);
            unset($_SESSION['OK']);
            //   return $output;
        } else {
            $this->message = "";
        }

    }


    private function check_login()
    {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->logged_in = true;
        } else {
            unset($this->user_id);
            $this->logged_in = false;
        }
    }


    private function check_info()
    {
        if (isset($_SESSION['ip'])) {
            $this->ip = $_SESSION['ip'];
        } else {
            unset($this->ip);
        }
        if (isset($_SESSION['user_agent'])) {
            $this->user_agent = $_SESSION['user_agent'];
        } else {
            unset($this->user_agent);
        }
        if (isset($_SESSION['last_login'])) {
            $this->last_login = $_SESSION['last_login'];
        } else {
            unset($this->last_login);
        }

    }
    /*	private function check_message() {
            // Is there a message stored in the session?
            if(isset($_SESSION['message'])) {
                // Add it as an attribute and erase the stored version
          $this->message = $_SESSION['message'];
          unset($_SESSION['message']);
        } else {
          $this->message = "";
        }
        }*/

    // If user is not logged in, end and redirect to login page.
    function confirm_user_logged_in()
    {
        global $Nav;
        if (!$this->is_logged_in()) {
            $this->logged_in = false;
            $this->end_session();
            // Note that header redirection requires output buffering
            // to be turned on or requires nothing has been output
            // (not even whitespace).
            header("Location: {$Nav->path_admin}login.php");
            exit;
        }
    }


// If session is not valid, end and redirect to login page.
    function confirm_session_is_valid()
    {
        global $Nav;
        if (!$this->is_session_valid()) {
            $this->end_session();
            // Note that header redirection requires output buffering
            // to be turned on or requires nothing has been output
            // (not even whitespace).
            header("Location: {$Nav->path_admin}login.php");
            exit;
        }
    }

    // Actions to preform before giving access to any
// access-restricted page.
    function confirmation_protected_page()
    {
        $this->confirm_user_logged_in();
        $this->confirm_session_is_valid();
    }

}

$session = new Session();
$message = $session->message();

?>