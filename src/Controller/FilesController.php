<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class FilesController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash');

        $this->loadModel('Files');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $uploadData = '';
        if ($this->request->is('post')) {
            if (!empty($this->request->data['file']['name'])) {
                $fileName = rand(000000, 999999).'_'.$this->request->data['file']['name'];
                $uploadPath = WWW_ROOT.'uploads/files/';
                // debug($uploadPath);
                $uploadFile = $uploadPath.$fileName;
                // debug($uploadFile);exit;
                if (move_uploaded_file($this->request->data['file']['tmp_name'], $uploadFile)) {
                    $uploadData = $this->Files->newEntity();
                    $uploadData->name = $fileName;
                    $uploadData->path = $uploadPath;
                    $uploadData->created = date('Y-m-d H:i:s');
                    $uploadData->modified = date('Y-m-d H:i:s');

                    if ($this->Files->save($uploadData)) {
                        $this->Flash->success('Uploaded');
                    }
                    else
                    {
                        $this->Flash->error('Failed');
                    }
                }
                else
                {
                    $this->Flash->error('Failed to move');
                }
            }
            else
            {
                $this->Flash->error('File not selected');
            }
        }
        $this->set('uploadData', $uploadData);

        $files = $this->Files->find('all', ['order' => ['Files.created' => 'DESC']]);
        // debug($files);exit;
        $filesRowNum = $files->count();
        $this->set('files', $files);
        $this->set('filesRowNum', $filesRowNum);
    }

}