<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\fileSystem;


interface FileSystemInterface
{
    /**
     * 上传文件
     *
     * @param string $src 源文件
     * @param string $dest 目标文件
     * @return boolean
     */
    public function upload($src, $dest);

    /**
     * 写入文件
     *
     * @param string $filename
     * @param string $content
     * @return boolean
     */
    public function write($filename, $content);

    /**
     * 读取文件内容
     *
     * @param string $path
     * @return string
     */
    public function read($path);
}
