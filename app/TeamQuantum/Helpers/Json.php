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
 *                            Created @ 2018-11-02 - 00:16 PM
 */

namespace TeamQuantum\Helpers;

use TeamQuantum\Exceptions\DeserializationException;


class Json
{
    /**
     * Loads specific account data
     *
     * @param string $account
     *
     * @return \stdClass
     * @throws DeserializationException
     */
    public static function load(string $account): \stdClass
    {
        $path = __DIR__ . '/../../../storage/accounts';

        $fileContent = file_get_contents($path . '/' . $account . '.json', LOCK_EX);
        if (!$fileContent) {
            return null;
        }

        return Json::deserialize($fileContent);
    }

    /**
     * Serializes data to JSON.
     *
     * @param mixed $data
     * @param bool $forceObject
     *
     * @return string
     */
    public static function serialize($data, bool $forceObject = false): string
    {
        return json_encode($data, $forceObject ? JSON_FORCE_OBJECT : 0);
    }

    /**
     * Deserializes JSON data.
     *
     * @param string $data
     * @param bool $forceArray
     *
     * @return \stdClass|array
     * @throws DeserializationException
     */
    public static function deserialize(string $data, bool $forceArray = false)/*: stdClass|array*/
    {
        $parsed = json_decode($data, $forceArray);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new DeserializationException('Failed to deserialize data: ' . json_last_error());
        }

        return $parsed;
    }
}