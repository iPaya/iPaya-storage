<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\fileSystem;


use common\oss\Client;
use OSS\Core\OssException;

class OssFileSystem implements FileSystemInterface
{
    /**
     * @return Client
     */
    public function getClient()
    {
        return \Yii::$app->oss;
    }

    /**
     * @param $name
     * @return string
     */
    public function getObject($name)
    {
        $env = getenv('APP_ENV');
        if ($env == null) {
            $env = 'dev';
        }
        return $env . '/' . $name;
    }

    /**
     * @inheritDoc
     */
    public function upload($src, $dest)
    {
        $object = $this->getObject($dest);
        $client = $this->getClient();
        try {
            $client->getOssClient()->uploadFile($client->bucket, $object, $src);
            return true;
        } catch (OssException $exception) {
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function write($filename, $content)
    {
        $object = $this->getObject($filename);
        $client = $this->getClient();
        try {
            $client->getOssClient()->putObject($client->bucket, $object, $content);
            return true;
        } catch (OssException $exception) {
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function read($path)
    {
        $object = $this->getObject($path);
        $client = $this->getClient();
        try {
            return $client->getOssClient()->getObject($client->bucket, $object);
        } catch (OssException $exception) {
            return false;
        }
    }

}
