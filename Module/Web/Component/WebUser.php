<?php
namespace X\Module\Web\Component;
use X\Model\User;
/**
 * @property int $id
 * @property string $name
 * @property int $isAdmin
 */
class WebUser {
    /** session key for current user */
    const SESSION_KEY = 'WEBUSER';
    /** @var self */
    private static $webuser = null;
    /** @var User */
    private $user = null;
    
    /**
     * @param string $name
     * @return mixed
     */
    public function __get( $name ) {
        $user = $_SESSION[self::SESSION_KEY];
        if ( !array_key_exists($name, $user) ) {
            throw new \Exception('webuser does not have property `'.$name.'`');
        }
        return $user[$name];
    }
    
    /** @return \X\Model\User */
    public function getUser() {
        if ( null === $this->user ) {
            $this->user = User::findOne(['id'=>$this->id]);
        }
        return $this->user;
    }
    
    /**
     * cheking for whether current user is logined or not.
     * @return boolean
     */
    public static function isGuest() {
        return !isset($_SESSION[self::SESSION_KEY]);
    }
    
    /**
     * login user by email and password
     * @param unknown $email
     * @param unknown $password
     * @throws \Exception
     */
    public static function login( $email, $password ) {
        $user = User::findOne(['email'=>$email]);
        if ( User::STATUS_FREEZED == $user->status ) {
            throw new \Exception('user has been freezed.');
        }
        if ( User::STATUS_EMAIL_NOT_VERFIED == $user->status ) {
            throw new \Exception('email address does not verfied');
        }
        if ( null === $user || !$user->isPasswordMatch($password) ) {
            throw new \Exception('user name or password error');
        }
        if ( null === self::$webuser ) {
            self::$webuser = new self();
        }
        self::$webuser->user = $user;
        $_SESSION[self::SESSION_KEY] = array(
            'id' => $user->id,
            'isAdmin' => $user->is_admin,
            'name' => $user->name,
        );
    }
    
    /**
     * @return self
     */
    public static function load() {
        if ( null === self::$webuser ) {
            self::$webuser = new self();
        }
        return self::$webuser;
    }
    
    /**
     * @return void
     */
    public function logout() {
        $_SESSION[self::SESSION_KEY] = null;
        session_destroy();
    }
}