<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 * @license http://ipaya.cn/license
 */

namespace api\models;


use common\models\Client;
use common\models\ClientFile;
use common\models\File;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadFileForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $uploadedFile;
    /**
     * @var File
     */
    public $file;
    /**
     * @var Client
     */
    public $client;


    public function rules()
    {
        return [
            ['uploadedFile', 'required', 'message' => '请上传文件'],
            ['uploadedFile', 'file', 'skipOnEmpty' => false, 'message' => '未上传文件']
        ];
    }

    public function upload()
    {
        if (!$this->validate()) {
            return false;
        }

        $file = File::findByMd5(md5_file($this->uploadedFile->tempName));
        if (!$file) {
            $file = new File();
            $file->uploadedFile = $this->uploadedFile;
            if (!$file->upload()) {
                $this->addError('uploadedFile', '上传失败');
                return false;
            }
        }
        $this->file = $file;
        $clientFile = ClientFile::findOne(['clientId' => $this->client->id, 'fileId' => $file->id]);
        if ($clientFile) {
            return true;
        }
        $clientFile = new ClientFile();
        $clientFile->fileId = $file->id;
        $clientFile->clientId = $this->client->id;
        $clientFile->uploadedAt = time();
        return $clientFile->save();
    }
}
