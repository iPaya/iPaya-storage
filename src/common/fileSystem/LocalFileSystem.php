<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\fileSystem;


use yii\base\Component;
use yii\base\InvalidParamException;

class LocalFileSystem extends Component implements FileSystemInterface
{
    public $path = null;


    public function init()
    {
        parent::init();
        if ($this->path == null) {
            throw new InvalidParamException('请配置 "path" 参数');
        }
    }

    /**
     * @param string $filename
     * @return bool|string
     */
    public function getFilename($filename)
    {
        return \Yii::getAlias($this->path . '/' . $filename);
    }

    /**
     * @inheritDoc
     */
    public function upload($src, $dest)
    {
        $dest = $this->getFilename($dest);
        $destDir = dirname($dest);
        if (!file_exists($destDir)) {
            mkdir($destDir, 0777, true);
        }
        return move_uploaded_file($src, $dest);
    }

    /**
     * @inheritDoc
     */
    public function write($filename, $content)
    {
        return file_put_contents($filename, $content) !== false;
    }

    /**
     * @inheritdoc
     */
    public function read($path)
    {
        return file_get_contents($this->getFilename($path));
    }
}
