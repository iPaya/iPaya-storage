<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\helpers;


class FileHelper extends \yii\helpers\FileHelper
{
    public static $imageExtensions = [
        'jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'
    ];

    public static $imageMimeTypes = [
        'image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'svg+xml'
    ];

    /**
     * 通过扩展名判断是否为图片
     *
     * @param string $extension
     * @return bool
     */
    public static function isImageByExtension($extension)
    {
        return in_array(strtolower($extension), self::$imageExtensions);
    }

    /**
     * 通过Mime Type 判断是否图片
     *
     * @param string $mimeType
     * @return bool
     */
    public static function isImageByMimeType($mimeType)
    {
        return in_array(strtolower($mimeType), self::$imageMimeTypes);
    }
}
