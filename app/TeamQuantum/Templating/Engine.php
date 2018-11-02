<?php
/**
 * Copyright © 2018
 * "fivem-webmanager" - Brought to you by:
 * ___________                    ________                       __
 * \__    ___/___ _____    _____  \_____  \  __ _______    _____/  |_ __ __  _____
 *   |    |_/ __ \\__  \  /     \  /  / \  \|  |  \__  \  /    \   __\  |  \/     \
 *   |    |\  ___/ / __ \|  Y Y  \/   \_/.  \  |  // __ \|   |  \  | |  |  /  Y Y  \
 *   |____| \___  >____  /__|_|  /\_____\ \_/____/(____  /___|  /__| |____/|__|_|  /
 *              \/     \/      \/        \__>          \/     \/                 \/
 *                          https://github.com/Team-Quantum
 *                      .PolluX / https://github.com/RealPolluX
 *                            Created @ 2018-11-02 - 02:05 PM
 */

namespace TeamQuantum\Templating;


class Engine
{
    protected $file = 'app';
    private $templateDir = __DIR__ . '/../../../resources/views/';

    protected $templateVariables = [];

    private $cacheTime;
    private $cacheDir;

    /**
     * Engine constructor.
     * @param string $file
     * @param array $variables
     */
    public function __construct(string $file, array $variables = [])
    {
        $this->file = $file;
        array_merge($this->templateVariables, $variables);

        $fileContent = file_get_contents($this->templateDir . $this->file . '.view.php', LOCK_EX);

        // TODO: templating
        // TODO: implement caching

        $this->handleTemplate($fileContent);

        // TODO: remove debug dumping
        var_dump($fileContent);
    }

    private function handleTemplate(String $fileContent): void
    {
        
    }

    /**
     * Returns the cache directory with a trailing DIRECTORY_SEPARATOR.
     *
     * @return string
     * @throws \Exception
     */
    public function getCacheDir()
    {
        if ($this->cacheDir === null) {
            $this->setCacheDir(__DIR__ . '/../../../storage/cache/');
        }
        return $this->cacheDir;
    }

    /**
     * Sets the cache directory and automatically appends a DIRECTORY_SEPARATOR.
     *
     * @param string $dir the cache directory
     *
     * @return void
     * @throws \Exception
     */
    public function setCacheDir($dir)
    {
        $this->cacheDir = rtrim($dir, '/\\') . DIRECTORY_SEPARATOR;
        if (!file_exists($this->cacheDir)) {
            mkdir($this->cacheDir, 0777, true);
        }
        if (is_writable($this->cacheDir) === false) {
            throw new \Exception('The cache directory must be writable, chmod "' . $this->cacheDir .
                '" to make it writable');
        }
    }

    /**
     * Returns an array of the template directory with a trailing DIRECTORY_SEPARATOR
     *
     * @return string
     */
    public function getTemplateDir()
    {
        return $this->templateDir;
    }

    /**
     * sets the template directory and automatically appends a DIRECTORY_SEPARATOR
     * template directory is stored in an array
     *
     * @param string $dir
     *
     * @throws \Exception
     */
    public function setTemplateDir($dir)
    {
        $tmpDir = rtrim($dir, '/\\') . DIRECTORY_SEPARATOR;
        if (is_dir($tmpDir) === false) {
            throw new \Exception('The template directory: "' . $tmpDir .
                '" does not exists, create the directory or specify an other location !');
        }
        $this->templateDir[] = $tmpDir;
    }

    /**
     * Returns the default cache time that is used with templates that do not have a cache time set.
     *
     * @return int the duration in seconds
     */
    public function getCacheTime()
    {
        return $this->cacheTime;
    }

    /**
     * Sets the default cache time to use with templates that do not have a cache time set.
     *
     * @param int $seconds the duration in seconds
     *
     * @return void
     */
    public function setCacheTime($seconds)
    {
        $this->cacheTime = (int)$seconds;
    }

    /**
     * Clears the cached templates if they are older than the given time.
     *
     * @param int $olderThan minimum time (in seconds) required for a cached template to be cleared
     *
     * @return int the amount of templates cleared
     * @throws \Exception
     */
    public function clearCache($olderThan = -1)
    {
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->getCacheDir()),
            \RecursiveIteratorIterator::SELF_FIRST);
        $expired = time() - $olderThan;
        $count = 0;
        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getCTime() < $expired) {
                $count += unlink((string)$file) ? 1 : 0;
            }
        }
        return $count;
    }


}