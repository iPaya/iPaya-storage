<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\oss;


use OSS\OssClient;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Client extends Component
{
    /**
     * @var string 阿里云 OSS endpoint
     * @see https://help.aliyun.com/document_detail/31837.html
     */
    public $endpoint;
    /**
     * @var string 阿里云 access key Id
     */
    public $accessKeyId;
    /**
     * @var string 阿里云 access key secret
     */
    public $accessKeySecret;
    /**
     * @var string 阿里云 OSS Bucket
     * @see https://help.aliyun.com/document_detail/31827.html
     */
    public $bucket;

    /**
     * @var OssClient
     */
    private $_ossClient;


    public function init()
    {
        if ($this->endpoint == null) {
            throw new InvalidConfigException('请配置 "endpoint".');
        }
        if ($this->accessKeyId == null) {
            throw new InvalidConfigException('请配置 "accessKeyId".');
        }
        if ($this->accessKeySecret == null) {
            throw new InvalidConfigException('请配置 "accessKeySecret".');
        }
    }

    /**
     * @return OssClient
     */
    public function getOssClient()
    {
        if ($this->_ossClient == null) {
            $this->_ossClient = new OssClient($this->accessKeyId, $this->accessKeySecret, $this->endpoint);
        }
        return $this->_ossClient;
    }
}
