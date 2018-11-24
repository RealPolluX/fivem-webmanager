<?php

namespace TeamQuantum;

class Session
{
    public static function start(string $name, string $path)
    {
        session_save_path($path);
        ini_set('session.gc_probability', 1); // debian bugfix
        session_name($name);
        session_start();
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function exists(string $key)
    {
        return array_key_exists($key, $_SESSION);
    }

    public static function get(string $key)
    {
        if (!array_key_exists($key, $_SESSION)) {
            return null;
        }

        return $_SESSION[$key];
    }

    public static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }
}
