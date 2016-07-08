<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 */
class StudentsController extends AppController
{

    
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses', 'Branches']
        ];
        $students = $this->paginate($this->Students);

        $this->set(compact('students'));
        $this->set('_serialize', ['students']);
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Courses', 'Branches']
        ]);

        $this->set('student', $student);
        $this->set('_serialize', ['student']);
    }

    public function getBranches($id){
        $result = array('success' => false);
        $this->viewBuilder()->layout(false);
        $this->render(false);
        if ($this->request->is('ajax')) {

            $branch = $this->Students->Branches->find()
                ->where(['Branches.course_id'  => $id])
                ->select(['Branches.id', 'Branches.name'])->toList();
            // debug($branch);exit;

            if(!empty($branch)){
                $result['success'] = true;
                $result['data'] = $branch;
            }
            return $this->_sendJson($result);

        }
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $student = $this->Students->newEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->data);
            // debug($student);exit;

                if (!empty($this->request->data['file']['name'])) {
                $fileName = rand(000000, 999999).'_'.$this->request->data['file']['name'];
                $uploadPath = WWW_ROOT.'uploads/students/';
                // debug($uploadPath);
                $uploadFile = $uploadPath.$fileName;
                // debug($uploadFile);exit;
                if (move_uploaded_file($this->request->data['file']['tmp_name'], $uploadFile)) {
                    $student->avatar = $fileName;

                    if ($this->Students->save($student)) {
                        $this->Flash->success(__('The student has been saved.'));
                        return $this->redirect(['action' => 'add']);
                    }
                    else
                    {
                        $this->Flash->error(__('The student could not be saved. Please, try again.'));
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

       /* if (!empty($this->request->data)) {
            if (!empty($this->request->data['upload']['name'])) {
                $file = $this->request->data['upload'];
                $ext = substr(strtolower(strchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jepg', 'gif', 'png');
                $setNewFileName = time()."_".rand(000000, 999999);
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file['tmp_name'], WWW_ROOT.'/upload/avatar/'.$setNewFileName.'.'.$ext);
                    $imageFileName = $setNewFileName.'.'.$ext;                    
                }
                $getFormvalue = $this->Students->patchEntity($student, $this->request->data);
                if (!empty($this->request->data['upload']['name'])) {
                    $getFormvalue->avatar = $imageFileName;
                }
                if ($this->Students->save($getFormvalue)) {
                    $this->Flash->success('file upload');
                    return $this->redirect(['controller' => 'Students', 'action' => 'add']);
                }else{
                    $this->Flash->error('failed to upload');
                }
            }
        }*/
        $courses = $this->Students->Courses->find('list', ['limit' => 200]);
        $branches = $this->Students->Branches->find('list', ['limit' => 200]);
        $this->set(compact('student', 'courses'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->data);
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The student could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Students->Courses->find('list', ['limit' => 200]);
        $branches = $this->Students->Branches->find('list', ['limit' => 200]);
        $this->set(compact('student', 'courses', 'branches'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('The student has been deleted.'));
        } else {
            $this->Flash->error(__('The student could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
