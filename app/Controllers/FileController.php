<?php
class FileController
{
    private $log;

    public function __construct($logger)
    {
        $this->log = $logger;
    }

    public function index()
    {
        if (empty($_SESSION['email'])) {
            header('Location: /login');
            exit;
        }
        $this->showFiles();
    }

    private function getFileIcon($fileExtension)
    {
        switch (strtolower($fileExtension)) {
            case 'pdf': return 'bi-filetype-pdf';
            case 'doc':
            case 'docx': return 'bi-filetype-doc';
            case 'xls':
            case 'xlsx': return 'bi-filetype-xls';
            case 'ppt':
            case 'pptx': return 'bi-filetype-ppt';
            case 'zip':
            case 'rar':
            case '7z': return 'bi-filetype-zip';
            case 'jpg':
            case 'jpeg': return 'bi-filetype-jpg';
            case 'png': return 'bi-filetype-png';
            case 'gif': return 'bi-filetype-gif';
            case 'txt': return 'bi-filetype-txt';
            case 'php': return 'bi-filetype-php';
            case 'html':
            case 'htm': return 'bi-filetype-html';
            case 'css': return 'bi-filetype-css';
            case 'js': return 'bi-filetype-js';
            case 'json': return 'bi-filetype-json';
            default: return 'bi-folder-fill';
        }
    }

    private function captureUrl()
    {
        return isset($_GET['folder']) ? urldecode($_GET['folder']) : '';
    }

    private function filePath()
    {
        $folder = $this->captureUrl();
        return rtrim(BASE_PATH . '/' . $_ENV['UPLOAD_FOLDER'] . ($folder ? '/' . $folder : ''), '/');
    }

    public function showFiles()
    {
        $filePath = $this->filePath();
        Application::model('FileModel');
        $fileModel = new FileModel($filePath);
        $items = $fileModel->getItems();

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $path = $filePath . '/' . $item;
            $modifiedTimestamp = filemtime($path);
            $formattedDate = date('M d, Y', $modifiedTimestamp);
            $fileType = filetype($path);
            $fileExtension = ($fileType === 'file') ? pathinfo($item, PATHINFO_EXTENSION) : '';
            $fileIcon = $this->getFileIcon($fileExtension);

            $relativePath = str_replace(BASE_PATH, '', $path);
            $relativePath = str_replace('\\', '/', $relativePath);
            $segments = explode('/', $relativePath);
            $encodedPath = implode('/', array_map('rawurlencode', $segments));

            $result[] = [
                'name'      => $item,
                'type'      => $fileType,
                'modified'  => $formattedDate,
                'path'      => $encodedPath,
                'extension' => $fileExtension,
                'icon'      => $fileIcon
            ];
        }

        Application::view('template/header');
        Application::view('filesView', [
            'items' => $result,
            'currentFolder' => $this->captureUrl()
        ]);
        Application::view('template/footer');
    }
}
?>