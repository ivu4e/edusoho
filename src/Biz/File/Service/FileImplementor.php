<?php
namespace Biz\File\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface FileImplementor
{
    public function getFile($file);

    public function getFullFile($file);

    public function getDefaultHumbnails($globalId);

    public function getThumbnail($globalId, $options);

    public function getStatistics($options);

    public function player($globalId, $ssl=false);

    public function addFile($targetType, $targetId, array $fileInfo = array(), UploadedFile $originalFile = null);

    public function convertFile($file, $status, $result = null, $callback = null);

    public function reconvert($globalId, $options);

    public function getUploadAuth($params);

    public function reconvertOldFile($file, $convertCallback, $pipeline = null);

    public function saveConvertResult($file, array $result = array());

    public function deleteFile($file);

    public function moveFile($targetType, $targetId, UploadedFile $originalFile = null, $data = array());

    public function makeUploadParams($params);

    public function reconvertFile($file, $convertCallback, $pipeline = null);

    public function getMediaInfo($key, $mediaType);

    //FileImplementor2
    public function getFileByGlobalId($globalId);

    public function prepareUpload($params);

    public function initUpload($file);

    public function resumeUpload($hash, $params);

    public function updateFile($file, $fields);

    public function getDownloadFile($id, $ssl = false);

    public function findFiles($files, $conditions);

    public function finishedUpload($file, $params);

    public function search($conditions);

    public function synData($conditions);

    public function download($globalId);
}