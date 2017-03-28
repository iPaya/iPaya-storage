<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace common\models;

use common\fileSystem\FileSystemInterface;
use common\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 */
class File extends BaseFile
{
    /**
     * @var UploadedFile
     */
    public $uploadedFile;


    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['uploadedFile', 'required'];
        $rules[] = ['uploadedFile', 'file', 'skipOnEmpty' => false];
        $rules[] = ['md5', 'unique', 'message' => '文件已存在'];
        return $rules;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['uploadedFile'] = '文件';
        return $labels;
    }

    /**
     * @inheritdoc
     * @return FileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FileQuery(get_called_class());
    }

    /**
     * @param string $md5
     * @return array|File|null
     */
    public static function findByMd5($md5)
    {
        return self::find()
            ->andWhere(['md5' => $md5])
            ->one();
    }

    /**
     * 是否为图片
     *
     * @return bool
     */
    public function getIsImage()
    {
        return FileHelper::isImageByExtension($this->extension) || FileHelper::isImageByMimeType($this->mimeType);
    }

    /**
     * @return string
     */
    public function getContent()
    {
        /** @var FileSystemInterface $fileSystem */
        $fileSystem = \Yii::$app->fileSystem;
        return $fileSystem->read($this->path);
    }

    /**
     * @return string
     */
    public function getBase64Content()
    {
        $content = $this->getContent();
        return "data:$this->mimeType;base64," . base64_encode($content);
    }

    /**
     * 上传文件
     *
     * @return bool
     */
    public function upload()
    {
        /** @var FileSystemInterface $fileSystem */
        $fileSystem = \Yii::$app->fileSystem;
        $file = $this->uploadedFile;
        $this->name = $file->name;
        $this->extension = $file->extension;
        $this->mimeType = $file->type;
        $this->fileSize = $file->size;
        $this->uploadedAt = time();
        $dir = date('Y/m/d');
        $filename = md5(\Yii::$app->security->generateRandomString());
        $this->md5 = md5_file($file->tempName);
        if ($this->extension) {
            $filename .= '.' . $this->extension;
        }
        $this->path = $dir . '/' . $filename;

        if (!$this->validate()) {
            return false;
        }

        if ($fileSystem->upload($file->tempName, $this->path)) {
            if (!$this->save()) {
                return false;
            }
            return true;
        }

        return false;
    }

    public function fields()
    {
        return [
            'name' => 'name',
            'url' => 'url'
        ];
    }

    public function getUrl()
    {
        return \Yii::$app->frontendUrlManager->createUrl(['/file/view', 'id' => $this->id, 'name' => $this->name]);
    }
}
